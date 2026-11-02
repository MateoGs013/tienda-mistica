<?php
// classes/DB.php
class DB {
    private static ?PDO $cn = null;

    public static function get(): PDO {
        if (self::$cn === null) {
            try {
                $host = getenv('DB_HOST') ?: 'localhost';
                $port = getenv('DB_PORT') ?: '3306';
                $db   = getenv('DB_NAME') ?: 'tienda_mistica';
                $user = getenv('DB_USER') ?: 'root';
                $pass = getenv('DB_PASS');
                if ($pass === false) {
                    $pass = '';
                }
                $dsn  = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
                self::$cn = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                // Registrar el error para el administrador
                error_log("Error de conexión a la base de datos: " . $e->getMessage());

                // Mostrar una página de error amigable y consistente con el diseño
                // NOTA: no debemos incluir `includes/header.php` ni ejecutar código
                // que dependa de la base de datos aquí (evita recursión).
                $errorView = __DIR__ . '/../views/db_error.php';
                if (file_exists($errorView)) {
                    require_once $errorView;
                    exit;
                }

                // Fallback mínimo si la vista no está disponible
                http_response_code(503);
                echo "<h1>Servicio temporalmente no disponible</h1>";
                echo "<p>No se pudo conectar con la base de datos. Intente más tarde.</p>";
                exit;
            }
        }
        return self::$cn;
    }
}
