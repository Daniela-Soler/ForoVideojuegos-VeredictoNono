<?php 
    session_start();

    $usuario       = trim($_POST['usuario']);
    $clave         = $_POST['clave'];
    $repetir_clave = $_POST['repetir-clave'];

    $caracteresProhibidos = '/[\\\/()\[\]*+ \':?"@]/';
    $mayuscula  = '/[A-Z]/';
    $numero     = '/[0-9]/';

    if ($usuario == "" || $clave == "" || $repetir_clave == "") {
        header('Location: /Templates/signup.php?error=campos_vacios');
        exit();
    } elseif ($clave !== $repetir_clave) {
        header('Location: /Templates/signup.php?error=claves_distintas');
        exit();
    } elseif (mb_strlen($usuario) > 20 || mb_strlen($usuario) < 4) {
        header('Location: /Templates/signup.php?error=largo_usuario');
        exit();
    } elseif (mb_strlen($clave) > 20 || mb_strlen($clave) < 8) {
        header('Location: /Templates/signup.php?error=largo_clave');
        exit();
    } elseif (preg_match($caracteresProhibidos, $clave) || preg_match($caracteresProhibidos, $usuario)) {
        header('Location: /Templates/signup.php?error=caracteres_prohibidos');
        exit();
    } elseif (!preg_match($mayuscula, $clave) || !preg_match($numero, $clave)) {
        header('Location: /Templates/signup.php?error=clave_debil');
        exit();
    }
    else {
        $_SESSION['usuario_temp'] = $usuario;
        $_SESSION['clave_temp'] = $clave;
        header('Location: ../php/guardar-usuario.php');
        exit();
    }
?>
        