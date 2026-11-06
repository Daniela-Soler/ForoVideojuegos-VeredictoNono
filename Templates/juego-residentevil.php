<?php 
session_start(); 
$juego_id = 1; 
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
    <title>Veredicto Ñoño | Resident Evil 4 Remake</title> 
    <meta name="description" content="Únete al foro de Resident Evil 4 Remake y comparte tus opiniones, experiencias y debates sobre la saga.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Resident Evil 4 Remake</h1>          
        <p> Hasta ahora el mejor remake de Capcom</p>
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
            <a class="link-categoria terror" href="/Templates/categories.php">Terror</a>
            <a class="link-categoria disparo" href="/Templates/categories.php">Disparos</a>
        </div>
        <img class="image-games" src="/Images/juegos/residentevil.jpeg" alt="Portada del Videojuego Resident Evil 4 Remake">
    </header>
    <main>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">El remake de Resident Evil 4 es, hasta ahora, el que más se acerca al espíritu de los originales. Conserva la jugabilidad centrada en la acción, pero sin perder esos matices de terror que siempre han caracterizado a la saga. Más allá del evidente lavado de imagen, el título mantiene una esencia muy similar, aunque con añadidos que enriquecen la experiencia.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">El modo Separate Ways aporta detalles inéditos que no estaban presentes en la versión de 2005, ampliando la historia y ofreciendo nuevas perspectivas. Además, el clásico modo Mercenarios fue remasterizado, permitiendo jugar con más personajes y desbloquear recompensas adicionales, lo que le da un aire fresco y rejugable.</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">En conjunto, estas mejoras no solo respetan la obra original, sino que la elevan, logrando un equilibrio perfecto entre nostalgia y modernidad.</p>
        <?php include '../Componentes/comentarios.php'; ?>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>