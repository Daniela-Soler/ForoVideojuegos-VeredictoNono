<?php 
session_start(); 
$juego_id = 4; 
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
    <title>Veredicto Ñoño | Uncharted 3 La Traición de Drake</title>
    <meta name="description" content="Únete al foro de Uncharted 3 y comparte tus opiniones, experiencias y debates sobre la saga.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Uncharted 3 La Traición de Drake</h1>
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
            <a class="link-categoria accion" href="/Templates/categories.php">Acción</a>
            <a class="link-categoria disparo" href="/Templates/categories.php">Disparos</a>
            <a class="link-categoria aventura" href="/Templates/categories.php">Aventura</a>
        </div>
        <img class="image-games" src="/Images/juegos/uncharted3.jpg" alt="Imagen de la portada del videojuego Uncharted 3 La Traición de Drake">
    </header>
    <main>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Parte hacia una aventura en busca de la mítica Atlántida de las arenas con la vuelta de Nathan Drake, el intrépido cazatesoros.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Viaja desde las mezquinas calles de Londres hasta la península arábiga supera peligros y derrota a nuevos enemigos para sobrevivir.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Vive la tercera entrega de la aclamada saga de aventuras que redefinió el género.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Métete de lleno en una aventura de acción que desdibuja los límites entre los juegos y las películas de Hollywood: una historia llena de secuencias de acción impresionantes y un ritmo apasionante. Enfréntate a los enemigos de nuevas maneras: combate cuerpo a cuerpo con varios enemigos, ataques melé según la situación y opciones nuevas de sigilo. Como desafío adicional, recoge reliquias antiguas para desbloquear contenido extra.</p>
        <?php include '../Componentes/comentarios.php'; ?>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>