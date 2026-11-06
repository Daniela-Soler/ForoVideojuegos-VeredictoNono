<?php 
session_start(); 
$juego_id = 2; 
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
    <title>Veredicto Ñoño | Devil May Cry V </title>
    <meta name="description" content="Únete al foro de Devil May Cry y comparte tus opiniones, experiencias y debates sobre la saga.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Devil May Cry V</h1>
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
            <a class="link-categoria accion" href="/Templates/categories.php">Acción</a>
        </div>
        <img class="image-games mt-3" src="/Images/juegos/devilmaycry.jpeg" alt="foto referencial del juego Devil May Cry V">
    </header>
    <main>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">Es quizás el mejor juego de la saga, con una historia que se siente más completa y un gameplay que se siente más fluido y satisfactorio. Además, los gráficos son impresionantes y la banda sonora es increíble. En general, Devil May Cry V es un juego que definitivamente vale la pena jugar para los fans de la saga y para aquellos que buscan un buen juego de acción.</p>
        <h2 class="ps-3 pe-3 ps-md-5 pe-md-5">¿De qué trata?</h2>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5"> Devil May Cry v es un juego lanzado en 2019, es un juego de acción y aventura desarrollado por Capcom. La historia sigue a tres personajes principales: Dante, Nero y V, quienes luchan contra demonios para salvar el mundo. El juego presenta una jugabilidad fluida y satisfactoria, con una variedad de armas y habilidades para elegir. Además, los gráficos son impresionantes y la banda sonora es increíble. En general, Devil May Cry V es un juego que definitivamente vale la pena jugar para los fans de la saga y para aquellos que buscan un buen juego de hack and slash. </p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5"> ¡Prueba a utilizar diferentes ataques y haz el mayor combo posible!</p>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5"> Recuerda compartirlo aqui en el foro para que otros jugadores puedan verlo y aprender de tus habilidades. ¡Diviértete jugando Devil May Cry V!</p>
        <?php include '../Componentes/comentarios.php'; ?>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>