<?php
session_start();

$usuarios = [
    'administrador' => [
        'password' => 'asd',
        'tipo' => 'administrador'
    ],
    'cliente' => [
        'password' => '123',
        'tipo' => 'cliente'
    ]
];

$usuario = trim($_POST['usuario'] ?? '');
$password = $_POST['password'] ?? '';

if (isset($usuarios[$usuario]) && $usuarios[$usuario]['password'] === $password) {
    session_regenerate_id(true);
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo'] = $usuarios[$usuario]['tipo'];

    if ($_SESSION['tipo'] === 'administrador') {
        header('Location: dashboard.php');
    } else {
        header('Location: catalogo.php');
    }
    exit;
}

header('Location: index.php?error=1');
exit;
