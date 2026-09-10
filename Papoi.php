//Registro
<?php
session_start();

$usuarios = [
    "administrador" => ["password" => "asd", "tipo" => "administrador"],
    "cliente"       => ["password" => "123", "tipo" => "cliente"]
];

$user = $_POST['usuario'] ?? '';
$pass = $_POST['password'] ?? '';

if (isset($usuarios[$user]) && $usuarios[$user]['password'] === $pass) {
    $_SESSION['usuario'] = $user;
    $_SESSION['tipo'] = $usuarios[$user]['tipo'];

    if ($_SESSION['tipo'] === 'administrador') {
        header("Location: admin.php");
    } else {
        header("Location: cliente.php");
    }
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}