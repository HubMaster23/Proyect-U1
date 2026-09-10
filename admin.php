<?php

session_start();

// Verificar que exista una sesión
if (!isset($_SESSION['usuario'])) {

    header("Location: index.php");
    exit();

}

// Verificar que sea administrador
if ($_SESSION['tipo'] !== 'administrador') {

    header("Location: cliente.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>YumeWorld - Administrador</title>

    <link rel="stylesheet" href="css/estilos.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

    <header class="header">

        <h1>🌸 YumeWorld</h1>

        <div>

            <span>
                Bienvenido, <?php echo $_SESSION['usuario']; ?>
            </span>

            <a href="logout.php" class="logout">
                Cerrar sesión
            </a>

        </div>

    </header>


    <main class="dashboard">

        <h2>Panel del Administrador</h2>

        <p>
            Información general de YumeWorld
        </p>


        <div class="cards">

            <div class="card">

                <h3>📦 Productos</h3>

                <p>6</p>

            </div>


            <div class="card">

                <h3>👥 Clientes</h3>

                <p>25</p>

            </div>


            <div class="card">

                <h3>💰 Ventas</h3>

                <p>$8,450</p>

            </div>

        </div>


        <div class="chart-container">

            <h2>Ventas por mes</h2>

            <canvas id="ventasChart"></canvas>

        </div>

    </main>


<script>

const ctx = document.getElementById('ventasChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio'
        ],

        datasets: [{

            label: 'Ventas ($)',

            data: [
                1200,
                1900,
                1500,
                2500,
                1800,
                3000
            ],

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

</body>

</html>