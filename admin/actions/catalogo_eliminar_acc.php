<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../../classes/Catalogo.php';

require_admin();

$tipo = $_GET['tipo'] ?? '';
$id = (int)($_GET['id'] ?? 0);

if ($id === 0) {
    $_SESSION['error'] = 'ID inválido.';
    header("Location: ../index.php?sec=catalogos&tipo=$tipo");
    exit;
}

// Verificar si está en uso antes de eliminar
$enUso = false;

switch ($tipo) {
    case 'elementos':
        $enUso = Catalogo::elementoEnUso($id);
        if (!$enUso) {
            $success = Catalogo::eliminarElemento($id);
        }
        break;
    case 'rarezas':
        $enUso = Catalogo::rarezaEnUso($id);
        if (!$enUso) {
            $success = Catalogo::eliminarRareza($id);
        }
        break;
    case 'materiales':
        $enUso = Catalogo::materialEnUso($id);
        if (!$enUso) {
            $success = Catalogo::eliminarMaterial($id);
        }
        break;
}

if ($enUso) {
    $_SESSION['error'] = 'No se puede eliminar porque está siendo usado por uno o más duendes.';
    header("Location: ../index.php?sec=catalogos&tipo=$tipo&error=en_uso");
} elseif (isset($success) && $success) {
    $_SESSION['success'] = 'Registro eliminado correctamente.';
    header("Location: ../index.php?sec=catalogos&tipo=$tipo&msg=eliminado");
} else {
    $_SESSION['error'] = 'Ocurrió un error al eliminar el registro.';
    header("Location: ../index.php?sec=catalogos&tipo=$tipo&error=no_eliminar");
}
exit;
