<?php
require_once __DIR__ . '/../includes/url.php';
require_once "classes/Duende.php";

$mensaje = $_SESSION['mensaje'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['mensaje'], $_SESSION['error']);

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$duende = null;
try {
    $duende = Duende::detalleEnriquecido($id);
} catch (Exception $e) {
    error_log("Error al obtener detalle del duende: " . $e->getMessage());
}

if (!$duende): ?>
    <div class="panel-glass mt-10 p-10 text-center text-slate-200">
        <p class="font-orbitron text-2xl text-arcade-magenta">Duende no encontrado</p>
        <p class="mt-3 text-sm text-slate-300">La ficha solicitada fue absorbida por la niebla mágica. Volvé al <a class="text-arcade-cyan hover:text-arcade-gold" href="index.php?sec=catalogo">catálogo</a> para seguir explorando.</p>
    </div>
<?php else:
    $imagenUrl = obtener_url_imagen($duende['imagen_url'] ?? '');

    $recomendados = Duende::catalogoInteractivo([
        'elemento' => [$duende['id_elemento'] ?? 0],
        'rareza' => [$duende['id_rareza'] ?? 0],
        'poder_min' => max(0, (int)($duende['poder_total'] ?? 0) - 20),
        'solo_disponibles' => true,
        'page' => 1,
        'per_page' => 3,
    ], true)['items'];

    $recomendados = array_values(array_filter($recomendados, static fn($item) => (int)$item['id_duende'] !== (int)$duende['id_duende']));
?>

<!-- Back Button -->
<div class="mb-6">
    <a href="index.php?sec=catalogo" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg font-orbitron text-sm uppercase tracking-wider transition-all duration-300 hover:scale-105 hover:shadow-xl" style="background: rgba(0, 0, 0, 0.8); color: #818cf8; border: 2px solid rgba(129, 140, 248, 0.5); box-shadow: 0 0 20px rgba(129, 140, 248, 0.2);">
        <i class="fas fa-arrow-left"></i>
        <span>Volver al Catálogo</span>
    </a>
</div>

<!-- Messages -->
<?php if ($mensaje): ?>
    <div class="mb-6 p-4 rounded-lg font-orbitron text-sm uppercase tracking-wider animate-pulse" style="background: rgba(34, 197, 94, 0.15); color: #22c55e; border: 2px solid rgba(34, 197, 94, 0.3); box-shadow: 0 0 20px rgba(34, 197, 94, 0.2);">
        <i class="fas fa-check-circle mr-2"></i>
        <?php echo htmlspecialchars($mensaje); ?>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="mb-6 p-4 rounded-lg font-orbitron text-sm uppercase tracking-wider" style="background: rgba(239, 68, 68, 0.15); color: #ef4444; border: 2px solid rgba(239, 68, 68, 0.3); box-shadow: 0 0 20px rgba(239, 68, 68, 0.2);">
        <i class="fas fa-exclamation-triangle mr-2"></i>
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<!-- Hero Section with Image -->
<div class="relative overflow-hidden rounded-2xl" style="background: rgba(0, 0, 0, 0.95); border: 2px solid rgba(129, 140, 248, 0.3); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);">
    <div class="grid lg:grid-cols-2 gap-0">
        <!-- Image Column -->
        <div class="relative">
            <?php if ($imagenUrl): ?>
                <div class="aspect-square lg:aspect-auto lg:h-full relative overflow-hidden" style="background: rgba(0, 0, 0, 0.6);">
                    <img src="<?php echo htmlspecialchars($imagenUrl); ?>" alt="<?php echo htmlspecialchars($duende['nombre']); ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.8) 100%);"></div>
                    <!-- Rareza Badge -->
                    <div class="absolute top-4 left-4 px-4 py-2 rounded-lg font-orbitron text-xs uppercase tracking-wider backdrop-blur-sm" style="background: rgba(0, 0, 0, 0.7); border: 2px solid <?php echo $duende['rareza_color']; ?>; color: <?php echo $duende['rareza_color']; ?>; box-shadow: 0 0 30px <?php echo $duende['rareza_color']; ?>66, inset 0 0 20px <?php echo $duende['rareza_color']; ?>22;">
                        ★ <?php echo htmlspecialchars($duende['rareza'] ?? '-'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Content Column -->
        <div class="p-8 lg:p-10 space-y-6" style="background: rgba(0, 0, 0, 0.6);">
            <!-- Header -->
            <div>
                <p class="font-retro text-xs uppercase tracking-[0.4em] mb-3" style="color: rgba(129, 140, 248, 0.7);">ID #<?php echo $duende['id_duende']; ?> • POWER-UP MÍSTICO</p>
                <h1 class="font-orbitron text-4xl lg:text-5xl text-white mb-4 leading-tight" style="text-shadow: 0 0 40px rgba(129, 140, 248, 0.6), 0 0 20px rgba(129, 140, 248, 0.4);"><?php echo htmlspecialchars($duende['nombre']); ?></h1>
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); color: #818cf8; border: 2px solid rgba(129, 140, 248, 0.5); box-shadow: 0 0 15px rgba(129, 140, 248, 0.3);">
                        <i class="fas fa-tag mr-2"></i><?php echo htmlspecialchars($duende['tipo'] ?? 'Duende'); ?>
                    </span>
                    <span class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); color: #ec4899; border: 2px solid rgba(236, 72, 153, 0.5); box-shadow: 0 0 15px rgba(236, 72, 153, 0.3);">
                        <i class="fas fa-fire mr-2"></i><?php echo htmlspecialchars($duende['elemento'] ?? '-'); ?>
                    </span>
                    <span class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-bold transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); color: #fbbf24; border: 2px solid rgba(251, 191, 36, 0.5); box-shadow: 0 0 15px rgba(251, 191, 36, 0.3);">
                        <i class="fas fa-star mr-2"></i><?php echo (int)($duende['popularidad'] ?? 0); ?>%
                    </span>
                </div>
            </div>

            <!-- Description -->
            <div class="p-4 rounded-lg" style="background: rgba(0, 0, 0, 0.4); border-left: 3px solid rgba(129, 140, 248, 0.6);">
                <p class="text-base leading-relaxed" style="color: rgba(255, 255, 255, 0.9);">
                    <?php echo nl2br(htmlspecialchars($duende['descripcion'] ?? '')); ?>
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="text-center p-4 rounded-lg transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(251, 191, 36, 0.4); box-shadow: 0 0 20px rgba(251, 191, 36, 0.2);">
                    <p class="text-xs uppercase tracking-wider mb-2" style="color: rgba(251, 191, 36, 0.7);"><i class="fas fa-bolt mr-1"></i>Poder</p>
                    <p class="font-orbitron text-3xl font-bold text-arcade-gold"><?php echo (int)($duende['poder_total'] ?? 0); ?></p>
                </div>
                <div class="text-center p-4 rounded-lg transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(129, 140, 248, 0.4); box-shadow: 0 0 20px rgba(129, 140, 248, 0.2);">
                    <p class="text-xs uppercase tracking-wider mb-2" style="color: rgba(129, 140, 248, 0.7);"><i class="fas fa-clover mr-1"></i>Suerte</p>
                    <p class="font-orbitron text-3xl font-bold text-arcade-cyan"><?php echo (float)($duende['indice_suerte'] ?? 0); ?></p>
                </div>
                <div class="text-center p-4 rounded-lg transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(236, 72, 153, 0.4); box-shadow: 0 0 20px rgba(236, 72, 153, 0.2);">
                    <p class="text-xs uppercase tracking-wider mb-2" style="color: rgba(236, 72, 153, 0.7);"><i class="fas fa-exclamation-triangle mr-1"></i>Riesgo</p>
                    <p class="font-orbitron text-3xl font-bold text-arcade-magenta"><?php echo (int)($duende['nivel_riesgo'] ?? 0); ?></p>
                </div>
                <div class="text-center p-4 rounded-lg transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(129, 140, 248, 0.4); box-shadow: 0 0 20px rgba(129, 140, 248, 0.2);">
                    <p class="text-xs uppercase tracking-wider mb-2" style="color: rgba(129, 140, 248, 0.7);"><i class="fas fa-ruler-vertical mr-1"></i>Altura</p>
                    <p class="font-orbitron text-3xl font-bold text-slate-200"><?php echo $duende['altura_cm'] ?? '-'; ?><span class="text-sm">cm</span></p>
                </div>
            </div>

            <!-- Price & Action -->
            <div class="pt-6 mt-6" style="border-top: 2px solid rgba(129, 140, 248, 0.2);">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-xs uppercase tracking-wider mb-1" style="color: rgba(251, 191, 36, 0.7);">Precio</p>
                        <div class="flex items-baseline gap-2">
                            <span class="font-orbitron text-5xl font-bold text-arcade-gold" style="text-shadow: 0 0 20px rgba(251, 191, 36, 0.5);"><?php echo number_format((float)($duende['precio_en_oro'] ?? 0), 0, '.', '.'); ?></span>
                            <span class="text-base uppercase tracking-wider font-bold" style="color: rgba(251, 191, 36, 0.8);">ORO</span>
                        </div>
                    </div>
                    <?php if ($duende['disponible'] ?? true): ?>
                        <span class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-bold" style="background: rgba(34, 197, 94, 0.2); color: #22c55e; border: 2px solid rgba(34, 197, 94, 0.4);">
                            <i class="fas fa-check-circle mr-1"></i>Disponible
                        </span>
                    <?php else: ?>
                        <span class="px-4 py-2 rounded-lg text-xs uppercase tracking-wider font-bold" style="background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 2px solid rgba(239, 68, 68, 0.4);">
                            <i class="fas fa-times-circle mr-1"></i>Agotado
                        </span>
                    <?php endif; ?>
                </div>
                <?php if (!empty($_SESSION['usuario'])): ?>
                    <form method="post" action="actions/carrito_actualizar.php">
                        <input type="hidden" name="action" value="agregar">
                        <input type="hidden" name="id_duende" value="<?php echo $duende['id_duende']; ?>">
                        <input type="hidden" name="redirect" value="detalle_duende&id=<?php echo $duende['id_duende']; ?>">
                        <button type="submit" class="w-full px-8 py-5 font-orbitron font-bold text-base uppercase tracking-wider rounded-xl transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl" style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)); border: 3px solid rgba(129, 140, 248, 0.6); color: white; box-shadow: 0 0 30px rgba(129, 140, 248, 0.4), inset 0 0 20px rgba(129, 140, 248, 0.1);">
                            <i class="fas fa-shopping-cart mr-3"></i>AGREGAR AL CARRITO
                        </button>
                    </form>
                <?php else: ?>
                    <a href="index.php?sec=login" class="block text-center px-8 py-5 font-orbitron font-bold text-base uppercase tracking-wider rounded-xl transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl" style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)); border: 3px solid rgba(236, 72, 153, 0.6); color: white; box-shadow: 0 0 30px rgba(236, 72, 153, 0.4), inset 0 0 20px rgba(236, 72, 153, 0.1);">
                        <i class="fas fa-lock mr-3"></i>INGRESÁ PARA COMPRAR
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

    <!-- Magical Properties -->
    <div class="mt-8 rounded-xl p-6" style="background: rgba(0, 0, 0, 0.8); border: 2px solid rgba(129, 140, 248, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);">
        <h2 class="font-orbitron text-xl uppercase tracking-wider mb-6 flex items-center gap-3" style="color: #818cf8; text-shadow: 0 0 20px rgba(129, 140, 248, 0.5);">
            <i class="fas fa-magic"></i> PROPIEDADES MÁGICAS
        </h2>
        <div class="space-y-3">
            <div class="p-4 rounded-lg transition-all duration-300 hover:translate-x-1" style="background: rgba(0, 0, 0, 0.5); border-left: 4px solid #818cf8; box-shadow: 0 0 15px rgba(129, 140, 248, 0.1);">
                <p class="text-xs uppercase tracking-wider font-bold mb-2" style="color: #818cf8;"><i class="fas fa-wand-magic mr-2"></i>Efecto Mágico</p>
                <p style="color: rgba(255, 255, 255, 0.9);"><?php echo htmlspecialchars($duende['efecto_magico'] ?? 'Sin registro'); ?></p>
            </div>
            <div class="p-4 rounded-lg transition-all duration-300 hover:translate-x-1" style="background: rgba(0, 0, 0, 0.5); border-left: 4px solid #ec4899; box-shadow: 0 0 15px rgba(236, 72, 153, 0.1);">
                <p class="text-xs uppercase tracking-wider font-bold mb-2" style="color: #ec4899;"><i class="fas fa-smile mr-2"></i>Personalidad</p>
                <p style="color: rgba(255, 255, 255, 0.9);"><?php echo htmlspecialchars($duende['personalidad'] ?? 'Cambiante'); ?></p>
            </div>
            <div class="p-4 rounded-lg transition-all duration-300 hover:translate-x-1" style="background: rgba(0, 0, 0, 0.5); border-left: 4px solid #fbbf24; box-shadow: 0 0 15px rgba(251, 191, 36, 0.1);">
                <p class="text-xs uppercase tracking-wider font-bold mb-2" style="color: #fbbf24;"><i class="fas fa-map-marker-alt mr-2"></i>Origen Mitológico</p>
                <p style="color: rgba(255, 255, 255, 0.9);"><?php echo htmlspecialchars($duende['origen_mitologico'] ?? 'Bosques arcanos desconocidos'); ?></p>
            </div>
            <div class="p-4 rounded-lg transition-all duration-300 hover:translate-x-1" style="background: rgba(0, 0, 0, 0.5); border-left: 4px solid #818cf8; box-shadow: 0 0 15px rgba(129, 140, 248, 0.1);">
                <p class="text-xs uppercase tracking-wider font-bold mb-2" style="color: #818cf8;"><i class="fas fa-cube mr-2"></i>Material</p>
                <p style="color: rgba(255, 255, 255, 0.9);"><?php echo htmlspecialchars($duende['material'] ?? 'Materia arcana'); ?></p>
            </div>
        </div>
    </div>

    <!-- Usage Info -->
    <div class="mt-8 rounded-xl p-6" style="background: rgba(0, 0, 0, 0.8); border: 2px solid rgba(236, 72, 153, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);">
        <h2 class="font-orbitron text-xl uppercase tracking-wider mb-6 flex items-center gap-3" style="color: #ec4899; text-shadow: 0 0 20px rgba(236, 72, 153, 0.5);">
            <i class="fas fa-info-circle"></i> INFORMACIÓN DE USO
        </h2>
        <div class="space-y-3">
            <div class="p-4 rounded-lg transition-all duration-300 hover:translate-x-1" style="background: rgba(0, 0, 0, 0.5); border-left: 4px solid #ec4899; box-shadow: 0 0 15px rgba(236, 72, 153, 0.1);">
                <p class="text-xs uppercase tracking-wider font-bold mb-2" style="color: #ec4899;"><i class="fas fa-users mr-2"></i>Recomendado Para</p>
                <p style="color: rgba(255, 255, 255, 0.9);"><?php echo htmlspecialchars($duende['recomendado_para'] ?? 'Aventureros versátiles'); ?></p>
            </div>
            <?php if (!empty($duende['advertencias'])): ?>
                <div class="p-5 rounded-lg" style="background: rgba(0, 0, 0, 0.7); border: 2px solid rgba(251, 191, 36, 0.5); box-shadow: 0 0 25px rgba(251, 191, 36, 0.3);">
                    <p class="text-sm uppercase tracking-wider font-bold mb-3 flex items-center gap-2" style="color: #fbbf24;">
                        <i class="fas fa-exclamation-triangle"></i> ADVERTENCIAS IMPORTANTES
                    </p>
                    <p class="font-semibold" style="color: #fbbf24;"><?php echo htmlspecialchars($duende['advertencias']); ?></p>
                </div>
            <?php endif; ?>
            <?php if (!empty($duende['accesorios_list'])): ?>
                <div class="p-4 rounded-lg transition-all duration-300 hover:translate-x-1" style="background: rgba(0, 0, 0, 0.5); border-left: 4px solid #818cf8; box-shadow: 0 0 15px rgba(129, 140, 248, 0.1);">
                    <p class="text-xs uppercase tracking-wider font-bold mb-3" style="color: #818cf8;"><i class="fas fa-gift mr-2"></i>Accesorios Incluidos</p>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($duende['accesorios_list'] as $accesorio): ?>
                            <span class="px-3 py-2 rounded-lg text-xs font-bold transition-all duration-300 hover:scale-105" style="background: rgba(0, 0, 0, 0.6); color: #818cf8; border: 2px solid rgba(129, 140, 248, 0.5);">
                                <?php echo htmlspecialchars($accesorio); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Related Products -->
<?php if (!empty($recomendados)): ?>
    <section class="mt-12 p-8 rounded-2xl" style="background: rgba(0, 0, 0, 0.6); border: 2px solid rgba(129, 140, 248, 0.3);">
        <div class="mb-8">
            <h2 class="font-orbitron text-3xl text-white mb-3 flex items-center gap-3" style="text-shadow: 0 0 20px rgba(129, 140, 248, 0.5);">
                <i class="fas fa-sparkles" style="color: #ec4899;"></i>
                POWER-UPS COMPATIBLES
            </h2>
            <p style="color: rgba(255, 255, 255, 0.6);">Estos duendes comparten elemento o rareza con <span class="font-bold" style="color: #818cf8;"><?php echo htmlspecialchars($duende['nombre']); ?></span></p>
        </div>
        
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($recomendados as $reco):
                $recoImg = obtener_url_imagen($reco['imagen_url'] ?? '');
            ?>
                <a href="index.php?sec=detalle_duende&id=<?php echo $reco['id_duende']; ?>" class="group block rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 hover:shadow-2xl" style="background: rgba(0, 0, 0, 0.8); border: 2px solid rgba(129, 140, 248, 0.3); box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);">
                    <?php if ($recoImg): ?>
                        <div class="relative aspect-video overflow-hidden">
                            <img src="<?php echo htmlspecialchars($recoImg); ?>" alt="<?php echo htmlspecialchars($reco['nombre']); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0" style="background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.95) 100%);"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="font-orbitron text-lg text-white mb-2" style="text-shadow: 0 2px 10px rgba(0,0,0,0.8);"><?php echo htmlspecialchars($reco['nombre']); ?></h3>
                                <p class="text-xs uppercase tracking-wider" style="color: rgba(255, 255, 255, 0.8);">
                                    <?php echo htmlspecialchars($reco['rareza'] ?? '-'); ?> • <?php echo htmlspecialchars($reco['elemento'] ?? '-'); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="p-5" style="background: rgba(0, 0, 0, 0.5);">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="font-orbitron text-2xl font-bold text-arcade-gold" style="text-shadow: 0 0 15px rgba(251, 191, 36, 0.5);">
                                    <?php echo number_format((float)($reco['precio_en_oro'] ?? 0), 0, '.', '.'); ?>
                                </span>
                                <span class="text-xs uppercase tracking-wider" style="color: rgba(251, 191, 36, 0.7);"> ORO</span>
                            </div>
                            <span class="px-3 py-2 rounded-lg text-xs font-bold" style="background: rgba(0, 0, 0, 0.6); color: #818cf8; border: 2px solid rgba(129, 140, 248, 0.5);">
                                <i class="fas fa-bolt mr-1"></i><?php echo (int)($reco['poder_total'] ?? 0); ?>
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>

<?php endif; ?>
