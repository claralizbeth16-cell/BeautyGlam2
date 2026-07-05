<header class="navbar">
    <div class="logo">💖 Beauty Glam</div>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="nosotros.php">Nosotros</a>
        <a href="mision.php">Misión</a>
        <a href="vision.php">Visión</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="contacto.php">Contacto</a>

        <?php if(isset($_SESSION['usuario'])): ?>
            <a href="carrito.php">Carrito</a>
            <a href="cerrar_sesion.php" class="btn-login">Cerrar Sesión</a>
        <?php else: ?>
            <a href="login.php" class="btn-login">Iniciar Sesión</a>
            <a href="crear-cuenta.php" class="btn-login">Crear Cuenta</a>
        <?php endif; ?>
    </nav>
</header>

