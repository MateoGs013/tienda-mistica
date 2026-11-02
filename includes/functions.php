<?php
// includes/functions.php
require_once __DIR__ . '/url.php';
require_once __DIR__ . '/../classes/DB.php';
require_once __DIR__ . '/../classes/Usuario.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function login_usuario(string $email, string $password): bool {
    try {
        $user = Usuario::findByEmail($email);
        if ($user && isset($user['password_hash']) && password_verify($password, $user['password_hash'])) {
            // Verificar si la cuenta está activa
            if (!$user['activo']) {
                $_SESSION['error'] = "Tu cuenta está desactivada. Contacta al administrador para más información.";
                return false;
            }
            
            $_SESSION['usuario'] = [
                'id_usuario' => $user['id_usuario'],
                'nombre' => $user['nombre'],
                'email' => $user['email'],
                'rol' => $user['rol'],
            ];
            return true;
        }
        return false;
    } catch (Exception $e) {
        error_log("Error en login_usuario: " . $e->getMessage());
        return false;
    }
}

function logout_usuario(): void {
    unset($_SESSION['usuario']);
}

function usuario_actual(): ?array {
    return $_SESSION['usuario'] ?? null;
}

function require_login(): void {
    if (!usuario_actual()) {
        // Redirigir al controlador frontal a la vista de login
        header("Location: index.php?sec=login");
        exit;
    }
}

function require_admin(): void {
    $u = usuario_actual();
    if (!$u || $u['rol'] !== 'admin') {
        header("Location: ../index.php");
        exit;
    }
}

/**
 * Obtener la URL completa de una imagen
 * Si la ruta es relativa, la convierte a absoluta desde la raíz del sitio
 */
function obtener_url_imagen(?string $ruta): string {
    if (empty($ruta)) {
        return 'https://via.placeholder.com/400x400?text=Sin+Imagen';
    }
    
    // asset_url() respeta APP_BASE_PATH y deja pasar las URLs absolutas tal cual.
    return asset_url($ruta);
}
