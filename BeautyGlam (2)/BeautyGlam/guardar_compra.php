<?php
include("conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $pago = $_POST["pago"];
    $total = $_SESSION["total"]; // calculado desde el carrito

    // Insertar pedido
    $sql = "INSERT INTO pedidos (nombre, cedula, telefono, correo, direccion, ciudad, pago, observaciones, total, fecha)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssssd", $nombre, $cedula, $telefono, $correo, $direccion, $ciudad, $pago, $observaciones, $total);
    $stmt->execute();

    // Actualizar stock
    foreach ($_SESSION["carrito"] as $idProducto => $cantidad) {
        $sqlUpdate = "UPDATE productos SET stock = stock - ? WHERE id = ?";
        $stmtUpdate = $conexion->prepare($sqlUpdate);
        $stmtUpdate->bind_param("ii", $cantidad, $idProducto);
        $stmtUpdate->execute();
    }

    // Mostrar detalles de la compra
    echo "<h2>✅ Compra registrada correctamente</h2>";
    echo "<p>Gracias por tu pedido, $nombre.</p>";
    echo "<h3>Detalles de la compra:</h3>";
    echo "<ul>";
    foreach ($_SESSION["carrito"] as $idProducto => $cantidad) {
        // Obtener nombre y precio del producto
        $sqlProd = "SELECT nombre, precio FROM productos WHERE id = ?";
        $stmtProd = $conexion->prepare($sqlProd);
        $stmtProd->bind_param("i", $idProducto);
        $stmtProd->execute();
        $resultado = $stmtProd->get_result();
        $producto = $resultado->fetch_assoc();

        $subtotal = $producto["precio"] * $cantidad;
        echo "<li>{$producto['nombre']} - Cantidad: $cantidad - Precio: \${$producto['precio']} - Subtotal: \${$subtotal}</li>";
    }
    $total = $_POST["total"] ?? 0;

    echo "</ul>";
    echo "<h3>Total: \$$total</h3>";

    // Vaciar carrito
    unset($_SESSION["carrito"]);
}
?>
