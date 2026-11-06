<?php
require_once '../php/conexion.php';

function obtener_comentarios($conn, $juego_id) {
    $sql  = "CALL ver_comentarios(?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $juego_id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $comentarios = [];

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $comentarios[] = $fila;
    }

    mysqli_stmt_close($stmt);
    return $comentarios;
}
?>