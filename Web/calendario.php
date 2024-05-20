<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Dinámico</title>
    <link rel="stylesheet" href="estiloC.css">
    <?php include "blocks/bloquesCss.html"; ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo (rand()); ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #inicio {
            width: 100%;
            height: 100vh;
            background: url(img/<?php echo $backgroundImage; ?>) top center;
            background-size: cover;
            position: relative;
        }

        .calendar {
            max-width: 1300px; /* Ajustar el ancho máximo de la tabla */
            margin: 20px auto;
            border: 1px solid #050505;
            border-radius: 5px;
            overflow: hidden;
            font-size: 11px; /* Reducir el tamaño de la fuente */
        }

        .month {
            background-color: #042e5c;
            color: #ffffff; /* Cambiar el color de la letra */
            text-align: center;
            padding: 5px 0; /* Reducir el padding */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .month h2 {
            margin: 0;
            font-size: 18px; /* Ajustar el tamaño de la fuente del título */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            width: 14.28%; /* Ajustar el ancho de las celdas */
            border: 1px solid #070707;
            text-align: center;
            padding: 2px; /* Reducir el padding */
            vertical-align: top; /* Alinear contenido en la parte superior */
            color: #0a0a0a; /* Cambiar el color de la letra */
            background-color: rgba(173, 216, 230, 0.5); /* Fondo transparente con toque celeste */
            font-weight: bold; /* Letra negrita */
            font-style: italic; /* Letra cursiva */
        }

        .other-month {
            color: #ccc;
        }

        img {
            width: 20px; /* Ajustar el ancho de la imagen */
            height: auto; /* Mantener la proporción de la imagen */
        }

        .year-calendar {
            display: none; /* Mantener oculto hasta la descarga */
        }

        .month-container {
            margin: 10px;
            page-break-after: always; /* Añadir salto de página después de cada mes */
        }
    </style>
</head>
<body>
    <section id="inicio">
        <?php include "NavBar.php"; ?>
        <br><br><br><br>

        <div class="calendar" id="calendar">
            <div class="month">
                <button id="prev-month">&lt;</button>
                <h2 id="month-year"></h2>
                <button id="next-month">&gt;</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Domingo</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                    </tr>
                </thead>
                <tbody id="days-container">
                    <?php
                    function generateCalendar($month, $year) {
                        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
                        $numDaysInMonth = date("t", $firstDayOfMonth);
                        $startDayOfWeek = date("w", $firstDayOfMonth);

                        // Días del mes anterior
                        $prevMonthLastDay = date("t", mktime(0, 0, 0, $month - 1, 1, $year));
                        $dayCounter = 1 - $startDayOfWeek;

                        // Generar filas del calendario
                        for ($week = 0; $week < 6; $week++) {
                            echo "<tr>";
                            for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
                                if ($dayCounter < 1) {
                                    // Días del mes anterior
                                    $dayNumber = $prevMonthLastDay + $dayCounter;
                                    echo '<td class="other-month">' . $dayNumber . '</td>';
                                } elseif ($dayCounter > $numDaysInMonth) {
                                    // Días del mes siguiente
                                    $dayNumber = $dayCounter - $numDaysInMonth;
                                    echo '<td class="other-month">' . $dayNumber . '</td>';
                                } else {
                                    session_start();
                                    $fecha_consultar = date("Y-m-d", mktime(0, 0, 0, $month, $dayCounter, $year));
                                    $conn = include "conexion/conexion.php";
                                    $nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
                                    $energia = include 'backend/buscar/conseguir_energia_numero.php';
                                    $haab = include 'backend/buscar/conseguir_uinal_nombre.php';
                                    $cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
                                    $cholquij = $nahual . " " . strval($energia);
                                    // Días del mes actual
                                    echo '<td>';
                                    echo '<img src="' . getImageURL($dayCounter) . '" alt="imagen"><br>';
                                    echo $dayCounter . '<br>';
                                    echo 'Haab: ' . $haab . '<br>';
                                    echo 'Cholquij: ' . $cholquij . '<br>';
                                    echo 'Cuenta Larga: ' . $cuenta_larga;
                                    echo '</td>';
                                }
                                $dayCounter++;
                            }
                            echo "</tr>";
                        }
                    }

                    function getImageURL($dayNumber) {
                        // Definir las URLs de las imágenes según el número del día
                        $imageURLs = [
                            1 => "NumeroMayas/1.jpg",
                            2 => "NumeroMayas/2.jpg",
                            3 => "NumeroMayas/3.jpg",
                            4 => "NumeroMayas/4.jpg",
                            5 => "NumeroMayas/5.jpg",
                            6 => "NumeroMayas/6.jpg",
                            7 => "NumeroMayas/7.jpg",
                            8 => "NumeroMayas/8.jpg",
                            9 => "NumeroMayas/9.jpg",
                            10 => "NumeroMayas/10.jpg",
                            11 => "NumeroMayas/11.jpg",
                            12 => "NumeroMayas/12.jpg",
                            13 => "NumeroMayas/13.jpg",
                            14 => "NumeroMayas/14.jpg",
                            15 => "NumeroMayas/15.jpg",
                            16 => "NumeroMayas/16.jpg",
                            17 => "NumeroMayas/17.jpg",
                            18 => "NumeroMayas/18.jpg",
                            19 => "NumeroMayas/19.jpg",
                            20 => "NumeroMayas/20.jpg",
                            21 => "NumeroMayas/21.jpg",
                            22 => "NumeroMayas/22.jpg",
                            23 => "NumeroMayas/23.jpg",
                            24 => "NumeroMayas/24.jpg",
                            25 => "NumeroMayas/25.jpg",
                            26 => "NumeroMayas/26.jpg",
                            27 => "NumeroMayas/27.jpg",
                            28 => "NumeroMayas/28.jpg",
                            29 => "NumeroMayas/29.jpg",
                            30 => "NumeroMayas/30.jpg",
                            31 => "NumeroMayas/31.jpg"
                        ];

                        return $imageURLs[$dayNumber] ?? "";
                    }

                    // Obtener el mes y año actuales o pasados por URL
                    if (isset($_GET['month']) && isset($_GET['year'])) {
                        $month = intval($_GET['month']);
                        $year = intval($_GET['year']);
                    } else {
                        $month = date("n");
                        $year = date("Y");
                    }

                    // Array de nombres de los meses en español
                    $months_es = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                    $monthName = $months_es[$month - 1];

                    echo "<script>document.getElementById('month-year').textContent = '$monthName $year';</script>";
                    generateCalendar($month, $year);
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Contenedor oculto para el calendario completo del año -->
        <div class="year-calendar" id="year-calendar">
            <?php
            function generateFullYearCalendar($year) {
                for ($month = 1; $month <= 12; $month++) {
                    $timestamp = mktime(0, 0, 0, $month, 1, $year);
                    $dateFormatted = strftime("%B %Y", $timestamp);

                    // Convertir a mayúsculas
                    $dateFormattedUpper = mb_strtoupper($dateFormatted, 'UTF-8');
                    echo '<div class="month-container">';
                    echo '<div class="calendar">';
                    echo '<div class="month">';
                    echo '<h2>' . $dateFormattedUpper . '</h2>';

                    echo '</div>';
                    echo '<table>';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Domingo</th>';
                    echo '<th>Lunes</th>';
                    echo '<th>Martes</th>';
                    echo '<th>Miércoles</th>';
                    echo '<th>Jueves</th>';
                    echo '<th>Viernes</th>';
                    echo '<th>Sábado</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    generateCalendar($month, $year);
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            generateFullYearCalendar($year);
            ?>
        </div>

        <!-- Botón para descargar la imagen -->
        <button id="download-btn">Descargar Calendario</button>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentMonth = <?php echo $month; ?>;
        var currentYear = <?php echo $year; ?>;

        document.getElementById("prev-month").addEventListener("click", function() {
            changeMonth(-1);
        });

        document.getElementById("next-month").addEventListener("click", function() {
            changeMonth(1);
        });

        function changeMonth(delta) {
            currentMonth += delta;
            if (currentMonth < 1) {
                currentMonth = 12;
                currentYear--;
            } else if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
            window.location.href = `calendario.php?month=${currentMonth}&year=${currentYear}`;
        }

        function updateBackgroundImage() {
            const hour = new Date().getHours(); // Obtiene la hora actual
            let backgroundImage = '';

            if (hour >= 5 && hour < 7) {
                backgroundImage = 'img/Amanecer.jpg'; // Mañana
            } else if (hour >= 7 && hour < 11) {
                backgroundImage = 'img/manana.jpg'; // Tarde
            } else if (hour >= 11 && hour < 14) {
                backgroundImage = 'img/mediodia.jpg'; // Mediodía
            } else if (hour >= 14 && hour < 17) {
                backgroundImage = 'img/tarde.jpg'; // Tarde
            } else if (hour >= 17 && hour < 19) {
                backgroundImage = 'img/atardecer.jpg'; // Atardecer
            } else {
                backgroundImage = 'img/noche.jpg'; // Noche
            }

            document.getElementById('inicio').style.backgroundImage = `url(${backgroundImage})`;
        }

        // Actualiza la imagen de fondo al cargar la página
        updateBackgroundImage();

        // Configura un intervalo para actualizar la imagen de fondo cada hora
        setInterval(updateBackgroundImage, 3600000); // 3600000 ms = 1 hora

        document.getElementById("download-btn").addEventListener("click", function() {
            // Mostrar el contenedor de año antes de la captura
            document.getElementById("year-calendar").style.display = "block";
            // Usar html2canvas para capturar el contenedor
            html2canvas(document.getElementById("year-calendar"), {
                onrendered: function(canvas) {
                    var link = document.createElement("a");
                    document.body.appendChild(link);
                    link.download = "calendario_completo.jpg";
                    link.href = canvas.toDataURL("image/jpeg");
                    link.target = '_blank';
                    link.click();
                    // Ocultar el contenedor de nuevo después de la captura
                    document.getElementById("year-calendar").style.display = "none";
                }
            });
        });
    });
    </script>
    <?php include "blocks/bloquesJs1.html"; ?>
</body>
</html>
