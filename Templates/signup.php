<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño | Registrarse</title>
    <meta name="description" content="Crea tu cuenta para participar en los foros de distintos videojuegos de la comunidad de Veredicto Ñoño.">
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <audio autoplay>
        <source src="/Audios/Apertura-pagina.mp3" type="audio/mp3">
    </audio>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="centrar">Registrarse</h1>
    </header>
    <main class="container">
        <?php
            $errores = [
                'campos_vacios'        => 'Por favor completa todos los campos.',
                'claves_distintas'     => 'Las contraseñas no coinciden.',
                'largo_usuario'        => 'El nombre de usuario debe tener entre 4 y 20 caracteres.',
                'largo_clave'          => 'La contraseña debe tener entre 8 y 20 caracteres.',
                'caracteres_prohibidos'=> 'El usuario o contraseña contiene caracteres no permitidos.',
                'clave_debil'          => 'La contraseña debe tener al menos un número y una mayúscula.',
                'usuario_existente'    => 'El nombre de usuario ya existe, elige otro.'
            ];
            
        ?>
        <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <?php 
                if (isset($_GET['error']) && array_key_exists($_GET['error'], $errores)) {
                    echo "<div class='alert alert-danger mt-3 centrar'>" . $errores[$_GET['error']] . "</div>";
                }
                ?>
                <form class="form-review" action="../php/procesar-signup.php" method="post" id="form-signup">
                    <input class="form-control input-review mb-2" type="text" name="usuario" id="usuario" placeholder="Nombre de usuario" required>
                    <input class="form-control input-review mb-2" type="password" name="clave" id="clave" placeholder="Contraseña" required>
                    <input class="form-control input-review mb-2" type="password" name="repetir-clave" id="repetir-clave" placeholder="Repetir contraseña" required>
                    <button class="boton-comentario" type="submit">Iniciar viaje</button>
                </form>
                <div class="d-flex justify-content-center mt-3 gap-2">
                    <span>¿Ya tienes cuenta?</span>
                    <a class="link-registro" href="/Templates/signin.php">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>