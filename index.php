<?php
session_start();

if (isset($_SESSION['usuario'])) {
    if ($_SESSION['tipo'] === 'administrador') {
        header('Location: dashboard.php');
    } else {
        header('Location: catalogo.php');
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitsune Store | Iniciar sesión</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-page">
    <main class="login-shell">
        <section class="login-art">
            <div class="brand-mark">狐</div>
            <span class="eyebrow">ANIME • MANGA • COLECCIONABLES</span>
            <h1>Kitsune<br><span>Store</span></h1>
            <p>Tu rincón digital para descubrir historias, mangas y artículos inspirados en el mundo anime.</p>
            <div class="floating-card card-one">✦ 新しい物語</div>
            <div class="floating-card card-two">漫画 · アニメ</div>
        </section>

        <section class="login-card">
            <div class="mobile-logo">狐</div>
            <span class="eyebrow">Bienvenido de nuevo</span>
            <h2>Iniciar sesión</h2>
            <p class="muted">Ingresa tus datos para entrar a Kitsune Store.</p>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-error">
                    <strong>¡Ups!</strong> Usuario o contraseña inválidos.
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" class="form">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Escribe tu usuario" required>

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Escribe tu contraseña" required>

                <button type="submit" class="btn btn-primary btn-full">Entrar a la tienda →</button>
            </form>

            <div class="demo-box">
                <p><strong>Credenciales de prueba</strong></p>
                <p>Administrador: <code>administrador</code> / <code>asd</code></p>
                <p>Cliente: <code>cliente</code> / <code>123</code></p>
            </div>
        </section>
    </main>
</body>
</html>
