<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear Cuenta | Beauty Glam</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    font-family: Arial, sans-serif;
    background: #fff5f8;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column; /* navbar arriba */
    min-height: 100vh;
}

.main {
    flex: 1; /* ocupa todo el espacio disponible */
    display: flex;
    justify-content: center;
    align-items: center; /* centra vertical y horizontal */
}

.login-card {
    background: white;
    padding: 30px;
    width: 100%;
    max-width: 350px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    text-align: center;
}
.login-card h2 {
    color: #ff4f93;
    margin-bottom: 20px;
}
.login-card input {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
}
.login-card button {
    width: 100%;
    padding: 12px;
    background: #ff4f93;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
}
.login-card button:hover {
    background: #e63b7d;
}
.login-card p {
    margin-top: 15px;
    font-size: 14px;
}
.login-card a {
    color: #ff4f93;
    text-decoration: none;
}
.login-card a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<?php include("navbar.php"); ?>

<div class="main">
    <div class="login-card">
        <h2>💖 Crear Cuenta</h2>
        <form action="registrar.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" minlength="6" required>
            <button type="submit">Registrar</button>
            <p>¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a></p>
        </form>
    </div>
</div>
