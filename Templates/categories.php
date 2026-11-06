<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño | Foro</title>
    <meta name="description" content="Explora el foro de Veredicto Ñoño: navega por categorías como acción, terror o aventura, y descubre reseñas de juegos como Resident Evil, Devil May Cry y más." />
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>

    <?php include '../Componentes/navbar.php'; ?>

    <header>
        <h1 class="centrar">Categorías de juegos</h1>
    </header>
    <main class="mb-5">
        <div class="centrar mt-3">
            <button class="boton-categoria todas" data-categoria="todas">Todas</button>
            <button class="boton-categoria accion" data-categoria="accion">Acción</button>
            <button class="boton-categoria terror" data-categoria="terror">Terror</button>
            <button class="boton-categoria aventura" data-categoria="aventura">Aventura</button>
            <button class="boton-categoria deporte" data-categoria="deporte">Deportes</button>
            <button class="boton-categoria disparo" data-categoria="disparos">Disparos</button>
            <button class="boton-categoria estrategia" data-categoria="estrategia">Estrategia</button>
            <button class="boton-categoria mundo-abierto" data-categoria="mundo abierto">Mundo abierto</button>
            <button class="boton-categoria ciencia-ficcion" data-categoria="ciencia ficcion">Ciencia Ficción</button>
            <button class="boton-categoria peleas" data-categoria="peleas">Peleas</button>
            <button class="boton-categoria arcade" data-categoria="arcade">Arcade</button>
            <button class="boton-categoria vehiculos" data-categoria="vehiculos">Vehículos</button>
        </div>
        <section id="lista-juegos" class="container mt-5"></section>
    </main>

    <?php include '../Componentes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>