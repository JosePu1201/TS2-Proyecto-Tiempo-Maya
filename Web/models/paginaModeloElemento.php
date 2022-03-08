<?php

use function PHPSTORM_META\type;

session_start(); ?>
<?php

$conn = include '../conexion/conexion.php';
include './Energia.php';
$tabla = $_GET['elemento'];
$table =strtolower($tabla);
$datos = $conn->query("SELECT nombre,significado,htmlCodigo FROM tiempo_maya." . $table . ";");
$elementos = $datos;
$informacion = $conn->query("SELECT htmlCodigo FROM tiempo_maya.pagina WHERE nombre='" . $tabla . "';");



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - <?php echo $tabla; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "../blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="../css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="../css/paginaModelo.css?v=<?php echo (rand()); ?>" />


</head>
<?php include "../NavBar2.php" ?>

<body>
    <section id="inicio">
        <div id="inicioContainer" class="inicio-container">

            <?php echo "<h1>" . $tabla . " </h1>";
            ?>
            <a href='#informacion' class='btn-get-started'>Informacion</a>
            <a href='#elementos' class='btn-get-started'>Elementos</a>
        </div>
    </section>
    <section id="information">
        <div class="container">
            <div class="row about-container">
                <div class="section-header">
                    <h3 class="section-title">INFORMACION</h3>
                </div>
                <?php foreach($informacion as $info){
                    echo $info['htmlCodigo'];
                }?>
            </div>

        </div>
    </section>
    <hr>
    
    <section id="elementos">
        <div class="container">
            <div class="about-container">
                <div class="section-header">
                    <h3 class="section-title">Elementos</h3>
                </div>
                <?php foreach($datos as $dato){
                   $stringPrint = "<h4 id='".$dato['nombre']."'>".$dato['nombre']."</h4>  ";
                   $wi = "../imgs/imagenesWinales/" . $dato['nombre'] . ".png";
                   $na = "../imgs/imagenesNahuales/" . $dato['nombre'] . ".jpg";
                   $kin = "../imgs/kines/" . $dato['nombre'] . ".jpg";
                   
                   $numero_energia = numero($dato['nombre']);
                   $energ = "../imgs/numeros/" . $numero_energia . ".jpg";

                   if(file_exists($wi)) {
                    echo "<img src=\"../imgs/imagenesWinales/" . $dato['nombre'] . ".png\" alt='Winal' width='200' height='150' > ";
                   } 
                   if(file_exists($na)){
                    echo "<img src=\"../imgs/imagenesNahuales/" . $dato['nombre'] . ".jpg\" alt='Nahual' width='200' height='150' > ";
                   }
                   if(file_exists($energ)){
                    echo "<img src=\"../imgs/numeros/" . $numero_energia . ".jpg\" alt='Nahual' width='200' height='150' > ";
                   }
                   if(file_exists($kin)){
                    echo "<img src=\"../imgs/kines/" . $dato['nombre'] . ".jpg\" alt='Nahual' width='200' height='150' > ";
                   }
                   
                   $stringPrint.="<h5>Significado</h5> <p>".$dato['significado']."</p>";
                   $stringPrint.="<p>".$dato['htmlCodigo']."</p> <hr>";
                   echo $stringPrint;
                }?>
            </div>

        </div>
    </section>


    <?php include "../blocks/bloquesJs.html" ?>




</body>

</html>