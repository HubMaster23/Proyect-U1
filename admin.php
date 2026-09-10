<?php
$pageTitle = 'Dashboard | Kitsune Store';
require 'includes/header.php';

$totalProductos = 6;
$totalExistencias = 66;
$ventasSimuladas = [1250, 1890, 980, 2400, 1760, 2950];
$meses = ['Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep'];
?>
<section class="hero dashboard-hero">
    <div>
        <span class="eyebrow">PANEL DE ADMINISTRACIÓN</span>
        <h1>Hola, <?= htmlspecialchars($_SESSION['usuario']) ?> <span class="sparkle">✦</span></h1>
        <p>Consulta rápidamente el estado de tu tienda anime y manga.</p>
    </div>
    <div class="hero-symbol">⛩</div>
</section>

<section class="stats-grid">
    <article class="stat-card">
        <span class="stat-icon">◈</span>
        <div><p>Productos</p><strong><?= $totalProductos ?></strong></div>
    </article>
    <article class="stat-card">
        <span class="stat-icon">◇</span>
        <div><p>Existencias</p><strong><?= $totalExistencias ?></strong></div>
    </article>
    <article class="stat-card">
        <span class="stat-icon">✦</span>
        <div><p>Ventas del mes</p><strong>$2,950</strong></div>
    </article>
    <article class="stat-card">
        <span class="stat-icon">☾</span>
        <div><p>Usuarios activos</p><strong>18</strong></div>
    </article>
</section>

<section class="content-card chart-card">
    <div class="section-heading">
        <div>
            <span class="eyebrow">ANÁLISIS</span>
            <h2>Ventas simuladas</h2>
        </div>
        <span class="pill">Últimos 6 meses</span>
    </div>
    <div class="chart-wrap">
        <canvas id="ventasChart"></canvas>
    </div>
</section>

<section class="quick-actions">
    <a href="catalogo.php" class="action-card">
        <span>🛍️</span>
        <div><strong>Ver catálogo</strong><small>Revisar productos disponibles</small></div>
        <b>→</b>
    </a>
    <a href="logout.php" class="action-card">
        <span>↪</span>
        <div><strong>Cerrar sesión</strong><small>Salir de la cuenta actual</small></div>
        <b>→</b>
    </a>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('ventasChart');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($meses) ?>,
        datasets: [{
            label: 'Ventas ($)',
            data: <?= json_encode($ventasSimuladas) ?>,
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            backgroundColor: 'rgba(126, 87, 194, 0.12)',
            borderColor: '#8b5cf6',
            pointBackgroundColor: '#ffffff',
            pointBorderColor: '#8b5cf6',
            pointBorderWidth: 3,
            pointRadius: 5
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: value => '$' + value
                }
            }
        }
    }
});
</script>
<?php require 'includes/footer.php'; ?>
