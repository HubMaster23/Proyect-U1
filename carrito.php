<?php
$pageTitle = 'Resumen de compra | Kitsune Store';
require 'includes/data.php';
require 'includes/header.php';

$carrito = $_SESSION['carrito'] ?? [];
$total = 0;
?>
<section class="hero cart-hero">
    <div>
        <span class="eyebrow">ORDEN DE COMPRA</span>
        <h1>Tu <span>resumen.</span></h1>
        <p>Revisa los productos seleccionados y el total de tu compra simulada.</p>
    </div>
    <div class="hero-symbol">♡</div>
</section>

<section class="content-card order-card">
    <div class="section-heading">
        <div>
            <span class="eyebrow">DETALLE</span>
            <h2>Productos seleccionados</h2>
        </div>
        <a href="catalogo.php" class="btn btn-secondary">← Seguir comprando</a>
    </div>

    <?php if (empty($carrito)): ?>
        <div class="empty-state">
            <div class="empty-icon">🛒</div>
            <h3>Tu carrito está vacío</h3>
            <p>Agrega algún producto desde el catálogo para crear una compra simulada.</p>
            <a href="catalogo.php" class="btn btn-primary">Ir al catálogo</a>
        </div>
    <?php else: ?>
        <div class="order-list">
            <?php foreach ($carrito as $id => $cantidad): ?>
                <?php
                    if (!isset($productos[$id])) continue;
                    $producto = $productos[$id];
                    $subtotal = $producto['precio'] * $cantidad;
                    $total += $subtotal;
                ?>
                <div class="order-row">
                    <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="">
                    <div class="order-product">
                        <strong><?= htmlspecialchars($producto['nombre']) ?></strong>
                        <small><?= htmlspecialchars($producto['categoria']) ?></small>
                    </div>
                    <div class="order-qty">x<?= $cantidad ?></div>
                    <div class="order-price">$<?= number_format($subtotal, 2) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="total-box">
            <div><span>Subtotal</span><strong>$<?= number_format($total, 2) ?></strong></div>
            <div><span>Envío</span><strong>Gratis</strong></div>
            <div class="grand-total"><span>Total a pagar</span><strong>$<?= number_format($total, 2) ?></strong></div>
        </div>

        <div class="checkout-note">
            ✦ Esta compra es una <strong>simulación académica</strong>. No se realiza ningún cobro real.
        </div>
    <?php endif; ?>
</section>

<?php require 'includes/footer.php'; ?>
