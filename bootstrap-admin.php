<?php
/**
 * bootstrap-admin.php — crea un único administrador desde variables de entorno
 * si todavía no existe. Idempotente. Se ejecuta por CLI en el arranque del
 * contenedor (docker-entrypoint.sh), fuera del árbol servido por Apache.
 *
 * Variables: ADMIN_EMAIL, ADMIN_PASSWORD (más DB_HOST/PORT/NAME/USER/PASS).
 */

$email = getenv('ADMIN_EMAIL');
$pass  = getenv('ADMIN_PASSWORD');
if (!$email || !$pass) {
    fwrite(STDERR, "[bootstrap-admin] ADMIN_EMAIL/ADMIN_PASSWORD sin definir; omito.\n");
    exit(0);
}

$host   = getenv('DB_HOST') ?: 'localhost';
$port   = getenv('DB_PORT') ?: '3306';
$dbname = getenv('DB_NAME') ?: 'tienda_mistica';
$dbuser = getenv('DB_USER') ?: 'root';
$dbpass = getenv('DB_PASS');
if ($dbpass === false) {
    $dbpass = '';
}
$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

// La base puede tardar en aceptar conexiones en el primer arranque.
$pdo = null;
for ($i = 0; $i < 30; $i++) {
    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        break;
    } catch (PDOException $e) {
        sleep(2);
    }
}
if (!$pdo) {
    fwrite(STDERR, "[bootstrap-admin] no pude conectar a la base; omito.\n");
    exit(0);
}

$st = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = ? LIMIT 1");
$st->execute([$email]);
if ($st->fetch()) {
    fwrite(STDERR, "[bootstrap-admin] el admin ya existe; nada que hacer.\n");
    exit(0);
}

$hash = password_hash($pass, PASSWORD_BCRYPT);
$ins = $pdo->prepare(
    "INSERT INTO usuarios (nombre, apellido, email, password_hash, rol, activo)
     VALUES ('Admin', NULL, ?, ?, 'admin', 1)"
);
$ins->execute([$email, $hash]);
fwrite(STDERR, "[bootstrap-admin] admin creado: $email\n");
