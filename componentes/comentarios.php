<?php
// Este archivo se incluye dentro de la página de cada juego
// Requiere que $juego_id esté definido antes de incluirlo
// Ejemplo de uso: $juego_id = 2; include '../Componentes/comentarios.php';

if (!isset($juego_id)) {
    echo "<p class='text-danger'>Error: no se especificó el juego.</p>";
    return;
}

// Mensajes de feedback
if (isset($_GET['comentario'])) {
    if ($_GET['comentario'] === 'exitoso') {
        echo "<div class='alert alert-success mx-3'>¡Comentario publicado con éxito! 🎮</div>";
    } elseif ($_GET['comentario'] === 'eliminado') {
        echo "<div class='alert alert-success mx-3'>Comentario eliminado correctamente.</div>";
    }
}
if (isset($_GET['error'])) {
    $errores = [
        'campos_vacios'      => 'Por favor completa todos los campos.',
        'comentario_largo'   => 'El comentario debe tener máximo 500 caracteres.',
        'valoracion_invalida'=> 'Selecciona una valoración entre 1 y 5.',
        'caracteres_prohibidos'=> 'El comentario no puede incluir: <, >, ", \'.',
        'error_bd'           => 'Ocurrió un error, intenta nuevamente.',
        'no_autorizado'      => 'No tienes permiso para realizar esa acción.',
    ];
    $msg = $errores[$_GET['error']] ?? 'Error desconocido.';
    echo "<div class='alert alert-danger mx-3'>$msg</div>";
}
?>

<section class="mt-4 ps-3 pe-3 ps-md-5 pe-md-5">
    <h2>Comentarios</h2>

    <?php if (isset($_SESSION['usuario'])): ?>
        <!-- Formulario para comentar (solo usuarios con sesión) -->
        <form id="form-review" class="form-review mb-4" action="/php/procesar-comentariosgames.php" method="POST">
            <input type="hidden" name="juego_id" value="<?php echo $juego_id; ?>">
            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
            <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <!-- Estrellas 1 a 5 -->
            <div class="valoracion mb-3">
                <input type="radio" name="valoracion" id="estrella5" value="5">
                <label for="estrella5">★</label>
                <input type="radio" name="valoracion" id="estrella4" value="4">
                <label for="estrella4">★</label>
                <input type="radio" name="valoracion" id="estrella3" value="3">
                <label for="estrella3">★</label>
                <input type="radio" name="valoracion" id="estrella2" value="2">
                <label for="estrella2">★</label>
                <input type="radio" name="valoracion" id="estrella1" value="1">
                <label for="estrella1">★</label>
            </div>

            <textarea class="textarea-review form-control w-75 mb-2"
                      id="comentario"
                      name="comentario"
                      rows="4"
                      placeholder="Escribe tu comentario (máximo 500 caracteres)"></textarea>
            <button class="boton-comentario fw-bold" type="submit">Enviar</button>
        </form>
    <?php else: ?>
        <p>Debes <a class="link-iniciar-sesion" href="/Templates/signin.php">iniciar sesión</a> para comentar.</p>
    <?php endif; ?>

    <!-- Lista de comentarios existentes -->
    <?php
    require_once '../php/ver-comentarios.php';
    $comentarios = obtener_comentarios($conn, $juego_id);

    if (empty($comentarios)) {
        echo "<p class='mt-2'>Aún no hay comentarios. ¡Sé el primero en comentar!</p>";
    } else {
        foreach ($comentarios as $fila) {
            $nombre        = htmlspecialchars($fila['nombre_usuario']);
            $texto         = htmlspecialchars($fila['comentario']);
            $fecha         = date('d/m/Y', strtotime($fila['fecha_comentario']));
            $valoracion    = intval($fila['valoracion']);
            $comentario_id = intval($fila['comentario_id']);
            $estrellas     = str_repeat('★', $valoracion) . str_repeat('☆', 5 - $valoracion);

            echo "
            <div class='comentario-card mb-3 p-3'>
                <div class='d-flex justify-content-between align-items-center'>
                    <strong>$nombre</strong>
                    <span class='fecha-comentario'>$fecha</span>
                </div>
                <div class='valoracion-display'>$estrellas</div>
                <p class='mt-1 mb-1'>$texto</p>";

            if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === $fila['nombre_usuario']) {
                echo "
                <form action='/php/procesar-eliminarcomentario.php' method='POST' class='mb-0 form-eliminar'>
                    <input type='hidden' name='comentario_id' value='$comentario_id'>
                    <input type='hidden' name='usuario_id' value='{$_SESSION['usuario_id']}'>
                    <input type='hidden' name='juego_id' value='$juego_id'>
                    <button type='submit' class='boton-eliminar'>Eliminar</button>
                </form>";
            }
            echo "</div>";
        }
    }
    ?>
</section>