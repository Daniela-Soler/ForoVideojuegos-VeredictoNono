<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño</title>
    <meta name="description" content="Veredicto Ñoño es el foro gamer en español donde puedes leer y publicar reseñas de tus videojuegos favoritos, debatir con la comunidad y descubrir las últimas novedades.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="./Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include './Componentes/navbar.php'; ?>
    <?php if (isset($_SESSION['bienvenida']) && $_SESSION['bienvenida'] === true): ?>
        <div class="alert alert-success text-center mt-2 mx-3">
            <p class="justify-content-center">¡Bienvenid@ de vuelta, <?php echo $_SESSION['usuario']; ?>! 🎮</p>
        </div>
        <?php unset($_SESSION['bienvenida']);?>
    <?php endif; ?>
    <?php if (isset($_GET['sesion']) && $_GET['sesion'] == 'cerrada'): ?>
        <div class="alert alert-success text-center mt-2 mx-3">
            <p class="justify-content-center">Has cerrado sesión correctamente. ¡Hasta pronto! 🎮</p>
        </div>
    <?php endif; ?>
    <header class="mt-2">
        <h1 class="ps-3">Veredicto Ñoño</h1>
        <div class="banner">
            <img class="imagen-banner" src="../Images/Logo.png" alt="logo Veredicto Ñoño">
            <video autoplay muted loop>
                <source src="./Videos/Fondo-header.mp4" type="video/mp4">
            </video>
        </div>
    </header>
    <div class="mt-2">
        <div class="row mx-0">
            <main class="col-12 col-md-8">
                <section>
                    <h2><a href="./Templates/categories.php">Categorías</a></h2>
                    <div class="d-flex justify-content-center flex-wrap">
                        <a class="link-categoria accion" href="./Templates/categories.php">Acción</a>
                        <a class="link-categoria terror" href="./Templates/categories.php">Terror</a>
                        <a class="link-categoria aventura" href="./Templates/categories.php">Aventura</a>
                        <a class="link-categoria deporte" href="./Templates/categories.php">Deportes</a>
                        <a class="link-categoria disparo" href="./Templates/categories.php">Disparos</a>
                        <a class="link-categoria estrategia" href="./Templates/categories.php">Estrategia</a>
                        <a class="link-categoria mundo-abierto" href="./Templates/categories.php">Mundo abierto</a>
                        <a class="link-categoria ciencia-ficcion" href="./Templates/categories.php">Ciencia Ficción</a>
                        <a class="link-categoria peleas" href="./Templates/categories.php">Peleas</a>
                        <a class="link-categoria arcade" href="./Templates/categories.php">Arcade</a>
                        <a class="link-categoria vehiculos" href="./Templates/categories.php">Vehículos</a>
                    </div>
                </section>
                <section class="mt-2">
                    <h2><a href="./Templates/categories.php">Reseñas</a></h2>
                    <?php include './Componentes/comentarios-index.php'; ?>
                </section>
                <section class="mt-2">
                    <h2><a href="./Templates/news.php">Novedades</a></h2>
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/xwrvPmfxe3k?si=XIfgw8AQ-zNA5up1" 
                                loading="lazy"
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                referrerpolicy="strict-origin-when-cross-origin" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </section>
            </main>
            <aside class="col-12 col-md-4">
                <h2><a href="./Templates/news.php">Videojuegos Populares</a></h2>
                <ul class="lista-juegos-populares">
                    <li><a href="./Templates/juego-residentevil.php">Resident Evil 4 Remake</a></li>
                    <li><a href="./Templates/juego-devilmaycry.php">Devil May Cry V</a></li>
                    <li><a href="./Templates/juego-masseffect.php">Mass Effect Legendary Edition</a></li>
                    <li><a href="./Templates/juego-uncharted3.php">Uncharted 3 La Traición de Drake</a></li>
                    <li><a href="./Templates/juego-littlebigplanet2.php">Little Big Planet 2</a></li>
                    <li><a href="./Templates/juego-stray.php">Stray</a></li>
                </ul>
            </aside>
        </div>
    </div>
    <?php include './Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
</body>
</html>
