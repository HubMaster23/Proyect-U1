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


// Productos del catálogo
$productos = [

    1 => [
        "nombre" => "Figura de Naruto Uzumaki",
        "precio" => 450,
        "existencias" => 10,
        "imagen" => "naruto.jpg"
    ],

    2 => [
        "nombre" => "Figura de Monkey D. Luffy",
        "precio" => 550,
        "existencias" => 8,
        "imagen" => "one-piece.jpg"
    ],

    3 => [
        "nombre" => "Figura de Tanjiro Kamado",
        "precio" => 480,
        "existencias" => 12,
        "imagen" => "demon-slayer.jpg"
    ],

    4 => [
        "nombre" => "Manga Attack on Titan",
        "precio" => 180,
        "existencias" => 15,
        "imagen" => "attack-on-titan.jpg"
    ],

    5 => [
        "nombre" => "Manga Jujutsu Kaisen",
        "precio" => 170,
        "existencias" => 20,
        "imagen" => "jjk.jpg"
    ],

    6 => [
        "nombre" => "Figura My Hero Academia",
        "precio" => 400,
        "existencias" => 7,
        "imagen" => "mha.jpg"
    ]

];

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>YumeWorld - Catálogo</title>

    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>


<header class="header">

    <h1>🌸 YumeWorld</h1>

    <div>

        <span>
            Cliente: <?php echo $_SESSION['usuario']; ?>
        </span>

        <a href="carrito.php" class="cart">
            🛒 Ver carrito
        </a>

        <a href="logout.php" class="logout">
            Cerrar sesión
        </a>

    </div>

</header>


<main>

    <h2 class="titulo">
        Catálogo de productos
    </h2>


    <div class="productos">


        <?php foreach ($productos as $id => $producto): ?>

            <div class="producto">

                <img
                    src="img/<?php echo $producto['imagen']; ?>"
                    alt="<?php echo $producto['nombre']; ?>"
                >


                <h3>
                    <?php echo $producto['nombre']; ?>
                </h3>


                <p class="precio">

                    $<?php echo number_format(
                        $producto['precio'],
                        2
                    ); ?>

                </p>


                <p>

                    Existencias:
                    <?php echo $producto['existencias']; ?>

                </p>


                <form action="carrito.php" method="POST">

                    <input
                        type="hidden"
                        name="id"
                        value="<?php echo $id; ?>"
                    >

                    <button type="submit">
                        🛒 Agregar al carrito
                    </button>

                </form>

            </div>

        <?php endforeach; ?>


    </div>

</main>

</body>

</html>