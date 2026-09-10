<?php
session_start();
require 'includes/data.php';

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'cliente') {
    header('Location: index.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);

if (!isset($productos[$id])) {
    header('Location: catalogo.php?mensaje=Producto no encontrado');
    exit;
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$cantidadActual = $_SESSION['carrito'][$id] ?? 0;

if ($cantidadActual < $productos[$id]['stock']) {
    $_SESSION['carrito'][$id] = $cantidadActual + 1;
    $mensaje = 'Producto agregado al carrito.';
} else {
    $mensaje = 'No puedes agregar más unidades de este producto.';
}

header('Location: catalogo.php?mensaje=' . urlencode($mensaje));
exit;
