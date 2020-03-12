
<!DOCTYPE html>
<html lang="es">
    
    <head>
        <link rel="stylesheet" type="text/css" href="../css/hoja.css" />
        <meta charset="utf-8">
        <title>Herramientas</title>
    </head>

    <body>

        <!-- Principio de la estructura de la página (contenedor) -->
        <div id="contenedor">
            
            <?php 
                require("../estructura/cabecera.php");
                require("../estructura/menu.php");
            ?>

            <!-- Principio del contenido/ funcionalidad de herramientas -->
            <div id="contenido">
                <div>
                    <h1>Herramientas</h1>
                    <p>UniTools pretende ayudar a los estudiantes de la Facultad en las asignaturas de programación.
                    Por ello, incluimos aquí herramientas de uso público y gratuito que pensamos pueden seros de 
                    utilidad en el desarrollo de vuestras prácticas.<br><br>
                        <em>!Muchas más herramientas se añadirán en el futuro!</em></p>
                </div>

                <form>
                    <label for="phone">Introduzca el decimal a convertir a hexadecimal:</label><br><br>
                    <input type="integer" id="valor_d" name="valor_d" placeholder="123"><br><br>
                    <button type="submit" onclick="convertir_hex()">Convertir</button>
                </form>

                <div class="footer">
                    <p>UniTools 2020 - Aplicaciones Web - Grupo B</p>
                </div>

                <?php
                /*
                //Arreglar, da errorers en los comandos a partir de la linea 50
                // Aquí van algunas herramientas -->

                function convertir_hex() {
                        $return = '';
                        $str = document.getElementbyId('valor_d').value;

                        if (!is_numeric($str)){
                                echo 'alert("Sólo puedes usar números.")'; 
                        }

                        for($i = 0; $i < strlen($str); $i++) {
                                $return .= '&#x'.bin2hex(substr($str, $i, 1)).';';
                        }
                   return $return;
                }

                function ordenar_lista($str){
                        $words = array($str);

                        $tam = count($words);
                        for($x = 0; $x < $tam; $x++) {
                                   echo $words[$x];
                                   echo "<br>";
                        }
                }      
                */ 
                ?>
            </div> <!-- Fin del contenido -->

            <?php 
                include("../estructura/pie.php");
            ?>
        </div> <!-- Fin del contenedor -->

    </body> 
</html>
