<?php
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/../classes/Catalogo.php';

$tipo = $_GET['tipo'] ?? 'elementos';
$msg = $_GET['msg'] ?? null;
$error = $_GET['error'] ?? null;

// Obtener datos según el tipo
$datos = [];
$titulo = '';
$singular = '';

switch ($tipo) {
    case 'elementos':
        $datos = Catalogo::getElementos();
        $titulo = 'Elementos';
        $singular = 'Elemento';
        $campo_id = 'id_elemento';
        break;
    case 'rarezas':
        $datos = Catalogo::getRarezas();
        $titulo = 'Rarezas';
        $singular = 'Rareza';
        $campo_id = 'id_rareza';
        break;
    case 'materiales':
        $datos = Catalogo::getMateriales();
        $titulo = 'Materiales';
        $singular = 'Material';
        $campo_id = 'id_material';
        break;
    default:
        $tipo = 'elementos';
        $datos = Catalogo::getElementos();
        $titulo = 'Elementos';
        $singular = 'Elemento';
        $campo_id = 'id_elemento';
}
?>

<!-- Section Header -->
<div class="admin-section-header">
    <div>
        <h1 class="admin-section-title">Gestión de Catálogos</h1>
        <p class="admin-section-subtitle">Administrá los catálogos base para la creación de duendes</p>
    </div>
</div>

<!-- Tabs de Navegación -->
<div class="mb-6 flex gap-2 border-b" style="border-color: rgba(129, 140, 248, 0.2);">
    <a href="index.php?sec=catalogos&tipo=elementos" 
       class="px-6 py-3 font-orbitron text-sm font-medium transition-all <?php echo $tipo === 'elementos' ? 'border-b-2 text-white' : 'text-slate-400 hover:text-white'; ?>"
       style="<?php echo $tipo === 'elementos' ? 'border-color: #818cf8;' : ''; ?>">
        <i class="fas fa-fire mr-2"></i>Elementos
    </a>
    <a href="index.php?sec=catalogos&tipo=rarezas" 
       class="px-6 py-3 font-orbitron text-sm font-medium transition-all <?php echo $tipo === 'rarezas' ? 'border-b-2 text-white' : 'text-slate-400 hover:text-white'; ?>"
       style="<?php echo $tipo === 'rarezas' ? 'border-color: #818cf8;' : ''; ?>">
        <i class="fas fa-gem mr-2"></i>Rarezas
    </a>
    <a href="index.php?sec=catalogos&tipo=materiales" 
       class="px-6 py-3 font-orbitron text-sm font-medium transition-all <?php echo $tipo === 'materiales' ? 'border-b-2 text-white' : 'text-slate-400 hover:text-white'; ?>"
       style="<?php echo $tipo === 'materiales' ? 'border-color: #818cf8;' : ''; ?>">
        <i class="fas fa-hammer mr-2"></i>Materiales
    </a>
</div>

<!-- Alerts -->
<?php if ($msg === 'creado'): ?>
    <div class="alert alert-success">
        <span class="alert__icon">✓</span>
        <span><?php echo $singular; ?> creado correctamente.</span>
    </div>
<?php endif; ?>

<?php if ($msg === 'eliminado'): ?>
    <div class="alert alert-success">
        <span class="alert__icon">✓</span>
        <span><?php echo $singular; ?> eliminado correctamente.</span>
    </div>
<?php endif; ?>

<?php if ($error === 'en_uso'): ?>
    <div class="alert alert-error">
        <span class="alert__icon">✗</span>
        <span>No se puede eliminar porque está siendo usado por uno o más duendes.</span>
    </div>
<?php endif; ?>

<?php if ($error === 'no_eliminar'): ?>
    <div class="alert alert-error">
        <span class="alert__icon">✗</span>
        <span>Ocurrió un error al intentar eliminar el registro.</span>
    </div>
<?php endif; ?>

<!-- Formulario de Creación -->
<div class="admin-form-container mb-6">
    <h3 class="text-lg font-orbitron font-bold mb-4" style="color: #818cf8;">
        <i class="fas fa-plus-circle mr-2"></i>Agregar Nuevo <?php echo $singular; ?>
    </h3>
    <form method="post" action="actions/catalogo_crear_acc.php" class="flex gap-3">
        <input type="hidden" name="tipo" value="<?php echo htmlspecialchars($tipo); ?>">
        <input type="text" 
               name="nombre" 
               placeholder="Nombre del <?php echo strtolower($singular); ?>"
               required
               class="flex-1 px-4 py-2 rounded-lg"
               style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(129, 140, 248, 0.3); color: #fff;">
        <button type="submit" class="btn-arc btn-arc--primary">
            <i class="fas fa-plus mr-2"></i>Crear
        </button>
    </form>
</div>

<!-- Tabla de Datos -->
<?php if (count($datos) > 0): ?>
    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $item): ?>
                    <tr>
                        <td style="color: rgba(129, 140, 248, 0.9); font-weight: 600;">
                            #<?php echo $item[$campo_id]; ?>
                        </td>
                        <td style="font-weight: 500;">
                            <?php echo htmlspecialchars($item['nombre']); ?>
                        </td>
                        <td class="text-right">
                            <button onclick="confirmarEliminacion('<?php echo $tipo; ?>', <?php echo $item[$campo_id]; ?>, '<?php echo htmlspecialchars($item['nombre']); ?>')" 
                                    class="admin-action-link admin-action-link--delete">
                                <i class="fas fa-trash-alt"></i>
                                Eliminar
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="admin-form-container text-center py-12">
        <i class="fas fa-inbox text-5xl mb-4" style="color: rgba(129, 140, 248, 0.3);"></i>
        <p class="text-slate-400 text-lg">No hay <?php echo strtolower($titulo); ?> registrados aún.</p>
        <p class="text-slate-500 text-sm mt-2">Usá el formulario de arriba para crear el primero.</p>
    </div>
<?php endif; ?>

<script>
async function confirmarEliminacion(tipo, id, nombre) {
    const confirmado = await showConfirm(
        `¿Estás seguro de eliminar "${nombre}"?\n\nEsta acción no se puede deshacer. Si el ${tipo.slice(0, -1)} está siendo usado por algún duende, no podrás eliminarlo.`,
        '⚠️ Confirmar eliminación'
    );
    
    if (confirmado) {
        window.location.href = `actions/catalogo_eliminar_acc.php?tipo=${tipo}&id=${id}`;
    }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
