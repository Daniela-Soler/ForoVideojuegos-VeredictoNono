<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /Templates/signin.php');
    exit();
}

include("conexion.php");

$datos         = $_SESSION['eliminar_temp'];
$comentario_id = $datos['comentario_id'];
$usuario_id    = $datos['usuario_id'];
$redirect      = $datos['redirect'];

unset($_SESSION['eliminar_temp']);

$sql  = "CALL eliminar_comentario(?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $comentario_id, $usuario_id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: $redirect?comentario=eliminado");
    exit();
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: $redirect?error=error_bd");
    exit();
}
?>