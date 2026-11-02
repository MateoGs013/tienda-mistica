<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/../classes/Catalogo.php';

$error = $_SESSION['error'] ?? null;
$success = $_SESSION['success'] ?? null;
$oldData = $_SESSION['old_data'] ?? [];

unset($_SESSION['error'], $_SESSION['success'], $_SESSION['old_data']);

// Cargar catálogos dinámicamente
$elementos = Catalogo::getElementos();
$rarezas = Catalogo::getRarezas();
$materiales = Catalogo::getMateriales();
?>

<!-- Section Header -->
<div class="admin-section-header">
    <div>
        <h1 class="admin-section-title">Crear Duende</h1>
        <p class="admin-section-subtitle">Configurá todos los parámetros del duende antes de abrir el portal de venta</p>
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
<form method="post" action="actions/duende_crear_acc.php" enctype="multipart/form-data" class="admin-form">
    <!-- Basic Info -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Información Básica</h2>
        <div class="admin-form-grid">
            <div class="admin-form-grid--full">
                <label for="nombre" class="form-label">Nombre*</label>
                <input type="text" name="nombre" id="nombre" required value="<?php echo htmlspecialchars($oldData['nombre'] ?? ''); ?>" class="form-input" placeholder="Ej: Hexa, guardián del portal">
            </div>
            
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" name="tipo" id="tipo" value="<?php echo htmlspecialchars($oldData['tipo'] ?? ''); ?>" class="form-input" placeholder="Guardián, artesano, etc.">
            </div>
            
            <div class="form-group">
                <label for="color_principal" class="form-label">Color Principal</label>
                <input type="text" name="color_principal" id="color_principal" value="<?php echo htmlspecialchars($oldData['color_principal'] ?? ''); ?>" class="form-input" placeholder="#8B5CF6">
            </div>
            
            <div class="form-group">
                <label for="altura_cm" class="form-label">Altura (cm)</label>
                <input type="number" name="altura_cm" id="altura_cm" value="<?php echo $oldData['altura_cm'] ?? 30; ?>" min="1" max="500" class="form-input">
            </div>
            
            <div class="admin-form-grid--full">
                <label for="personalidad" class="form-label">Personalidad</label>
                <textarea name="personalidad" id="personalidad" rows="3" class="form-input form-textarea" placeholder="Describe los rasgos clave del duende"><?php echo htmlspecialchars($oldData['personalidad'] ?? ''); ?></textarea>
            </div>
        </div>
    </div>

    <!-- Magic Features -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Características Mágicas</h2>
        <div class="admin-form-grid">
            <div class="form-group">
                <label for="id_rareza" class="form-label">Rareza*</label>
                <select name="id_rareza" id="id_rareza" required class="form-input">
                    <option value="">-- Seleccionar --</option>
                    <?php foreach ($rarezas as $rareza): ?>
                        <option value="<?php echo $rareza['id_rareza']; ?>" 
                                <?php echo (($oldData['id_rareza'] ?? '') == $rareza['id_rareza']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars(ucfirst($rareza['nombre'])); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <a href="index.php?sec=catalogos&tipo=rarezas" class="text-xs mt-1 inline-block" style="color: rgba(129, 140, 248, 0.8);">
                    <i class="fas fa-plus-circle mr-1"></i>Agregar nueva rareza
                </a>
            </div>
            
            <div class="form-group">
                <label for="id_elemento" class="form-label">Elemento*</label>
                <select name="id_elemento" id="id_elemento" required class="form-input">
                    <option value="">-- Seleccionar --</option>
                    <?php foreach ($elementos as $elemento): ?>
                        <option value="<?php echo $elemento['id_elemento']; ?>" 
                                <?php echo (($oldData['id_elemento'] ?? '') == $elemento['id_elemento']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars(ucfirst($elemento['nombre'])); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <a href="index.php?sec=catalogos&tipo=elementos" class="text-xs mt-1 inline-block" style="color: rgba(129, 140, 248, 0.8);">
                    <i class="fas fa-plus-circle mr-1"></i>Agregar nuevo elemento
                </a>
            </div>
            
            <div class="form-group">
                <label for="id_material" class="form-label">Material Base*</label>
                <select name="id_material" id="id_material" required class="form-input">
                    <option value="">-- Seleccionar --</option>
                    <?php foreach ($materiales as $material): ?>
                        <option value="<?php echo $material['id_material']; ?>" 
                                <?php echo (($oldData['id_material'] ?? '') == $material['id_material']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars(ucfirst($material['nombre'])); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <a href="index.php?sec=catalogos&tipo=materiales" class="text-xs mt-1 inline-block" style="color: rgba(129, 140, 248, 0.8);">
                    <i class="fas fa-plus-circle mr-1"></i>Agregar nuevo material
                </a>
            </div>
            
            <div class="admin-form-grid--full">
                <label for="efecto_magico" class="form-label">Efecto Mágico</label>
                <textarea name="efecto_magico" id="efecto_magico" rows="3" class="form-input form-textarea" placeholder="Describe el efecto especial que otorga"><?php echo htmlspecialchars($oldData['efecto_magico'] ?? ''); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="nivel_maldad" class="form-label">Nivel de Maldad (1-10)</label>
                <input type="number" name="nivel_maldad" id="nivel_maldad" value="<?php echo $oldData['nivel_maldad'] ?? 1; ?>" min="1" max="10" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="nivel_suerte" class="form-label">Nivel de Suerte (1-10)</label>
                <input type="number" name="nivel_suerte" id="nivel_suerte" value="<?php echo $oldData['nivel_suerte'] ?? 5; ?>" min="1" max="10" class="form-input">
            </div>
        </div>
    </div>

    <!-- Commercial Details -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Detalles Comerciales</h2>
        <div class="admin-form-grid">
            <div class="form-group">
                <label for="precio_en_oro" class="form-label">Precio en Oro</label>
                <input type="number" step="0.01" name="precio_en_oro" id="precio_en_oro" value="<?php echo $oldData['precio_en_oro'] ?? 0; ?>" min="0" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="popularidad" class="form-label">Popularidad (0-100)</label>
                <input type="number" name="popularidad" id="popularidad" value="<?php echo $oldData['popularidad'] ?? 50; ?>" min="0" max="100" class="form-input">
            </div>
            
            <div class="form-group">
                <label for="fecha_creacion" class="form-label">Fecha de Creación</label>
                <input type="date" name="fecha_creacion" id="fecha_creacion" value="<?php echo $oldData['fecha_creacion'] ?? date('Y-m-d'); ?>" class="form-input">
            </div>
            
            <div class="form-group">
                <label class="admin-checkbox">
                    <input type="checkbox" name="disponible" value="1" <?php echo isset($oldData['disponible']) || !$oldData ? 'checked' : ''; ?>>
                    <span>Disponible para la venta</span>
                </label>
            </div>
        </div>
    </div>

    <!-- Additional Info -->
    <div class="admin-form-section">
        <h2 class="admin-form-section__title">Información Adicional</h2>
        <div class="admin-form-grid">
            <div class="admin-form-grid--full">
                <label for="origen_mitologico" class="form-label">Origen Mitológico</label>
                <input type="text" name="origen_mitologico" id="origen_mitologico" value="<?php echo htmlspecialchars($oldData['origen_mitologico'] ?? ''); ?>" class="form-input" placeholder="Bosque de Lumnos, Cráter Ix...">
            </div>
            
            <div class="admin-form-grid--full">
                <label for="recomendado_para" class="form-label">Recomendado Para</label>
                <textarea name="recomendado_para" id="recomendado_para" rows="3" class="form-input form-textarea" placeholder="Coleccionistas, guardianes de portales, etc."><?php echo htmlspecialchars($oldData['recomendado_para'] ?? ''); ?></textarea>
            </div>
            
            <div class="admin-form-grid--full">
                <label for="advertencias" class="form-label">Advertencias</label>
                <textarea name="advertencias" id="advertencias" rows="3" class="form-input form-textarea" placeholder="Manipular con guantes anti-maldad"><?php echo htmlspecialchars($oldData['advertencias'] ?? ''); ?></textarea>
            </div>
            
            <div class="admin-form-grid--full">
                <label for="imagen" class="form-label">Imagen del Duende*</label>
                <input type="file" name="imagen" id="imagen" accept="image/*" class="form-input" style="padding: 0.5rem;">
                <p class="text-xs mt-2" style="color: rgba(255, 255, 255, 0.5);">
                    <i class="fas fa-info-circle mr-1"></i>
                    Formatos permitidos: JPG, PNG, GIF, WEBP. La imagen se subirá automáticamente al servidor.
                </p>
            </div>
            
            <div class="admin-form-grid--full">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="5" class="form-input form-textarea" placeholder="Relatá la historia completa del duende"><?php echo htmlspecialchars($oldData['descripcion'] ?? ''); ?></textarea>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="admin-form-actions">
        <button type="submit" class="btn-arc btn-arc--primary btn-arc--lg">
            <span>Crear Duende</span>
        </button>
        <a href="index.php?sec=duendes" class="btn-arc btn-arc--secondary btn-arc--lg">
            <span>Cancelar</span>
        </a>
    </div>
</form>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
