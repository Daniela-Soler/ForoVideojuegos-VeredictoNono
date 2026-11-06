<?php
if (isset($_GET['error'])) {
    $errores = [
        'campos_vacios'        => 'Por favor completa los campos requeridos.',
        'comentario_largo'     => 'El comentario debe tener hasta 500 caracteres.',
        'valoracion_invalida'  => 'Selecciona una valoración entre 1 y 5.',
        'caracteres_prohibidos'=> 'El comentario o juego no puede incluir: <, >, ", \'.',
        'juego_invalido'       => 'El juego seleccionado no es válido.',
        'error_bd'             => 'Ocurrió un error, intenta nuevamente.',
    ];
    $msg = $errores[$_GET['error']] ?? 'Error desconocido.';
    echo "<div class='alert alert-danger mx-3'>$msg</div>";
}

if (isset($_GET['comentario']) && $_GET['comentario'] === 'exitoso') {
    echo "<div class='alert alert-success mx-3'>¡Comentario publicado con éxito! 🎮</div>";
}
?>

<section class="review centrar">
    <?php if (isset($_SESSION['usuario'])): ?>
        <form id="form-index" class="form-review container" action="/php/procesar-comentariosindex.php" method="POST">
            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
            <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI']; ?>">    
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
            <select class="input-review form-control mb-2 w-75" name="juego_id" id="juego_id" required>
                <option value="">-- Selecciona un juego --</option>
                <option value="1">Resident Evil 4 Remake</option>
                <option value="2">Devil May Cry V</option>
                <option value="3">Mass Effect Legendary Edition</option>
                <option value="4">Uncharted 3 La Traición de Drake</option>
                <option value="5">Little Big Planet 2</option>
                <option value="6">Stray</option>
            </select>
            <textarea class="textarea-review form-control w-75" name="comentario" id="comentario" rows="10" cols="100" placeholder="Escribe tu comentario"></textarea>
            <button class="boton-comentario fw-bold" type="submit">Enviar</button>
        </form>
    <?php else: ?>
        <p>Debes <a class="link-iniciar-sesion" href="/Templates/signin.php">iniciar sesión</a> para comentar.</p>
    <?php endif; ?>
</section>