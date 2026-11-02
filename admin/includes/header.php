<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/url.php';
require_admin();

$currentSec = $_GET['sec'] ?? 'inicio';
?>
<!doctype html>
<html lang="es" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tienda Mística</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Orbitron:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        arcade: {
                            base: '#040714',
                            panel: '#090e20',
                            cyan: '#3b82f6',
                            magenta: '#ec4899',
                            violet: '#818cf8',
                            gold: '#fbbf24',
                            emerald: '#22c55e',
                            amber: '#f97316',
                            rose: '#ef4444',
                            mystic: '#a58bff'
                        }
                    },
                    fontFamily: {
                        orbitron: ['Orbitron', 'sans-serif'],
                        body: ['Inter', 'system-ui', 'sans-serif']
                    },
                    boxShadow: {
                        neon: '0 0 10px rgba(59,130,246,0.55), 0 0 20px rgba(129,140,248,0.32)',
                        'neon-strong': '0 0 12px rgba(236,72,153,0.72), 0 0 32px rgba(251,191,36,0.45)'
                    }
                }
            }
        };
    </script>
    <link rel="stylesheet" href="<?php echo asset_url('assets/css/style.css'); ?>?v=<?php echo time(); ?>">
</head>
<body class="min-h-screen text-slate-100 font-body antialiased" style="background: #000; position: relative; overflow-x: hidden;">
<div class="relative min-h-screen flex flex-col" style="background: linear-gradient(180deg, #0a0a0a 0%, #000 50%, #0a0a0a 100%);">
    <!-- Grid pattern igual a la página principal -->
    <div class="fixed inset-0 pointer-events-none z-0" style="background-image: linear-gradient(rgba(129, 140, 248, 0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(129, 140, 248, 0.05) 1px, transparent 1px); background-size: 40px 40px;"></div>
    
    <!-- Header con estilos de la página principal -->
    <header class="sticky top-0 z-50 backdrop-blur-[10px]" style="background: rgba(0, 0, 0, 0.95); border-bottom: 1px solid rgba(129, 140, 248, 0.3);">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="index.php?sec=inicio" class="flex items-center gap-3 group transition-transform hover:-translate-y-0.5">
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center" style="background: linear-gradient(135deg, rgba(129, 140, 248, 0.2), rgba(236, 72, 153, 0.2)); border: 2px solid rgba(129, 140, 248, 0.4); box-shadow: 0 0 20px rgba(129, 140, 248, 0.3);">
                        <i class="fas fa-shield-halved text-2xl" style="color: #818cf8; text-shadow: 0 0 10px rgba(129, 140, 248, 0.5);"></i>
                    </div>
                    <div class="hidden sm:block">
                        <p class="font-orbitron text-xs font-normal tracking-wider text-white" style="text-shadow: 0 0 10px rgba(129, 140, 248, 0.5); line-height: 1.2;">ADMIN</p>
                        <p class="font-orbitron text-[0.5rem] tracking-widest" style="color: rgba(59, 130, 246, 0.8);">PANEL DE CONTROL</p>
                    </div>
                </a>
                
                <!-- Acciones -->
                <div class="flex items-center gap-2">
                    <a href="../index.php?sec=inicio" class="px-4 py-2 text-sm font-medium rounded-lg transition-all" style="color: rgba(255, 255, 255, 0.7); border: 1px solid transparent;" onmouseover="this.style.color='rgba(59, 130, 246, 0.9)'; this.style.background='rgba(129, 140, 248, 0.1)'; this.style.borderColor='rgba(129, 140, 248, 0.3)';" onmouseout="this.style.color='rgba(255, 255, 255, 0.7)'; this.style.background='transparent'; this.style.borderColor='transparent';">
                        <i class="fas fa-home mr-2"></i>
                        <span class="hidden sm:inline">Sitio</span>
                    </a>
                    <a href="index.php?sec=logout" class="px-4 py-2 text-sm font-medium rounded-lg transition-all" style="color: rgba(236, 72, 153, 0.9); border: 1px solid transparent;" onmouseover="this.style.color='#fff'; this.style.background='rgba(236, 72, 153, 0.2)'; this.style.borderColor='rgba(236, 72, 153, 0.4)';" onmouseout="this.style.color='rgba(236, 72, 153, 0.9)'; this.style.background='transparent'; this.style.borderColor='transparent';">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span class="hidden sm:inline">Salir</span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="flex-1">
        <div class="max-w-7xl mx-auto w-full px-4 py-8 lg:px-8">
