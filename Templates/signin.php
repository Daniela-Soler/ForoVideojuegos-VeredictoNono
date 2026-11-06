<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño | Iniciar Sesión </title>
    <meta name="description" content="Inicia sesión en Veredicto Ñoño para participar en el foro, publicar tus reseñas y conectar con la comunidad gamer.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="centrar">Iniciar Sesión</h1>
    </header>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <?php
                $errores = [
                    'camposvacios' => 'Por favor completa todos los campos.',
                    'largousuarioypass' => 'Usuario o contraseña incorrecta, vuelve a intentar.',
                    'caracteresprohibidos' => 'El usuario o contraseña contiene caracteres no permitidos.',
                    'credencialesincorrectas' => 'Usuario o contraseña incorrecta, vuelve a intentar.'
                ];

                if(isset($_GET['error']) && array_key_exists($_GET['error'], $errores)) {
                    echo "<div class='alert alert-danger mt-3 centrar'>" . $errores[$_GET['error']] . "</div>";
                }

                if (isset($_GET['registro']) && $_GET['registro'] == 'exitoso') {
                    echo "<div class='alert alert-success centrar'>¡Registro exitoso! Ya puedes iniciar sesión.</div>";
                }
                ?>
                <form class="form-review" action="../php/procesar-signin.php" method="post" id="form-signin">
                    <input class="form-control input-review mb-2" type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" required>
                    <input class="form-control input-review mb-2" type="password" name="password" id="password" placeholder="Contraseña" required>
                    <button class="boton-comentario" type="submit">Seguir viaje</button>
                </form>
                <div class="d-flex justify-content-center mt-3 gap-2">
                    <span>¿No tienes cuenta?</span>
                    <a class="link-registro" href="/Templates/signup.php">Registrarse</a>
                </div>
            </div>
        </div>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>