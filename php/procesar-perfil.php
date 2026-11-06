<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /Templates/signin.php');
    exit();
}

$usuario_nuevo = trim($_POST['usuario_nuevo'] ?? '');
$caracteresProhibidos = '/^[a-zA-Z0-9_]+$/';

if (empty($usuario_nuevo)) {
    header('Location: /Templates/perfil.php?error=campo_vacio');
    exit();
} elseif (mb_strlen($usuario_nuevo) < 4 || mb_strlen($usuario_nuevo) > 20) {
    header('Location: /Templates/perfil.php?error=largo_usuario');
    exit();
} elseif (!preg_match($caracteresProhibidos, $usuario_nuevo)) {
    header('Location: /Templates/perfil.php?error=caracteres_prohibidos');
    exit();
} else {
    $_SESSION['usuario_nuevo_temp'] = $usuario_nuevo;
    header('Location: /php/actualizar-usuario.php');
    exit();
}
?>