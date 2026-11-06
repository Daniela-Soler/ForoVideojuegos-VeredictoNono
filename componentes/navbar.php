<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg sticky-top mi-nav">
    <div class="container-fluid">
        <a href="/index.php"><img src="/Images/mini-logo.png" alt="logo" width="50"></a>
        
        <button class="navbar-toggler" type="button" 
        data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center gap-3" id="menuNav">
            <a href="/Templates/aboutus.php">¿Quiénes somos?</a>
            <a href="/Templates/categories.php">Foro</a>
            <a href="/Templates/news.php">Novedades</a>
            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="/Templates/perfil.php" class="text-danger">¡<?php echo $_SESSION['usuario']; ?>!</a>
                <a href="/php/cerrar-sesion.php">Cerrar Sesión</a>
            <?php else: ?>
                <a href="/Templates/signin.php">Iniciar Sesión</a>
                <a href="/Templates/signup.php">Registrarse</a>
            <?php endif; ?>
        </div>
    </div>
</nav>