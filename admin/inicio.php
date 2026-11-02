<?php
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Banner -->
<div class="mb-8">
    <h1 class="text-3xl md:text-4xl font-orbitron font-bold mb-2" style="background: linear-gradient(90deg, #818cf8, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-shadow: 0 0 20px rgba(129, 140, 248, 0.3);">
        Panel de Administración
    </h1>
    <p class="text-slate-400 text-lg">Gestioná todos los aspectos de tu tienda mística desde un solo lugar</p>
</div>

<!-- Dashboard Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Duendes -->
    <a href="index.php?sec=duendes" class="group relative rounded-2xl p-6 transition-all duration-300" style="background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(129, 140, 248, 0.3); backdrop-filter: blur(10px);" onmouseover="this.style.borderColor='rgba(129, 140, 248, 0.6)'; this.style.boxShadow='0 0 20px rgba(129, 140, 248, 0.3)';" onmouseout="this.style.borderColor='rgba(129, 140, 248, 0.3)'; this.style.boxShadow='none';">
        <div class="absolute top-0 right-0 w-32 h-32 rounded-full blur-3xl transition-all" style="background: rgba(129, 140, 248, 0.1);"></div>
        <div class="relative">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(135deg, rgba(129, 140, 248, 0.3), rgba(59, 130, 246, 0.3)); border: 1px solid rgba(129, 140, 248, 0.4); box-shadow: 0 0 15px rgba(129, 140, 248, 0.3);">
                <i class="fas fa-hat-wizard text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-orbitron font-bold text-white mb-2 group-hover:text-[#818cf8] transition-colors">Duendes</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Creá, editá o eliminá duendes. Ajustá rarezas, elementos, precios y habilidades.</p>
            <div class="mt-4 flex items-center text-sm font-medium" style="color: #818cf8;">
                <span>Gestionar</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Blogs -->
    <a href="index.php?sec=blogs" class="group relative rounded-2xl p-6 transition-all duration-300" style="background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(129, 140, 248, 0.3); backdrop-filter: blur(10px);" onmouseover="this.style.borderColor='rgba(129, 140, 248, 0.6)'; this.style.boxShadow='0 0 20px rgba(129, 140, 248, 0.3)';" onmouseout="this.style.borderColor='rgba(129, 140, 248, 0.3)'; this.style.boxShadow='none';">
        <div class="absolute top-0 right-0 w-32 h-32 rounded-full blur-3xl transition-all" style="background: rgba(129, 140, 248, 0.1);"></div>
        <div class="relative">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(135deg, rgba(129, 140, 248, 0.3), rgba(236, 72, 153, 0.3)); border: 1px solid rgba(129, 140, 248, 0.4); box-shadow: 0 0 15px rgba(129, 140, 248, 0.3);">
                <i class="fas fa-newspaper text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-orbitron font-bold text-white mb-2 group-hover:text-[#818cf8] transition-colors">Blog</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Publicá nuevas historias y mantené iluminada a la comunidad con conocimiento arcano.</p>
            <div class="mt-4 flex items-center text-sm font-medium" style="color: #818cf8;">
                <span>Gestionar</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Pedidos -->
    <a href="index.php?sec=pedidos" class="group relative rounded-2xl p-6 transition-all duration-300" style="background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(129, 140, 248, 0.3); backdrop-filter: blur(10px);" onmouseover="this.style.borderColor='rgba(129, 140, 248, 0.6)'; this.style.boxShadow='0 0 20px rgba(129, 140, 248, 0.3)';" onmouseout="this.style.borderColor='rgba(129, 140, 248, 0.3)'; this.style.boxShadow='none';">
        <div class="absolute top-0 right-0 w-32 h-32 rounded-full blur-3xl transition-all" style="background: rgba(236, 72, 153, 0.1);"></div>
        <div class="relative">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(135deg, rgba(236, 72, 153, 0.3), rgba(239, 68, 68, 0.3)); border: 1px solid rgba(236, 72, 153, 0.4); box-shadow: 0 0 15px rgba(236, 72, 153, 0.3);">
                <i class="fas fa-shopping-bag text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-orbitron font-bold text-white mb-2 group-hover:text-[#ec4899] transition-colors">Pedidos</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Revisá órdenes y actualizá estados para que cada duende llegue sin retrasos.</p>
            <div class="mt-4 flex items-center text-sm font-medium" style="color: #ec4899;">
                <span>Gestionar</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Contactos -->
    <a href="index.php?sec=contactos" class="group relative rounded-2xl p-6 transition-all duration-300" style="background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(129, 140, 248, 0.3); backdrop-filter: blur(10px);" onmouseover="this.style.borderColor='rgba(129, 140, 248, 0.6)'; this.style.boxShadow='0 0 20px rgba(129, 140, 248, 0.3)';" onmouseout="this.style.borderColor='rgba(129, 140, 248, 0.3)'; this.style.boxShadow='none';">
        <div class="absolute top-0 right-0 w-32 h-32 rounded-full blur-3xl transition-all" style="background: rgba(34, 197, 94, 0.1);"></div>
        <div class="relative">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.3), rgba(59, 130, 246, 0.3)); border: 1px solid rgba(34, 197, 94, 0.4); box-shadow: 0 0 15px rgba(34, 197, 94, 0.3);">
                <i class="fas fa-envelope text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-orbitron font-bold text-white mb-2 group-hover:text-[#22c55e] transition-colors">Contactos</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Respondé mensajes y mantené la reputación mágica en alto con respuestas veloces.</p>
            <div class="mt-4 flex items-center text-sm font-medium" style="color: #22c55e;">
                <span>Gestionar</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Usuarios -->
    <a href="index.php?sec=usuarios" class="group relative rounded-2xl p-6 transition-all duration-300" style="background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(129, 140, 248, 0.3); backdrop-filter: blur(10px);" onmouseover="this.style.borderColor='rgba(129, 140, 248, 0.6)'; this.style.boxShadow='0 0 20px rgba(129, 140, 248, 0.3)';" onmouseout="this.style.borderColor='rgba(129, 140, 248, 0.3)'; this.style.boxShadow='none';">
        <div class="absolute top-0 right-0 w-32 h-32 rounded-full blur-3xl transition-all" style="background: rgba(251, 191, 36, 0.1);"></div>
        <div class="relative">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.3), rgba(249, 115, 22, 0.3)); border: 1px solid rgba(251, 191, 36, 0.4); box-shadow: 0 0 15px rgba(251, 191, 36, 0.3);">
                <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-orbitron font-bold text-white mb-2 group-hover:text-[#fbbf24] transition-colors">Usuarios</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Gestioná roles y mantené actualizado el registro de guardianes de la tienda.</p>
            <div class="mt-4 flex items-center text-sm font-medium" style="color: #fbbf24;">
                <span>Gestionar</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>

    <!-- Catálogos -->
    <a href="index.php?sec=catalogos" class="group relative rounded-2xl p-6 transition-all duration-300" style="background: rgba(0, 0, 0, 0.6); border: 1px solid rgba(129, 140, 248, 0.3); backdrop-filter: blur(10px);" onmouseover="this.style.borderColor='rgba(129, 140, 248, 0.6)'; this.style.boxShadow='0 0 20px rgba(129, 140, 248, 0.3)';" onmouseout="this.style.borderColor='rgba(129, 140, 248, 0.3)'; this.style.boxShadow='none';">
        <div class="absolute top-0 right-0 w-32 h-32 rounded-full blur-3xl transition-all" style="background: rgba(168, 85, 247, 0.1);"></div>
        <div class="relative">
            <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform" style="background: linear-gradient(135deg, rgba(168, 85, 247, 0.3), rgba(139, 92, 246, 0.3)); border: 1px solid rgba(168, 85, 247, 0.4); box-shadow: 0 0 15px rgba(168, 85, 247, 0.3);">
                <i class="fas fa-database text-white text-2xl"></i>
            </div>
            <h3 class="text-xl font-orbitron font-bold text-white mb-2 group-hover:text-[#a855f7] transition-colors">Catálogos</h3>
            <p class="text-slate-400 text-sm leading-relaxed">Administrá elementos, rarezas y materiales base para crear duendes únicos.</p>
            <div class="mt-4 flex items-center text-sm font-medium" style="color: #a855f7;">
                <span>Gestionar</span>
                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </div>
        </div>
    </a>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
