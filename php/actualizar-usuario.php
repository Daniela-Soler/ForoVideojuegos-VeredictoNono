<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /Templates/signin.php');
    exit();
}

include("conexion.php");

$usuario_nuevo   = $_SESSION['usuario_nuevo_temp'];
$usuario_antiguo = $_SESSION['usuario'];

unset($_SESSION['usuario_nuevo_temp']);

$sql  = "CALL actualizar_usuario(?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $usuario_nuevo, $usuario_antiguo);

try {
    mysqli_stmt_execute($stmt);
    $_SESSION['usuario'] = $usuario_nuevo;
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: /Templates/perfil.php?actualizado=exitoso');
    exit();
} catch (Exception $e) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header('Location: /Templates/perfil.php?error=usuario_existente');
    exit();
}


?>