//Panel Administrador
<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'administrador') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard de Administración</h1>
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 text-sm">Cerrar Sesión</a>
        </div>
        
        <p class="mb-4 text-gray-600">Bienvenido, <strong><?php echo $_SESSION['usuario']; ?></strong>.</p>
        
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Estadísticas de Ventas Mensuales</h2>
            <div class="w-full max-w-lg mx-auto">
                <canvas id="graficaVentas"></canvas>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('graficaVentas').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                datasets: [{
                    label: 'Ventas ($USD)',
                    data: [1200, 1900, 3000, 2500, 4200],
                    backgroundColor: 'rgba(59, 130, 246, 0.5)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1
                }]
            },
            options: { responsive: true, scales: { y: { beginAtZero: true } } }
        });
    </script>
</body>
</html>