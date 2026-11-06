<?php 
session_start(); 
$juego_id = 3; 
require_once '../php/conexion.php';
require_once '../php/ver-valoracion.php';
$valoracion = obtener_valoracion($conn, $juego_id);
?>
<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño | Mass Effect Legendary Edition</title>
    <meta name="description" content="Únete al foro de Mass Effect Legendary Edition y comparte tus opiniones, experiencias y debates sobre la saga.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Mass Effect Legendary Edition</h1>
        <div class="ps-3 mt-1 mb-1 d-flex align-items-center gap-2">
            <?php if ($valoracion && $valoracion['total_comentarios'] > 0): ?>
                <div class="estrellas-promedio-container">
                    <?php
                    $promedio = $valoracion['promedio'];
                    $porcentaje = ($promedio / 5) * 100;
                    ?>
                    <div class="estrellas-vacias">☆☆☆☆☆</div>
                    <div class="estrellas-llenas" style="width: <?php echo $porcentaje; ?>%">★★★★★</div>
                </div>
                <span class="texto-promedio">
                    <?php echo $promedio; ?>/5 
                    (<?php echo $valoracion['total_comentarios']; ?> 
                    <?php echo $valoracion['total_comentarios'] === 1 ? 'valoración' : 'valoraciones'; ?>)
                </span>
            <?php else: ?>
                <p class="texto-sin-valoracion mb-0">Aún sin valoraciones</p>
            <?php endif; ?>
        </div>
        <div class="d-flex flex-wrap gap-2 ps-3 mt-2 mb-3">
            <a class="link-categoria ciencia-ficcion" href="/Templates/categories.php">Ciencia Ficción</a>
            <a class="link-categoria accion" href="/Templates/categories.php">Acción</a>
        </div>
        <img class="image-games" src="/Images/juegos/masseffect.webp" alt="Imagen de la portada del videojuego Mass Effect Legendary Edition">
    </header>
    <main>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Una persona es el último bastión entre la humanidad y la mayor amenaza que jamás haya enfrentado. Revive la leyenda del comandante Shepard en la aclamada trilogía Mass Effect con Mass Effect™ Legendary Edition. Incluye el contenido base para un jugador y más de 40 artículos descargables de Mass Effect, Mass Effect 2 y Mass Effect 3, además de armas, armaduras y paquetes promocionales remasterizados y optimizados en 4K Ultra HD.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Explora un universo increíblemente rico y detallado, en el que tus decisiones tienen consecuencias profundas sobre la acción y el resultado.</p>
        <?php include '../Componentes/comentarios.php'; ?>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>