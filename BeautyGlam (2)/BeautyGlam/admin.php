<?php
session_start();
include("conexion.php");

// Verificar sesión activa (solo administradores)
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

// Consultar pedidos
$sql = "SELECT id, nombre, cedula, telefono, correo, direccion, ciudad, pago, observaciones, carrito, total, fecha 
        FROM pedidos ORDER BY fecha DESC";
$result = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administración de Pedidos | Beauty Glam</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    font-family: Arial, sans-serif;
    background: #fff5f8;
    margin: 0;
    padding: 0;
}
.contenedor {
    max-width: 1200px;
    margin: 40px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
    color: #e91e63;
    margin-bottom: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}
table th {
    background: #e91e63;
    color: white;
}
table tr:nth-child(even) {
    background: #f9f9f9;
}
</style>
</head>
<body>

<?php include("navbar.php"); ?>

<div class="contenedor">
    <h2>📋 Administración de Pedidos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Cédula</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Pago</th>
            <th>Observaciones</th>
            <th>Carrito</th>
            <th>Total</th>
            <th>Fecha</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($pedido = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $pedido['id'] ?></td>
                    <td><?= htmlspecialchars($pedido['nombre']) ?></td>
                    <td><?= htmlspecialchars($pedido['cedula']) ?></td>
                    <td><?= htmlspecialchars($pedido['telefono']) ?></td>
                    <td><?= htmlspecialchars($pedido['correo']) ?></td>
                    <td><?= htmlspecialchars($pedido['direccion']) ?></td>
                    <td><?= htmlspecialchars($pedido['ciudad']) ?></td>
                    <td><?= htmlspecialchars($pedido['pago']) ?></td>
                    <td><?= htmlspecialchars($pedido['observaciones']) ?></td>
                    <td><?= htmlspecialchars($pedido['carrito']) ?></td>
                    <td>$<?= number_format($pedido['total'], 2) ?></td>
                    <td><?= $pedido['fecha'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="12">⚠️ No hay pedidos registrados.</td></tr>
        <?php endif; ?>
    </table>
</div>

<?php include("footer.php"); ?>

</body>
</html>
<?php $conexion->close(); ?>
