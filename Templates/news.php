<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño | Novedades</title>
    <meta name="description" content="Mantente al día con las últimas noticias del mundo gamer en Veredicto Ñoño: lanzamientos, rumores, actualizaciones y novedades de Nintendo Switch 2, Resident Evil, Zelda y más.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>   
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Noticias Ñoñas</h1>
    </header>
    <main>
        <p>Cuando se trata de noticias, el Veredicto Ñoño siempre está al tanto de lo último en el mundo del entretenimiento, la tecnología y la cultura pop. Aquí encontrarás las novedades más emocionantes y relevantes que no puedes perderte. Desde lanzamientos de videojuegos extremadamente conocidos y juegos no tan conocidos. aquí incluso encontraras avances tecnológicos, el Veredicto Ñoño te mantendrá informado sobre todo lo que está sucediendo en el mundo del entretenimiento y la cultura. ¡No te pierdas nuestras actualizaciones regulares para estar siempre al día con las últimas noticias!</p>
        <h2 class="ps-3 mt-2 text-center pb-2"> ¡Últimas Noticias!</h2>
        <div class="container">
            <div class="row w-100 justify-content-center">
                <div class="col-12 col-md-6 text-center mb-4">
                    <article class="noticia mb-4">
                        <p>- NSwitch2: Se cree que el siguiente nintendo direct será durante el mes de junio</p>
                        <img class="image-news" src="/Images/noticias/NintendoSwitch.jpeg" alt="imagen de referencia sobre los Ndirects">
                    </article>
                    <article class="noticia mb-4">
                        <p>- Resident Evil: Se ha eliminado bug que permitía tener "balas infinitas" en el juego, en todas las plataformas, excluyendo por el momento NSwitch2</p>
                        <img class="image-news" src="/Images/noticias/re9.jpeg" alt="imagen de referencia sobre Resident Evil">
                    </article>
                    <article class="noticia mb-4">
                        <p>- Devil May Cry: Se cree que pronto llegará Devil may cry 5 a NSwitch2, aunque no se ha confirmado nada por parte de Capcom, se rumorea que el juego llegará a la consola híbrida en el mes de septiembre.</p>
                        <img class="image-news" src="/Images/noticias/dmc5.jpeg" alt="imagen de referencia sobre Devil May Cry">
                    </article>
                </div>    
                <div class="col-12 col-md-6 text-center mb-4">
                    <article class="noticia mb-4">
                        <p>- The legend Of Zelda: Comienza a rumorearse que el nuevo juego de la saga "The Legend of Zelda" llegará a NSwitch2, aunque no se ha confirmado nada por parte de Nintendo, se cree que el juego llegará a la consola híbrida en el mes de noviembre.</p>
                        <img class="image-news" src="/Images/noticias/zelda.jpeg" alt="imagen de referencia sobre The legend of Zelda">
                    </article>
                    <article class="noticia mb-4">
                        <p>- Pokemon: Este año se celebrará el 30 aniversario de la saga "Pokémon", aunque no se ha confirmado nada por parte de Nintendo, se rumorea que habrá un nuevo juego de la saga para NSwitch2, aunque no se sabe nada sobre su fecha de lanzamiento.</p>
                        <img class="image-news" src="/Images/noticias/pokemon.jpeg" alt="imagen de referencia sobre Pokemon">
                    </article>
                    <article class="noticia mb-4">
                        <p>- Doom: Se ha confirmado que el juego "Doom" llegará a NSwitch2, aunque no se sabe nada sobre su fecha de lanzamiento.</p>
                        <img class="image-news" src="/Images/noticias/doom.jpeg" alt="imagen de referencia sobre Doom">
                    </article>
                </div>
            </div>
        </div>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>