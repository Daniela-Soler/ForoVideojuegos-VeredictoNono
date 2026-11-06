<?php
session_start();

$usuario  = trim($_POST['usuario']);
$password = $_POST['password'];
$caracteresProhibidos = '/[\\\/()\[\]*+ \':?"@]/';

if ($usuario == "" || $password == "") {
    header('Location: /Templates/signin.php?error=camposvacios');
    exit();
} elseif (mb_strlen($usuario) > 20 || mb_strlen($password) > 20) {
    header('Location: /Templates/signin.php?error=largousuarioypass');
    exit();
} elseif (preg_match($caracteresProhibidos, $usuario) || preg_match($caracteresProhibidos, $password)) {
    header('Location: /Templates/signin.php?error=caracteresprohibidos');
    exit();
} else {
    $_SESSION['usuario_temp'] = $usuario;
    $_SESSION['clave_temp'] = $password;
    header('Location: /php/validar-usuario.php');
    exit();
}
?>
