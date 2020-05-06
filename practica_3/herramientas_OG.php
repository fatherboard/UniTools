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

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">

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
  <div class="pag-flex tools">
    <div class="fc fc-col">
      <div class="box">
          <div class="t1">
            <h2>Herramientas</h2>
          </div>
          <div class="b1">
            <p>UniTools pretende ayudar a los estudiantes de la Facultad en las asignaturas de programación.
            Por ello, incluimos aquí herramientas de uso público y gratuito que pensamos pueden seros de
            utilidad en el desarrollo de vuestras prácticas.<em> !Muchas más herramientas se añadirán en el futuro!</em></p>
          </div>
      </div>

      <ul class="fc fc-row">
          <li class="box">
            <div class= "t2">
              <label for="phone" style="color:green"> (1) Introduzca su palabra para darle formato:</label>
            </div>
            <div class="b2">
              <input type="integer" id="valor_d4" name="valor_d4" placeholder="Ejemplo">
              <button type="button" onclick="texto();">Convertir texto</button>
              <canvas id="myCanvas" style="width: 300px;height:100px;margin: 0px auto; border: 1px solid red;" style="border:1px solid #000000;">
              </canvas>
            </div>
          </li>

          <li class="box">
            <div class= "t2">
              <label for="phone" style="color:green"> (2) Introduzca su texto para contar las palabras:</label>
            </div>
            <div class="b2">
              <input type="string" id="valor_d3" name="valor_d3" placeholder="fhritp">
              <button type="button" onclick="count();" onsubmit="return false">Contar palabras</button>
            </div>
          </li>

          <li class="box">
            <div class= "t2">
            <label for="phone" style="color:green"> (3) Introduzca el decimal a convertir a hexadecimal:</label>
            </div>
            <div class="b2">
            <input type="integer" id="valor_d" name="valor_d" placeholder="123"><br><br>
            <button type="button" onclick="convertir(1);" onsubmit="return false">Convertir a hexadecimal</button>
            </div>
          </li>

          <li class="box">
            <div class= "t2">
            <label for="phone" style="color:green"> (4) Introduzca el decimal a convertir a binario:</label>
            </div>
            <div class="b2">
            <input type="integer" id="valor_d2" name="valor_d2" placeholder="610"><br><br>
            <button type="button" onclick="convertir(2);" onsubmit="return false">Convertir a binario</button>
            </div>
          <li class="box">
            <div class= "t2">
              <label for="phone" style="color:green"> (5) Introduzca el binario a convertir a decimal:</label>
            </div>

            <div class="b2">
            <input type="integer" id="valor_d12" name="valor_d12" placeholder="10110"><br><br>
            <button type="button" onclick="convertir(3);" onsubmit="return false">Convertir a decimal</button>
            </div>
          </li>
      </ul>
    </div>
  </div>
</div> <!-- Fin del contenedor -->

</body>

<!-- Aquí van algunas herramientas -->
<script>
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.font = "italic small-caps 30px Verdana";
        ctx.strokeText("Ejemplo", 30, 70);

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
