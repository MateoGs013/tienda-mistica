<?php
if (!defined('APP_BASE_PATH')) {
    // Ruta base configurable por entorno. En XAMPP el sitio vive en /tienda_mistica/;
    // en el VPS (dominio propio) va en la raíz: definir APP_BASE_PATH=/ en producción.
    $base = getenv('APP_BASE_PATH');
    if ($base === false || $base === '') {
        $base = '/tienda_mistica/';
    }
    $base = '/' . trim($base, '/');
    if ($base !== '/') {
        $base .= '/';
    }
    define('APP_BASE_PATH', $base);
}

/**
 * Genera URLs con parámetros GET estándar
 */
function url($seccion, $params = []) {
    $base = APP_BASE_PATH;
    
    // Usar index.php con parámetros GET
    $url = $base . 'index.php?sec=' . $seccion;
    
    // Agregar parámetros adicionales si existen
    if (!empty($params)) {
        $url .= '&' . http_build_query($params);
    }
    
    return $url;
}

/**
 * Normaliza rutas hacia assets estáticos (imágenes, uploads, etc.)
 */
function asset_url(string $path): string {
    if (preg_match('/^https?:\/\//i', $path)) {
        return $path;
    }

    return APP_BASE_PATH . ltrim($path, '/');
}
