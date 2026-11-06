<?php
session_start();
include("conexion.php");

$usuario = $_SESSION['usuario_temp'];
$clave = $_SESSION['clave_temp'];

unset($_SESSION['usuario_temp']);
unset($_SESSION['clave_temp']);

$claveHasheada = password_hash($clave, PASSWORD_BCRYPT);

$sql = "CALL crear_usuario(?, ?, @resultado)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "ss", $usuario, $claveHasheada);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

$resultado = mysqli_query($conn, "SELECT @resultado AS resultado");
$fila = mysqli_fetch_assoc($resultado);

if ($fila['resultado'] == 0) {
    header('Location: /Templates/signin.php?registro=exitoso');
    exit();
} else {
    header('Location: /Templates/signup.php?error=usuario_existente');
    exit();
}

mysqli_close($conn);
?>