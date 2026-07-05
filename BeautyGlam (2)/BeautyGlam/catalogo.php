<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catálogo | Beauty Glam</title>
<link rel="stylesheet" href="style.css">
<style>
.contenedor {
    max-width: 1000px;
    margin: 40px auto;
    padding: 20px;
}
.catalogo {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); /* más pequeñas */
    gap: 20px;
}
.card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    text-align: center;
    padding: 10px;
}
.card img {
    width: 100%;
    height: 120px; /* más pequeñas */
    object-fit: cover;
    border-radius: 6px;
}
.card h3 {
    margin: 10px 0 5px;
    color: #333;
    font-size: 16px;
}
.card p {
    font-weight: bold;
    color: #e91e63;
    margin: 5px 0;
}
.card button {
    background: #e91e63;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
}
.card button:hover {
    background: #c2185b;
}
</style>
</head>
<body>

<?php include("navbar.php"); ?>

<div class="contenedor">
    <h2>✨ Catálogo de Productos</h2>
    <div class="catalogo">
        <?php
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

            // Mostrar precio y botón solo si hay sesión activa
            if(isset($_SESSION["usuario"])) {
                echo '<p>$'.$p["precio"].'</p>';
                echo '<button onclick="agregarCarrito(\''.$p["nombre"].'\','.$p["precio"].')">Agregar al carrito</button>';
            }

            echo '</div>';
        }
        ?>
    </div>
</div>


<script src="script.js"></script>
</body>
</html>
