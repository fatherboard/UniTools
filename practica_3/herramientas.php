<?php
if (!isset($_SESSION)) {
        session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>INDEX</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200;0,500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/icon/unitools16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/icon/unitools32.png" sizes="32x32">

    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/side_OG.css">
    <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
</head>

<body>
 <div class="contenedor">

<?php //class="side_menu"
require("includes/common/navegacion_OG.php");?>

<?php //class="cabecera"
require("includes/common/cabecera_OG.php");?>

<div class="contenido">
  <div class="pag-flex fb-col">
    <div class="box">
        <div class="t1">
          <h1>Herramientas</h1>
        </div>
        <div class="b1">
          <p>UniTools pretende ayudar a los estudiantes de la Facultad en las asignaturas de programación.
          Por ello, incluimos aquí herramientas de uso público y gratuito que pensamos pueden seros de
          utilidad en el desarrollo de vuestras prácticas.<em> !Muchas más herramientas se añadirán en el futuro!</em></p>
        </div>
    </div>

    <ul id="gr-tools">
        <li class="box" id="to1">
          <div class= "t2">
            <h2> Introduzca su palabra para darle formato:</h2>
          </div>
          <div class="b2 fb-col fb-center">
              <p> Pega aquí tu texto para verlo con un nuevo formato! </p> 

              <div class="fb-row fb-center" id="to1_enter">
                <input type="integer" id="valor_d4" name="valor_d4" placeholder="Ejemplo">
                <button type="button" onclick="texto();">Convertir</button>
              </div>
              
              <canvas class="box to1_canvas" id="myCanvas"></canvas>
          </div>
        </li>

        <li class="box" id="to2">
          <div class="t2">
              <h2> Introduzca su texto para contar las palabras:</h2>
          </div>
          <div class="b2">
            <div class="fb-row fb-center">
              <input type="string" id="valor_d3" name="valor_d3" placeholder="fhritp">
              <button type="button" onclick="count();" onsubmit="return false">Contar</button>
            </div>
          </div>
        </li>
        <li class="box" id="to3">
          <div class="t2">
            <h2> Introduzca el decimal a convertir a binario:</h2>
          </div>
          <div class="b2">
            <div class="fb-row fb-center">
              <input type="integer" id="valor_d2" name="valor_d2" placeholder="610">
              <button type="button" onclick="convertir(2);" onsubmit="return false">Convertir</button>
            </div>
          </div>

        <li class="box" id="to4">
          <div class="t2">
            <h2> Introduzca el decimal a convertir a hexadecimal:</h2>
          </div>
          <div class="b2">
            <div class="fb-row fb-center">
              <input type="integer" id="valor_d" name="valor_d" placeholder="123">
              <button type="button" onclick="convertir(1);" onsubmit="return false">Convertir</button>
            </div>
          </div>
        </li>

        

        <li class="box" id="to5">
          <div class="t2">
            <h2> Introduzca el binario a convertir a decimal:</h2>
          </div>

          <div class="b2">
            <div class="fb-row fb-center">
              <input type="integer" id="valor_d12" name="valor_d12" placeholder="10110">
              <button type="button" onclick="convertir(3);" onsubmit="return false">Convertir</button>
            </div>
          </div>
        </li>
      </ul>
  </div>
</div> <!-- Fin del contenedor -->

</body>

<!-- Aquí van algunas herramientas -->
<script>
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.font = "italic small-caps 70px Verdana";
        ctx.strokeText("Ejemplo", 10, 90);

        function texto() {
                $str = document.getElementById('valor_d4').value;
                ctx.clearRect(0, 0, c.width, c.height);
                ctx.fillText($str, 30, 70);

                alert("Palabra cambiada!");
        }

        function convertir(option) {
                if (option == 1) {
                        $str = parseInt(document.getElementById('valor_d').value);
                } else if (option == 2) {
                        $str = parseInt(document.getElementById('valor_d2').value);
                } else if (option == 3) {
                        $str = parseInt(document.getElementById('valor_d12').value, 2);
                }

                if (!Number.isInteger($str)) {
                        alert("Sólo puedes usar números.");
                } else {
                        if (option == 1) {
                                $str = $str.toString(16);
                        } else if (option == 2) {
                                $str = $str.toString(2);
                                $str = $str.padStart(5, "0");
                        } else {
                                $str = $str.toString(10);
                        }

                        alert('Resultado de la conversión = ' + $str);
                }
        }

        function count() {
                $str = document.getElementById('valor_d3').value;
                $str = $str.split(' ').length;
                alert('Numero de palabras = ' + $str);
        }
</script>
