//index
<?php
session_start();

if (isset($_SESSION['usuario'])) {

    if ($_SESSION['tipo'] === 'administrador') {
        header("Location: admin.php");
    } else {
        header("Location: cliente.php");
    }

    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>YumeWorld - Iniciar sesión</title>

    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="login-container">

        <h1>🌸 YumeWorld</h1>

        <p>Productos de anime y manga</p>

        <h2>Iniciar sesión</h2>

        <form action="login.php" method="POST">

            <label>Usuario</label>

            <input
                type="text"
                name="usuario"
                placeholder="Ingresa tu usuario"
                required
            >

            <label>Contraseña</label>

            <input
                type="password"
                name="password"
                placeholder="Ingresa tu contraseña"
                required
            >

            <button type="submit">
                Iniciar sesión
            </button>

        </form>

    </div>

</body>

</html>