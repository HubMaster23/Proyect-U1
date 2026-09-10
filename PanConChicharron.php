//Autentificador de errores
<?php
class AuthErrorHandler {
    private $mensaje;
    private $codigoError;

    public function __construct($codigoError = 401) {
        $this->codigoError = $codigoError;
        $this->mensaje = "Usuario o contraseña inválidos. Por favor, verifica tus credenciales e intenta nuevamente.";
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function getCodigo() {
        return $this->codigoError;
    }

    // Método estático de conveniencia para redireccionar a la vista de error
    public static function redirigirError() {
        header("Location: error.php");
        exit();
    }
}