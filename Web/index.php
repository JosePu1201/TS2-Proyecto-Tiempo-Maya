<?php
$conn = include "conexion/conexion.php";

if (isset($_GET['fecha'])) {
    $fecha_consultar = $_GET['fecha'];
} else {
    date_default_timezone_set('US/Central');
    $fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
include 'backend/buscar/conseguir_uinal_nombre.php';
$haab = $simbolo_haab;
$dia_haab = $fecha_haab;
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual; /*. " " . strval($energia);*/
$energia_dia = strval($energia);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tiempo Maya</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php include "blocks/bloquesCss.html"?>
  <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />

    <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />


</head>

<body>

<?php include "NavBar.php"?>
 <div>
 <section id="inicio">
    <div id="inicioContainer" class="inicio-container" >
      <br><br><h1>Bienvenido al Tiempo Maya</h1>
      <table class="table">
        <tr>
          <th></th>
          <th>
            <div id='formulario' style="padding: 15px; width: auto;">
              <label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>
            </div>
          </th>
          <th></th>
        </tr>
        <tbody>
          <!--  calendario haab-->
          <tr>
            <th scope="col">
              <div id='formulario' style="padding: 15px; width: auto;">
                <h4 style="color: whitesmoke;">Calendario Haab</h4>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $dia_haab . ".jpg\" alt='' width='100' height='100'>"; ?>
                      </th>
                      <th scope="col">
                        <?php echo "<a class='nav-link' href='models/paginaModeloElemento.php?elemento=uinal#" . $haab . "'> <img src=\"./imgs//imagenesWinales/" . $haab . ".png\" alt='K' width='100' height='100'> </a>"; ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"> 
                        <?php echo $dia_haab; ?>
                      </th>
                      <td>
                        <?php echo $haab; ?>
                      </td>
                   </tr>
                  </tbody>
                </table>
              </div> <?php /* echo "<li class='nav-item'><a class='nav-link' href='models/paginaModeloElemento.php?elemento=kin#" . $kin['nombre'] . "'>" . $kin['nombre'] . "</a></li>"; */ ?>
            </th>
          <!--  calendario cholquij-->
            <th scope="col">
              <div id='formulario' style="padding: 15px; width: auto;">
                <h4 style="color: whitesmoke;">Calendario Cholquij </h4>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $energia_dia . ".jpg\" alt='' width='100' height='100' >"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<a class='nav-link' href='models/paginaModeloElemento.php?elemento=nahual#" . $cholquij . "'> <img src=\"./imgs//imagenesNahuales/" . $cholquij . ".jpg\" alt='K' width='100' height='100'> </a>"; ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"> 
                        <?php echo $energia_dia; ?>
                      </th>
                      <td>
                        <?php echo $cholquij; ?>
                      </td>
                   </tr>
                  </tbody>
                </table>
              </div>
            </th>

            <!--  cuenta larga -->
            <th scope="col">
              <div id='formulario' style="padding: 15px; width: auto;">
                <h5 style="color: whitesmoke;">Calendario Haab : <?php echo isset($haab) ? $haab : ''; ?></h5>
                <h5 style="color: whitesmoke;">Calendario Cholquij : <?php echo isset($cholquij) ? $energia1 : ''; ?></h5>
                <h5 style="color: whitesmoke;">Cuenta Larga : <?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></h5>
                <label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>
              </div>
            </th>
          </tr>
        </tbody>
      </table>

    </div>
  </section>
 </div>


  <?php include "blocks/bloquesJs1.html"?>

</body>
</html>
