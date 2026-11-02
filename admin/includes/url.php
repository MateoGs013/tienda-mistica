<?php
require_once __DIR__ . '/../../includes/url.php';

/**
 * Genera URLs con parámetros GET estándar para el panel de administración
 */
function admin_url($seccion, $params = []) {
    $base = APP_BASE_PATH . 'admin/';
    
    // Usar index.php con parámetros GET
    $url = $base . 'index.php?sec=' . $seccion;
    
    // Agregar parámetros adicionales si existen
    if (!empty($params)) {
        $url .= '&' . http_build_query($params);
    }
    
    return $url;
}
