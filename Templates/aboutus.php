<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño | Nosotros</title>
    <meta name="description" content="Conoce al equipo detrás de Veredicto Ñoño, el foro gamer creado por jugadores apasionados para compartir reseñas, opiniones y experiencias del mundo de los videojuegos." />
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3 pe-3 ps-md-5 pe-md-5">¿Quiénes somos?</h1>
    </header>
    <main>
        <p class="ps-3 pe-3 ps-md-5 pe-md-5">
            Somos una comunidad de jugadores donde cada opinión cuenta: comparte tus experiencias, descubre dónde conseguir tus juegos favoritos y explora lo más popular del mundo gamer. Aquí lo importante es tu opinión, porque los juegos se disfrutan más cuando se comentan.
        </p>
        <div class="d-flex justify-content-center">
            <img class="image-aboutus" src="/Images/nosotros/Nosotros.jpeg" alt="Imagen de las creadoras del foro 'Veredicto Ñoño' caricaturizada">
        </div>
        <p class="mt-3 ps-3 pe-3 ps-md-5 pe-md-5">
            Bienvenido a un espacio creado por y para jugadores apasionados. Aquí no solo encontrarás reseñas, sino también opiniones sinceras, experiencias compartidas y recomendaciones que nacen directamente de la comunidad gamer. Nuestra misión es simple: dar voz a cada jugador, porque sabemos que cada partida deja una historia y cada reseña aporta una perspectiva única.
            En esta página podrás descubrir nuevos títulos, explorar géneros que quizás no habías probado, y conocer qué juegos están marcando tendencia. Además, tendrás la oportunidad de conectar con otros gamers que, como tú, disfrutan analizar, debatir y compartir lo que hace especial a cada juego.
            Ya sea que quieras dejar tu veredicto sobre el último lanzamiento, buscar dónde conseguir tus juegos favoritos, o simplemente leer lo que otros opinan, este es tu lugar. Únete, participa y sé parte de una comunidad que celebra el mundo gamer en todas sus formas. Porque los juegos se disfrutan más cuando se comparten.
        </p>
        <div class="d-flex align-items-center ps-3 pe-3 ps-md-5 pe-md-5 mb-3">
            <span class="texto-negrita">Saludos del equipo Ñoño</span>
            <img class="saludo ms-2" src="/Images/nosotros/Saludo.jpeg" alt="mano saludando">
        </div>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>

