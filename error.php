//Errores
<?php
session_start();
$_SESSION = [];
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error | Kitsune Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-page">
    <main class="error-shell">
        <div class="error-symbol">狐</div>
        <span class="eyebrow">ERROR DE AUTENTICACIÓN</span>
        <h1>Credenciales inválidas</h1>
        <p>El usuario o la contraseña que ingresaste no son correctos. Verifica tus datos e inténtalo nuevamente.</p>
        <a href="index.php" class="btn btn-primary">Volver al inicio</a>
    </main>
</body>
</html>
