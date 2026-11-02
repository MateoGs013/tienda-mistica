<?php
/**
 * security-bootstrap.php — se ejecuta antes de cada request (auto_prepend_file).
 * Endurece la cookie de sesión ANTES de cualquier session_start(), cubriendo
 * todos los puntos de entrada sin tocar cada archivo.
 *   - HttpOnly: no accesible desde JavaScript.
 *   - SameSite=Lax: no viaja en requests cross-site (mitiga CSRF).
 *   - Secure: solo cuando la request llega por HTTPS (p. ej. detrás de Traefik).
 */
if (PHP_SAPI !== 'cli') {
    $https = (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https')
          || (($_SERVER['HTTPS'] ?? '') === 'on')
          || ((int)($_SERVER['SERVER_PORT'] ?? 0) === 443);

    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_samesite', 'Lax');
    ini_set('session.cookie_secure', $https ? '1' : '0');
}
