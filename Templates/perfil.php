<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: /Templates/signin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Veredicto Ñoño | Mi Perfil</title>
    <link rel="shortcut icon" href="/Images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="cursor-personalizado">🎮</div>
    <?php include '../Componentes/navbar.php'; ?>
    <header>
        <h1 class="ps-3">Mi Perfil</h1>
    </header>
    <main class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-10 col-md-4 mb-3">

                <?php
                $errores = [
                    'campo_vacio'          => 'Por favor ingresa un nombre de usuario.',
                    'largo_usuario'        => 'El nombre debe tener entre 4 y 20 caracteres.',
                    'caracteres_prohibidos'=> 'El nombre contiene caracteres no permitidos.',
                    'usuario_existente'    => 'Ese nombre de usuario ya existe, elige otro.',
                    'error_bd'             => 'Ocurrió un error, intenta nuevamente.',
                ];
                if (isset($_GET['error']) && array_key_exists($_GET['error'], $errores)) {
                    echo "<div class='alert alert-danger'>" . $errores[$_GET['error']] . "</div>";
                }
                if (isset($_GET['actualizado']) && $_GET['actualizado'] === 'exitoso') {
                    echo "<div class='alert alert-success'>¡Nombre de usuario actualizado con éxito! 🎮</div>";
                }
                ?>

                <p>Usuario actual: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>

                <form class="form-review" id="form-perfil" action="/php/procesar-perfil.php" method="POST">
                    <input class="form-control input-review mb-2"
                           type="text"
                           name="usuario_nuevo"
                           placeholder="Nuevo nombre de usuario"
                           maxlength="20"
                           required>
                    <button class="boton-comentario" type="submit">Cambiar nombre</button>
                </form>

            </div>
        </div>
    </main>
    <?php include '../Componentes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>