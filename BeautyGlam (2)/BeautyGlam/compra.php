<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Compra | Beauty Glam</title>
</head>
<body>
<?php include("navbar.php"); ?>

<div class="contenedor">
    <h2>📝 Datos de la Compra</h2>
    <form action="guardar_compra.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Cédula:</label>
        <input type="text" name="cedula" required><br>

        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br>

        <label>Correo:</label>
        <input type="email" name="correo" required><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" required><br>

        <label>Ciudad:</label>
        <input type="text" name="ciudad" required><br>

        <label>Método de pago:</label>
        <select name="pago" required>
            <option value="Pago contra entrega ">Pago contra entrega</option>
        </select><br>


        <button type="submit">Confirmar Compra</button>
    </form>
</div>


<?php include("footer.php"); ?>
</body>
</html>
<input type="hidden" name="total" value="<?php echo $_SESSION['total']; ?>">

