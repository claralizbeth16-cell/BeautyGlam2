<?php
include("conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo   = trim($_POST['correo']);
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT id, nombre, password FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['nombre'];
            echo "<script>
            alert('✅ Bienvenida ".$usuario['nombre'].", sesión iniciada correctamente.');
            window.location='index.php';
            </script>";
        } else {
            echo "<script>
            alert('❌ Contraseña incorrecta');
            window.location='login.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('❌ Usuario no encontrado');
        window.location='login.php';
        </script>";
    }
}
?>
