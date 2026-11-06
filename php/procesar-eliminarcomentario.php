<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /Templates/signin.php');
    exit();
}

$comentario_id = intval($_POST['comentario_id'] ?? 0);
$usuario_id    = intval($_POST['usuario_id'] ?? 0);
$juego_id      = intval($_POST['juego_id'] ?? 0);

$juegos = [
    1 => 'juego-residentevil',
    2 => 'juego-devilmaycry',
    3 => 'juego-masseffect',
    4 => 'juego-uncharted3',
    5 => 'juego-littlebigplanet2',
    6 => 'juego-stray'
];

$redirect = isset($juegos[$juego_id]) ? "/Templates/{$juegos[$juego_id]}.php" : '/index.php';

if ($comentario_id === 0 || $usuario_id === 0) {
    header("Location: $redirect?error=datos_invalidos");
    exit();
} elseif ($usuario_id !== intval($_SESSION['usuario_id'])) {
    header("Location: $redirect?error=no_autorizado");
    exit();
} else {
    $_SESSION['eliminar_temp'] = [
        'comentario_id' => $comentario_id,
        'usuario_id'    => $usuario_id,
        'redirect'      => $redirect
    ];
    header('Location: /php/eliminar-comentario.php');
    exit();
}
?>