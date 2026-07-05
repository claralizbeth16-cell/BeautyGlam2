<?php
session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Regenerar ID de sesión por seguridad
session_regenerate_id(true);

// Redirigir al inicio
header("Location: index.php");
exit;
?>
