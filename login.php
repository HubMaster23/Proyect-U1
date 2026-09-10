<?php

session_start();

// Usuarios definidos directamente en el código
$usuarios = [

    "administrador" => [
        "password" => "asd",
        "tipo" => "administrador"
    ],

    "cliente" => [
        "password" => "123",
        "tipo" => "cliente"
    ]

];

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';


// Verificar que el usuario exista
if (isset($usuarios[$usuario])) {

    // Verificar contraseña
    if ($usuarios[$usuario]['password'] === $password) {

        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo'] = $usuarios[$usuario]['tipo'];

        // Redireccionar dependiendo del tipo
        if ($_SESSION['tipo'] === 'administrador') {

            header("Location: admin.php");

        } else {

            header("Location: cliente.php");

        }

        exit();

    }

}

// Si las credenciales son incorrectas
header("Location: error.php");
exit();

?>