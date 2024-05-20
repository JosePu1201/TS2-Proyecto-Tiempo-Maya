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
include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$baktun = $fecha_baktun;
$katun = $fecha_katun;
$tun = $fecha_tun;
$uinal_day = $fecha_uinal;
$kin_day = $fecha_kin;
$cholquij = $nahual;
$energia_dia = strval($energia);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title id="page-title">Tiempo Maya</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php include "blocks/bloquesCss.html"?>
  <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
  <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />
  <style>
    #inicio {
      width: 100%;
      height: 100vh;
      background: url(img/<?php echo $backgroundImage; ?>) top center;
      background-size: cover;
      position: relative;
    }


  </style>
</head>
<body>

<?php include "NavBar.php"?>
<div>
  <section id="inicio">
    <div id="inicioContainer" class="inicio-container">
      <br><br><br><br><br><br>
      <h1 id="welcome-message">Bienvenido al Tiempo Maya</h1>
      <table class="">
        <tbody>
        <tr>
          <th></th>
          <th>
            <div id='formulario' style="padding: 4px; width: auto;">
              <label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>
            </div>
          </th>
          <th></th>
        </tr>
          <!--  calendario haab-->
          <tr>
            <th >
              <div id='formulario' style="padding: 15px; width: auto;">
                <h4 id="haab-calendar" style="color: whitesmoke;">Calendario Haab</h4>
                <table>
                  <thead>
                    <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $dia_haab . ".jpg\" alt='' width='120' height='100'>"; ?>
                      </th>
                      <th scope="col">
                        <?php echo "<a class='nav-link' href='models/paginaModeloElemento.php?elemento=uinal#" . $haab . "'> <img src=\"./imgs//imagenesWinales/" . $haab . ".png\" alt='K' width='120' height='100'> </a>"; ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"> 
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $dia_haab . "</label>";  ?>
                      </th>
                      <td>
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $haab . "</label>";  ?>
                      </td>
                   </tr>
                  </tbody>
                </table>
              </div>
            </th>
          <!--  calendario cholquij-->
            <th scope="col">
              <div id='formulario' style="padding: 15px; width: auto;">
                <h4 id="cholquij-calendar" style="color: whitesmoke;">Calendario Cholquij </h4>
                <table>
                  <thead>
                    <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $energia_dia . ".jpg\" alt='' width='120' height='100' >"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<a class='nav-link' href='models/paginaModeloElemento.php?elemento=nahual#" . $cholquij . "'> <img src=\"./imgs//imagenesNahuales/" . $cholquij . ".jpg\" alt='K' width='120' height='100'> </a>"; ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"> 
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $energia_dia . "</label>"; ?>
                      </th>
                      <td>
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $cholquij . "</label>"; ?>
                      </td>
                   </tr>
                  </tbody>
                </table>
              </div>
            </th>
            <!--  cuenta larga -->
            <th scope="col">
              <div id='formulario' style="padding: 15px; width: auto;">
                <h4 id="long-count" style="color: whitesmoke;">Cuenta Larga </h4>
                <table>
                    <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $baktun . ".jpg\" alt='' width='50' height='40' >"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<img src=\"./imgs//cuenta_larga/baktun.jpg\" alt='K' width='50' height='40'>"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $baktun . "</label>"; ?>
                      </th>
                      <td>
                        <?php echo "<label style=\"color: whitesmoke;\" id='baktun-label'> Baktún</label>"; ?>
                      </td>
                    </tr>
                    <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $katun . ".jpg\" alt='' width='50' height='40' >"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<img src=\"./imgs//cuenta_larga/katun.jpg\" alt='K' width='50' height='40'>"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $katun . "</label>"; ?>
                      </th>
                      <td>
                        <?php echo "<label style=\"color: whitesmoke;\" id='katun-label'> Katún</label>"; ?>
                      </td>
                   </tr>
                   <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $tun . ".jpg\" alt='' width='50' height='40' >"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<img src=\"./imgs//cuenta_larga/tun.jpg\" alt='K' width='50' height='40'>"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $tun . "</label>"; ?>
                      </th>
                      <td>
                        <?php echo "<label style=\"color: whitesmoke;\" id='tun-label'> Tun</label>"; ?>
                      </th>
                   </tr>
                   <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $uinal_day . ".jpg\" alt='' width='50' height='40' >"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<img src=\"./imgs//cuenta_larga/uinal.jpg\" alt='K' width='50' height='40'>"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $uinal_day . "</label>"; ?>
                      </th>
                      <td>
                        <?php echo "<label style=\"color: whitesmoke;\" id='uinal-label'> Uinal</label>"; ?>
                      </td>
                   </tr>
                   <tr>
                      <th scope="col">
                        <?php echo "<img src=\"./imgs//numeros/" . $kin_day . ".jpg\" alt='' width='50' height='40' >"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<img src=\"./imgs//cuenta_larga/kin.jpg\" alt='K' width='50' height='40'>"; ?>
                      </th>
                      <th scope="col"> 
                        <?php echo "<label style=\"color: whitesmoke;\"> " . $kin_day . "</label>"; ?>
                      </th>
                      <td>
                        <?php echo "<label style=\"color: whitesmoke;\" id='kin-label'> Kin </label>"; ?>
                      </th>
                   </tr>
                </table>
              </div>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>

<?php include "blocks/bloquesJs1.html"?>

<script>
// Función para actualizar la imagen de fondo según la hora actual
function updateBackgroundImage() {
  const hour = new Date().getHours(); // Obtiene la hora actual
  let backgroundImage = '';

  if (hour >= 5 && hour < 7) {
    backgroundImage = 'img/Amanecer.jpg'; // Mañana
  } else if (hour >= 7 && hour < 11) {
    backgroundImage = 'img/manana.jpg'; // Tarde
  } else if (hour >= 11 && hour < 14) {
    backgroundImage = 'img/mediodia.jpg';} // Atardecer
    else if (hour >= 14 && hour < 17) {
    backgroundImage = 'img/tarde.jpg';
  } 
  else if (hour >= 17 && hour < 19) {
    backgroundImage = 'img/atardecer.jpg';
  }else {
    backgroundImage = 'img/noche.jpg'; // Noche
  }

  document.getElementById('inicio').style.backgroundImage = `url(${backgroundImage})`;
}

// Actualiza la imagen de fondo al cargar la página
updateBackgroundImage();

// Configura un intervalo para actualizar la imagen de fondo cada hora
setInterval(updateBackgroundImage, 3600000); // 3600000 ms = 1 hora



// Establecer idioma por defecto
setLanguage('es');
</script>
</body>
</html>
