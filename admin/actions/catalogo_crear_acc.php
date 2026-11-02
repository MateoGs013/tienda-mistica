<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../../classes/Catalogo.php';

require_admin();

$tipo = $_POST['tipo'] ?? '';
$nombre = trim($_POST['nombre'] ?? '');

if (empty($nombre)) {
    $_SESSION['error'] = 'El nombre es obligatorio.';
    header("Location: ../index.php?sec=catalogos&tipo=$tipo");
    exit;
}

$success = false;

switch ($tipo) {
    case 'elementos':
        $success = Catalogo::crearElemento($nombre);
        break;
    case 'rarezas':
        $success = Catalogo::crearRareza($nombre);
        break;
    case 'materiales':
        $success = Catalogo::crearMaterial($nombre);
        break;
}

if ($success) {
    $_SESSION['success'] = 'Registro creado correctamente.';
    header("Location: ../index.php?sec=catalogos&tipo=$tipo&msg=creado");
} else {
    $_SESSION['error'] = 'Ocurrió un error al crear el registro. Puede que ya exista.';
    header("Location: ../index.php?sec=catalogos&tipo=$tipo");
}
exit;
