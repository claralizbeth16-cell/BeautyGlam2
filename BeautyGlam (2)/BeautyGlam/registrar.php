<?php
include("conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = trim($_POST['nombre']);
    $correo   = trim($_POST['correo']);
    $password = $_POST['password'];

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar usuario
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $passwordHash);

    if ($stmt->execute()) {
        $_SESSION['usuario'] = $nombre;
       echo "<script>
       alert('✅ Cuenta creada correctamente. Ahora inicia sesión con tus datos.');
       window.location='login.php';
     </script>";

    } else {
        echo "<script>
        alert('❌ Error al crear la cuenta: ".$stmt->error."');
        window.location='crear-cuenta.php';
        </script>";
    }
}
?>
