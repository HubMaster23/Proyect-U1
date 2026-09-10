<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}
$cartCount = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $cantidad) {
        $cartCount += $cantidad;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Kitsune Store') ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="topbar">
    <a class="brand" href="<?= $_SESSION['tipo'] === 'administrador' ? 'dashboard.php' : 'catalogo.php' ?>">
        <span class="brand-icon">狐</span>
        <span>Kitsune <small>STORE</small></span>
    </a>

    <nav>
        <?php if ($_SESSION['tipo'] === 'administrador'): ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="catalogo.php">Catálogo</a>
        <?php else: ?>
            <a href="catalogo.php">Catálogo</a>
            <a href="carrito.php">Carrito <span class="cart-badge"><?= $cartCount ?></span></a>
        <?php endif; ?>
        <a href="logout.php" class="nav-logout">Salir</a>
    </nav>
</header>
<main class="page-container">
