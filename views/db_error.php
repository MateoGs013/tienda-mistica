<?php
// views/db_error.php
http_response_code(503);
$base = defined('APP_BASE_PATH') ? APP_BASE_PATH : '/';
?>
<!doctype html>
<html lang="es" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio temporalmente no disponible — Tienda Mística</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0a0a0f;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(129, 140, 248, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(129, 140, 248, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(129, 140, 248, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(236, 72, 153, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .db-error-container {
            position: relative;
            z-index: 1;
            max-width: 800px;
            width: 90%;
            padding: 48px;
            background: rgba(10, 10, 15, 0.95);
            border: 2px solid rgba(239, 68, 68, 0.3);
            border-radius: 16px;
            box-shadow: 
                0 0 60px rgba(239, 68, 68, 0.2),
                inset 0 0 40px rgba(239, 68, 68, 0.03);
            backdrop-filter: blur(10px);
        }

        .db-error-icon {
            text-align: center;
            margin-bottom: 32px;
        }

        .db-error-icon i {
            font-size: 80px;
            color: #ef4444;
            filter: drop-shadow(0 0 20px rgba(239, 68, 68, 0.5));
            animation: pulse-error 2s ease-in-out infinite;
        }

        @keyframes pulse-error {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.05); }
        }

        .db-error-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            margin: 0 0 16px 0;
            background: linear-gradient(90deg, #ef4444 0%, #f87171 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .db-error-subtitle {
            text-align: center;
            color: #e2e8f0;
            font-size: 18px;
            margin: 0 0 32px 0;
            line-height: 1.6;
        }

        .db-error-message {
            background: rgba(239, 68, 68, 0.05);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 32px;
        }

        .db-error-message p {
            color: #cbd5e1;
            margin: 0 0 16px 0;
            font-size: 15px;
            line-height: 1.7;
        }

        .db-error-message ul {
            margin: 0;
            padding-left: 24px;
            color: #94a3b8;
        }

        .db-error-message li {
            margin: 8px 0;
            line-height: 1.6;
        }

        .db-error-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .error-btn {
            font-family: 'Orbitron', sans-serif;
            font-size: 14px;
            font-weight: 600;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .error-btn--primary {
            background: linear-gradient(90deg, #ef4444 0%, #dc2626 100%);
            color: #ffffff;
            border: 2px solid rgba(239, 68, 68, 0.5);
            box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
        }

        .error-btn--primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.5);
        }

        .error-btn--secondary {
            background: rgba(0, 0, 0, 0.5);
            color: #818cf8;
            border: 2px solid rgba(129, 140, 248, 0.3);
        }

        .error-btn--secondary:hover {
            background: rgba(129, 140, 248, 0.1);
            border-color: rgba(129, 140, 248, 0.5);
            box-shadow: 0 0 20px rgba(129, 140, 248, 0.2);
        }

        .db-error-footer {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="db-error-container">
        <div class="db-error-icon">
            <i class="fas fa-database"></i>
        </div>
        
        <h1 class="db-error-title">Conexión Interrumpida</h1>
        <p class="db-error-subtitle">El portal místico a nuestros registros está temporalmente cerrado</p>
        
        <div class="db-error-message">
            <p>No hemos podido establecer conexión con la base de datos. Nuestro equipo de magos técnicos ya ha sido notificado y está trabajando para restaurar el servicio.</p>
            
            <p><strong>Podés intentar lo siguiente:</strong></p>
            <ul>
                <li>Refrescar la página en unos minutos</li>
                <li>Volver al inicio y explorar otras secciones</li>
                <li>Contactarnos si el problema persiste</li>
            </ul>
        </div>

        <div class="db-error-actions">
            <a class="error-btn error-btn--primary" href="<?php echo $base; ?>index.php">
                <i class="fas fa-home"></i> Volver al Inicio
            </a>
            <a class="error-btn error-btn--secondary" href="<?php echo $base; ?>index.php?sec=contacto">
                <i class="fas fa-envelope"></i> Contacto
            </a>
        </div>

        <div class="db-error-footer">
            <i class="fas fa-info-circle"></i> Si sos administrador, revisá los logs del servidor o las credenciales de configuración de la base de datos.
        </div>
    </div>
</body>
</html>
