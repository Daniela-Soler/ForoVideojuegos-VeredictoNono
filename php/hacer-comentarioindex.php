<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /Templates/signin.php');
    exit();
}

include("conexion.php");

$datos      = $_SESSION['comentario_index_temp'];
$juego_id   = $datos['juego_id'];
$comentario = $datos['comentario'];
$valoracion = $datos['valoracion'];
$usuario_id = $datos['usuario_id'];
$redirect   = $datos['redirect'];

unset($_SESSION['comentario_index_temp']);

$sql  = "CALL hacer_comentario(?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iisd", $usuario_id, $juego_id, $comentario, $valoracion);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: $redirect?comentario=exitoso");
    exit();
} else {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: $redirect?error=error_bd");
    exit();
}
?>