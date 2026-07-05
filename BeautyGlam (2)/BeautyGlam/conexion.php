<?php
// Configuración de conexión
$host = "localhost";
$user = "root";
$password = "";
$dbname = "beautyglam";

// Crear conexión con manejo de errores
$conexion = mysqli_connect($host, $user, $password, $dbname);

// Verificar conexión
if (!$conexion) {
    die("❌ Error de conexión con la base de datos: " . mysqli_connect_error());
}

// Establecer codificación de caracteres
mysqli_set_charset($conexion, "utf8");

// ✅ Conexión lista para usarse en todo el proyecto
?>
