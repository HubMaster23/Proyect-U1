<?php

session_start();

if (!isset($_SESSION['usuario'])) {

    header("Location: index.php");
    exit();

}

if ($_SESSION['tipo'] !== 'cliente') {

    header("Location: admin.php");
    exit();

}


// Productos
$productos = [

    1 => [
        "nombre" => "Figura de Naruto Uzumaki",
        "precio" => 450
    ],

    2 => [
        "nombre" => "Figura de Monkey D. Luffy",
        "precio" => 550
    ],

    3 => [
        "nombre" => "Figura de Tanjiro Kamado",
        "precio" => 480
    ],

    4 => [
        "nombre" => "Manga Attack on Titan",
        "precio" => 180
    ],

    5 => [
        "nombre" => "Manga Jujutsu Kaisen",
        "precio" => 170
    ],

    6 => [
        "nombre" => "Figura My Hero Academia",
        "precio" => 400
    ]

];


// Crear carrito si todavía no existe
if (!isset($_SESSION['carrito'])) {

    $_SESSION['carrito'] = [];

}


// Agregar producto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    if (isset($productos[$id])) {

        $_SESSION['carrito'][] = $id;

    }

}


// Calcular total
$total = 0;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>YumeWorld - Carrito</title>

    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>


<header class="header">

    <h1>🌸 YumeWorld</h1>

    <a href="cliente.php" class="btn">
        ← Regresar al catálogo
    </a>

</header>


<main class="carrito">

    <h2>🛒 Resumen de compra</h2>


    <?php

    if (empty($_SESSION['carrito'])):

    ?>

        <p>
            No hay productos en el carrito.
        </p>

    <?php

    else:

    ?>


        <table>

            <tr>

                <th>Producto</th>

                <th>Precio</th>

                <th>Subtotal</th>

            </tr>


            <?php foreach ($_SESSION['carrito'] as $id): ?>

                <?php

                $producto = $productos[$id];

                $subtotal = $producto['precio'];

                $total += $subtotal;

                ?>


                <tr>

                    <td>
                        <?php echo $producto['nombre']; ?>
                    </td>

                    <td>
                        $<?php echo number_format(
                            $producto['precio'],
                            2
                        ); ?>
                    </td>

                    <td>
                        $<?php echo number_format(
                            $subtotal,
                            2
                        ); ?>
                    </td>

                </tr>


            <?php endforeach; ?>


        </table>


        <div class="total">

            <h2>

                Total a pagar:
                $<?php echo number_format($total, 2); ?>

            </h2>

        </div>


    <?php endif; ?>


</main>

</body>

</html>