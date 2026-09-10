//Catalogo
<?php
$pageTitle = 'Catálogo | Kitsune Store';
require 'includes/data.php';
require 'includes/header.php';

$mensaje = $_GET['mensaje'] ?? '';
$categoriaSeleccionada = trim($_GET['categoria'] ?? '');

// Obtener las categorías directamente desde el catálogo, sin base de datos.
$categorias = [];
foreach ($productos as $producto) {
    $categorias[$producto['categoria']] = ($categorias[$producto['categoria']] ?? 0) + 1;
}

// Filtrar los productos cuando el cliente entra a un tipo de producto.
$productosMostrar = $productos;
if ($categoriaSeleccionada !== '' && isset($categorias[$categoriaSeleccionada])) {
    $productosMostrar = array_filter(
        $productos,
        fn($producto) => $producto['categoria'] === $categoriaSeleccionada
    );
}
?>
<section class="hero catalog-hero">
    <div>
        <span class="eyebrow">KITSUNE COLLECTION</span>
        <h1>Encuentra tu próxima <span>historia.</span></h1>
        <p>Mangas, figuras y coleccionables seleccionados para amantes del anime.</p>
    </div>
    <div class="hero-symbol">✿</div>
</section>

<?php if ($mensaje): ?>
    <div class="alert alert-success"><?= htmlspecialchars($mensaje) ?></div>
<?php endif; ?>

<section class="category-section">
    <div class="section-heading">
        <div>
            <span class="eyebrow">EXPLORA POR TIPO</span>
            <h2>Tipos de productos</h2>
        </div>
        <?php if ($categoriaSeleccionada !== ''): ?>
            <a href="catalogo.php" class="btn btn-secondary">Ver todo →</a>
        <?php endif; ?>
    </div>

    <div class="category-grid">
        <?php foreach ($categorias as $categoria => $cantidad): ?>
            <a
                href="catalogo.php?categoria=<?= urlencode($categoria) ?>"
                class="category-card <?= $categoriaSeleccionada === $categoria ? 'active' : '' ?>"
            >
                <span class="category-card-icon">
                    <?php
                        $iconos = [
                            'Manga' => '📚',
                            'Figura' => '🧸',
                            'Ropa' => '🧥',
                            'Coleccionable' => '✨'
                        ];
                        echo $iconos[$categoria] ?? '🛍️';
                    ?>
                </span>
                <span class="category-card-info">
                    <strong><?= htmlspecialchars($categoria) ?></strong>
                    <small><?= $cantidad ?> <?= $cantidad === 1 ? 'producto' : 'productos' ?></small>
                </span>
                <span class="category-arrow">→</span>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<div class="section-heading catalog-heading">
    <div>
        <span class="eyebrow"><?= $categoriaSeleccionada !== '' ? 'CATEGORÍA SELECCIONADA' : 'CATÁLOGO' ?></span>
        <h2><?= $categoriaSeleccionada !== '' ? htmlspecialchars($categoriaSeleccionada) : 'Productos destacados' ?></h2>
    </div>
    <?php if ($_SESSION['tipo'] === 'cliente'): ?>
        <a href="carrito.php" class="btn btn-secondary">🛒 Ver carrito</a>
    <?php endif; ?>
</div>

<section class="product-grid">
<?php if (empty($productosMostrar)): ?>
    <div class="empty-state category-empty">
        <div class="empty-icon">🛍️</div>
        <h3>No hay productos en esta categoría</h3>
        <p>Regresa al catálogo para consultar los productos disponibles.</p>
        <a href="catalogo.php" class="btn btn-primary">Ver catálogo</a>
    </div>
<?php else: ?>
    <?php foreach ($productosMostrar as $id => $producto): ?>
        <article class="product-card">
            <div class="product-image">
                <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombre']) ?>">
                <span class="category-tag"><?= htmlspecialchars($producto['categoria']) ?></span>
            </div>
            <div class="product-info">
                <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
                <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                <div class="product-bottom">
                    <div class="product-details">
                        <strong>$<?= number_format($producto['precio'], 2) ?></strong>
                        <small class="<?= $producto['stock'] <= 0 ? 'out-stock' : '' ?>">
                            <?= $producto['stock'] ?> disponibles
                        </small>
                    </div>

                    <?php if ($_SESSION['tipo'] === 'cliente'): ?>
                        <form action="agregar.php" method="POST" class="add-form">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <button
                                type="submit"
                                class="add-btn"
                                <?= $producto['stock'] <= 0 ? 'disabled' : '' ?>
                            >
                                ＋ Agregar
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
<?php endif; ?>
</section>

<?php require 'includes/footer.php'; ?>
