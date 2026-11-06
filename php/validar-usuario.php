<?php
session_start();
include("conexion.php");

$usuario = $_SESSION['usuario_temp'];
$clave = $_SESSION['clave_temp'];
$_SESSION['bienvenida'] = true;

unset($_SESSION['usuario_temp']);
unset($_SESSION['clave_temp']);

$sql = "CALL verificar_usuario(?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "s", $usuario);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$lista = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

if ($lista && password_verify($clave, $lista['clave'])) {
    session_regenerate_id(true);
    $_SESSION['usuario'] = $lista['nombre_usuario'];
    $_SESSION['usuario_id'] = $lista['usuario_id'];

    header('Location: /index.php');
    exit();
} else {
    header('Location: /Templates/signin.php?error=credencialesincorrectas');
    exit();
}

?>