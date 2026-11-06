<?php
function obtener_valoracion($conn, $juego_id) {
    $sql  = "CALL obtener_promedio_valoracion(?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $juego_id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $fila      = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);
    return $fila;
}
?>