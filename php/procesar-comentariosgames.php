<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /Templates/signin.php');
    exit();
}

$juego_id   = intval($_POST['juego_id'] ?? 0);
$comentario = trim($_POST['comentario'] ?? '');
$valoracion = intval($_POST['valoracion'] ?? 0);
$usuario_id = intval($_SESSION['usuario_id'] ?? 0);
$redirect   = $_POST['redirect'] ?? '/index.php';

$caracteresProhibidos = '/[<>"\']/';

if ($juego_id === 0 || $usuario_id === 0) {
    header("Location: $redirect?error=campos_vacios");
    exit();
} elseif (mb_strlen($comentario) > 500) {
    header("Location: $redirect?error=comentario_largo");
    exit();
} elseif ($valoracion < 1 || $valoracion > 5) {
    header("Location: $redirect?error=valoracion_invalida");
    exit();
} elseif (preg_match($caracteresProhibidos, $comentario)) {
    header("Location: $redirect?error=caracteres_prohibidos");
    exit();
} else {
    $_SESSION['comentario_temp'] = [
        'juego_id'   => $juego_id,
        'comentario' => $comentario,
        'valoracion' => $valoracion,
        'usuario_id' => $usuario_id,
        'redirect'   => $redirect
    ];
    header('Location: /php/hacer-comentario.php');
    exit();
}
?>