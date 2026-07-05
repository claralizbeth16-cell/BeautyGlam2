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
<title>Productos | Beauty Glam</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("navbar.php"); ?>

<div class="contenedor">
    <h2>✨ Nuestros Productos</h2>
    <div class="catalogo">
        <?php
        // Ejemplo de productos (puedes traerlos de DB más adelante)
        $productos = [
            ["nombre"=>"Base Líquida","precio"=>12,"img"=>"img/base.gif"],
            ["nombre"=>"Labial Mate","precio"=>8,"img"=>"img/labial.jpg"],
            ["nombre"=>"Rubor","precio"=>10,"img"=>"img/rubor.jpg"],
            ["nombre"=>"Delineador","precio"=>6,"img"=>"img/delineador.jpg"],
            ["nombre"=>"Máscara de pestañas","precio"=>9,"img"=>"img/mascara.jpg"],
            ["nombre"=>"Paleta de Sombras","precio"=>18,"img"=>"img/paleta.gif"],
        ];

        foreach($productos as $p){
            echo '<div class="card">';
            echo '<img src="'.$p["img"].'" alt="'.$p["nombre"].'">';
            echo '<h3>'.$p["nombre"].'</h3>';
            echo '<p>$'.$p["precio"].'</p>';
            echo '<button onclick="agregarCarrito(\''.$p["nombre"].'\','.$p["precio"].')">Agregar al carrito</button>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>

<script src="script.js"></script>
</body>
</html>
