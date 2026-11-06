<?php 
session_start(); 
$juego_id = 5; 
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
    <title>Veredicto Ñoño | Little Big Planet 2</title>  
    <meta name="description" content="Únete al foro de Little Big Planet 2 y comparte tus opiniones, experiencias y debates sobre la saga.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
     <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Little Big Planet 2</h1>    
        <p>El impresionante juego de plataformas que te permite crear y compartir tus propios niveles</p>      
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
            <a class="link-categoria mundo-abierto" href="/Templates/categories.php">Mundo abierto</a>
        </div>
        <img class="image-games" src="/Images/juegos/littlebigplanet2.jpeg" alt="imagen referenciada al videojuego Little Big Planet 2">
    </header>
    <main>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Little Big Planet 2 es un juego de plataformas desarrollado por Media Molecule y publicado por Sony Computer Entertainment para PlayStation 3. Es la secuela de Little Big Planet, lanzado en 2008. El juego fue lanzado en enero de 2011 y recibió críticas positivas por su creatividad, jugabilidad y la capacidad de los jugadores para crear sus propios niveles y compartirlos en línea. Little Big Planet 2 ofrece una amplia variedad de herramientas de creación, lo que permite a los jugadores diseñar niveles únicos y compartirlos con la comunidad. El juego también presenta una campaña para un jugador con una historia encantadora y personajes adorables.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Este juego es una experiencia divertida y creativa que ha sido muy apreciada por los fanáticos de los juegos de plataformas y la comunidad de creadores de contenido.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5 texto-negrita">¡Divertido, creativo, encantador y adorable!</p>
        <?php include '../Componentes/comentarios.php'; ?>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>