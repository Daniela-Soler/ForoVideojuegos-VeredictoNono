<?php 
session_start(); 
$juego_id = 6; 
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
    <title>Veredicto Ñoño | Stray</title>   
    <meta name="description" content="Únete al foro de Stray y comparte tus opiniones, experiencias y debates sobre el juego.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
     <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Stray</h1>          
        <p>La aventura del felino en tercera persona</p>
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
            <a class="link-categoria aventura" href="/Templates/categories.php">Aventura</a>
            <a class="link-categoria estrategia" href="/Templates/categories.php">Estrategia</a>
        </div>
        <img class="image-games" src="/Images/juegos/stray.jpeg" alt="imagen del videojuego Stray">
    </header>
    <main>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Stray es un juego que conquista desde el primer momento. Su propuesta es sencilla pero profundamente encantadora: ponernos en la piel de un gato callejero que explora una ciudad futurista habitada por robots.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Lo que más destaca es su animación tierna y detallada, que logra transmitir la esencia felina con gestos y movimientos realistas. Cada salto, cada maullido y cada momento de descanso se sienten auténticos, lo que genera una conexión inmediata con el protagonista.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Además, el juego tiene un aire nostálgico y cálido, como si nos invitara a recordar la curiosidad y la ternura de los gatos que hemos conocido en la vida real. La atmósfera, acompañada por una banda sonora suave y melancólica, refuerza esa sensación de estar en un mundo extraño pero acogedor.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">No es casualidad que Stray se haya convertido en el favorito de los amantes de los gatos: es una carta de amor a estos animales, y al mismo tiempo una experiencia que mezcla exploración, misterio y emoción. En definitiva, es un título que no solo se juega, sino que se siente.</p>
        <?php include '../Componentes/comentarios.php'; ?>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>