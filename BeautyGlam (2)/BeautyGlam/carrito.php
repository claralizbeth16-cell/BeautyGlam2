<?php
session_start();

// Verificar sesión activa
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrito | Beauty Glam</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("navbar.php"); ?>

<!-- CONTENEDOR -->
<div class="contenedor">
    <h2>🛒 Tu Carrito</h2>

    <div id="listaCarrito"></div>

    <h3>Total: <span id="total">$0.00</span></h3>

    <div class="acciones">
    <a href="compra.php"><button>Finalizar Compra</button></a>
</div>

</div>

<?php include("footer.php"); ?>

<script src="script.js"></script>
<script>
// Mostrar carrito al cargar la página
document.addEventListener("DOMContentLoaded", mostrarCarrito);
</script>
</body>
</html>
