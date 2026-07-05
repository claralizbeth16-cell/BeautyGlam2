<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Beauty Glam | Inicio</title>
<link rel="stylesheet" href="style.css">
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: #fff5f8;
}
.hero {
    height: 60vh;
    background: url('img/Portada.jpeg') no-repeat center center/cover;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
    font-size: 2rem;
    font-weight: bold;
}
.saludo {
    text-align: center;
    margin: 20px;
    font-size: 1.2rem;
    color: #ff4f93;
}
</style>
</head>
<body>

<?php include("navbar.php"); ?>

<div class="bienvenida">
    <!-- Columna izquierda: texto -->
    <div class="texto">
        <h1>Bienvenida a Beauty Glam 💖</h1>
    </div>

    <!-- Columna derecha: imagen -->
    <div class="imagen">
        <img src="img/Portada.jpeg" alt="Beauty Glam" class="imagen-bienvenida">
    </div>
</div>


<?php include("footer.php"); ?>

</body>
</html>
