<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/../classes/Duende.php';
require_once __DIR__ . '/../classes/Catalogo.php';

$id = (int)($_GET['id'] ?? 0);
$duende = Duende::find($id);

if (!$duende) {
    ?>
    <div class="admin-form-container text-center py-12">
        <i class="fas fa-exclamation-triangle text-5xl mb-4" style="color: rgba(239, 68, 68, 0.6);"></i>
        <h1 class="text-2xl font-orbitron font-semibold text-white mb-3">Duende no encontrado</h1>
        <p class="text-slate-300 mb-6">El duende solicitado no existe o ya fue retirado del catálogo.</p>
        <a href="index.php?sec=duendes" class="btn-arc btn-arc--secondary">
            <i class="fas fa-arrow-left mr-2"></i>Volver al listado
        </a>
    </div>
    <?php
    require_once __DIR__ . '/includes/footer.php';
    exit;
}

$error = $_SESSION['error'] ?? null;
$success = $_SESSION['success'] ?? null;

unset($_SESSION['error'], $_SESSION['success']);

// Cargar catálogos dinámicamente
$elementos = Catalogo::getElementos();
$rarezas = Catalogo::getRarezas();
$materiales = Catalogo::getMateriales();

// Pre-llenar con datos del duende si no viene de POST
if (empty($_POST)) {
    $_POST = $duende;
}
?>

<!-- Section Header -->
<div class="admin-section-header">
    <div>
        <h1 class="admin-section-title">Editar Duende</h1>
        <p class="admin-section-subtitle">Ajustá los parámetros mágicos de <?php echo htmlspecialchars($duende['nombre']); ?></p>
    </div>
    <a href="index.php?sec=duendes" class="btn-arc btn-arc--secondary">
        <span>← Volver</span>
    </a>
</div>

<!-- Alerts -->
<?php if ($success): ?>
    <div class="alert alert-success">
        <span class="alert__icon">✓</span>
        <span><?php echo htmlspecialchars($success); ?></span>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="alert alert-error">
        <span class="alert__icon">✗</span>
        <span><?php echo htmlspecialchars($error); ?></span>
    </div>
<?php endif; ?>

<!-- Form -->
<form method="post" action="actions/duende_editar_acc.php" enctype="multipart/form-data" class="admin-form">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="imagen_actual" value="<?php echo htmlspecialchars($duende['imagen_url'] ?? ''); ?>">

    <!-- Basic Info -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Información Básica</h2>
        <div class="admin-form-grid">
            <div class="admin-form-grid--full">
                <label for="nombre" class="form-label">Nombre*</label>
                <input type="text" name="nombre" id="nombre" required value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>" class="form-input" autocomplete="off">
            </div>
            
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="tipo" id="tipo" value="<?php echo htmlspecialchars($_POST['tipo'] ?? ''); ?>" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="color_principal" class="form-label">Color Principal</label>
                <input type="text" name="color_principal" id="color_principal" value="<?php echo htmlspecialchars($_POST['color_principal'] ?? ''); ?>" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="altura_cm" class="form-label">Altura (cm)</label>
                <input type="number" name="altura_cm" id="altura_cm" value="<?php echo $_POST['altura_cm'] ?? 30; ?>" min="1" max="500" class="form-input">
            </div>
            
            <div class="admin-form-grid--full">
                <label for="personalidad" class="form-label">Personalidad</label>
                <textarea name="personalidad" id="personalidad" rows="3" class="form-input form-textarea"><?php echo htmlspecialchars($_POST['personalidad'] ?? ''); ?></textarea>
            </div>
        </div>
    </div>

    <!-- Magic Characteristics -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Características Mágicas</h2>
        <div class="admin-form-grid">
            <div class="form-group">
                <label for="id_rareza" class="form-label">Rareza*</label>
                <select name="id_rareza" id="id_rareza" required class="form-input">
                        <option value="">-- Seleccionar --</option>
                        <?php foreach ($rarezas as $rareza): ?>
                            <option value="<?php echo $rareza['id_rareza']; ?>" 
                                    <?php echo (($_POST['id_rareza'] ?? '') == $rareza['id_rareza']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars(ucfirst($rareza['nombre'])); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
            </div>
            
            <div class="form-group">
                <label for="id_elemento" class="form-label">Elemento*</label>
                <select name="id_elemento" id="id_elemento" required class="form-input">
                        <option value="">-- Seleccionar --</option>
                        <?php foreach ($elementos as $elemento): ?>
                            <option value="<?php echo $elemento['id_elemento']; ?>" 
                                    <?php echo (($_POST['id_elemento'] ?? '') == $elemento['id_elemento']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars(ucfirst($elemento['nombre'])); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
            </div>
            
            <div class="form-group">
                <label for="id_material" class="form-label">Material Base*</label>
                <select name="id_material" id="id_material" required class="form-input">
                        <option value="">-- Seleccionar --</option>
                        <?php foreach ($materiales as $material): ?>
                            <option value="<?php echo $material['id_material']; ?>" 
                                    <?php echo (($_POST['id_material'] ?? '') == $material['id_material']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars(ucfirst($material['nombre'])); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
            </div>
            
            <div class="admin-form-grid--full">
                <label for="efecto_magico" class="form-label">Efecto Mágico</label>
                <textarea name="efecto_magico" id="efecto_magico" rows="3" class="form-input form-textarea"><?php echo htmlspecialchars($_POST['efecto_magico'] ?? ''); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="nivel_maldad" class="form-label">Nivel de Maldad (1-10)</label>
                <input type="number" name="nivel_maldad" id="nivel_maldad" value="<?php echo $_POST['nivel_maldad'] ?? 1; ?>" min="1" max="10" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="nivel_suerte" class="form-label">Nivel de Suerte (1-10)</label>
                <input type="number" name="nivel_suerte" id="nivel_suerte" value="<?php echo $_POST['nivel_suerte'] ?? 5; ?>" min="1" max="10" class="form-input">
            </div>
        </div>
    </div>

    <!-- Commercial Details -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Detalles Comerciales</h2>
        <div class="admin-form-grid">
            <div class="form-group">
                <label for="precio_en_oro" class="form-label">Precio en Oro</label>
                <input type="number" step="0.01" name="precio_en_oro" id="precio_en_oro" value="<?php echo $_POST['precio_en_oro'] ?? 0; ?>" min="0" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="popularidad" class="form-label">Popularidad (0-100)</label>
                <input type="number" name="popularidad" id="popularidad" value="<?php echo $_POST['popularidad'] ?? 50; ?>" min="0" max="100" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                <input type="date" name="fecha_creacion" id="fecha_creacion" value="<?php echo $_POST['fecha_creacion'] ?? date('Y-m-d'); ?>" class="form-input">
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    <input type="checkbox" name="disponible" value="1" <?php echo ($_POST['disponible'] ?? 1) ? 'checked' : ''; ?>>
                    Disponible para la Venta
                </label>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Información Adicional</h2>
        <div class="admin-form-grid">
            <div class="admin-form-grid--full">
                <label for="origen_mitologico" class="form-label">Origen Mitológico</label>
                <input type="text" name="origen_mitologico" id="origen_mitologico" value="<?php echo htmlspecialchars($_POST['origen_mitologico'] ?? ''); ?>" class="form-input">
            </div>
            
            <div class="admin-form-grid--full">
                <label for="recomendado_para" class="form-label">Recomendado Para</label>
                <textarea name="recomendado_para" id="recomendado_para" rows="3" class="form-input form-textarea"><?php echo htmlspecialchars($_POST['recomendado_para'] ?? ''); ?></textarea>
            </div>
            
            <div class="admin-form-grid--full">
                <label for="advertencias" class="form-label">Advertencias</label>
                <textarea name="advertencias" id="advertencias" rows="3" class="form-input form-textarea"><?php echo htmlspecialchars($_POST['advertencias'] ?? ''); ?></textarea>
            </div>
            
            <?php if (!empty($duende['imagen_url'])): ?>
                <?php
                    require_once __DIR__ . '/../includes/functions.php';
                    $srcImagen = obtener_url_imagen($duende['imagen_url']);
                ?>
                <div class="admin-form-grid--full">
                    <label class="form-label">Imagen Actual</label>
                    <div class="mt-3 inline-flex flex-col items-center gap-3 rounded-xl p-4" style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(129, 140, 248, 0.3);">
                        <img src="<?php echo htmlspecialchars($srcImagen); ?>" alt="Imagen actual" class="max-h-48 rounded-lg object-contain" style="border: 1px solid rgba(236, 72, 153, 0.3);">
                        <p class="text-xs" style="color: rgba(255, 255, 255, 0.5);">
                            <i class="fas fa-info-circle mr-1"></i>Se mantendrá esta imagen salvo que subas una nueva.
                        </p>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="admin-form-grid--full">
                <label for="imagen" class="form-label"><?php echo !empty($duende['imagen_url']) ? 'Cambiar Imagen' : 'Subir Imagen'; ?></label>
                <input type="file" name="imagen" id="imagen" accept="image/*" class="form-input" style="padding: 0.5rem;">
                <p class="text-xs mt-2" style="color: rgba(255, 255, 255, 0.5);">
                    <i class="fas fa-info-circle mr-1"></i>
                    Formatos permitidos: JPG, PNG, GIF, WEBP. La imagen se subirá automáticamente al servidor.
                </p>
            </div>
            
            <div class="admin-form-grid--full">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="5" class="form-input form-textarea"><?php echo htmlspecialchars($_POST['descripcion'] ?? ''); ?></textarea>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="admin-form-actions">
        <button type="submit" class="btn-arc btn-arc--primary btn-arc--lg">
            <span>Guardar Cambios</span>
        </button>
        <a href="index.php?sec=duendes" class="btn-arc btn-arc--secondary btn-arc--lg">
            <span>Cancelar</span>
        </a>
    </div>
</form>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
