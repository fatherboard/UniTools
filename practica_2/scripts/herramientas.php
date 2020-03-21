
                <div>
                 <h1>Herramientas</h1>
                    <p>UniTools pretende ayudar a los estudiantes de la Facultad en las asignaturas de programación.
                    Por ello, incluimos aquí herramientas de uso público y gratuito que pensamos pueden seros de
                    utilidad en el desarrollo de vuestras prácticas.<br><br>
                        <em>!Muchas más herramientas se añadirán en el futuro!</em></p>
                </div>

                <form style="text-align:center">
                       <label for="phone" style="color:green"> (1) Introduzca su texto para darle formato:</label><br><br>
                       <input type="integer" id="valor_d4" name="valor_d4" placeholder="Ejemplo"><br><br>
                       <button type="submit" onclick="texto();" onsubmit="return false">Convertir texto</button>
                        <p></p>
                        <canvas id="myCanvas" style = "width: 300px;height:100px;margin: 0px auto; border: 1px solid red;" style="border:1px solid #000000;">
                        </canvas>
                </form>
                <p></p>

                <form style="text-align: center">
                    <label for="phone" style="color:green"> (2) Introduzca su texto para contar las palabras:</label><br><br>
                    <input type="string" id="valor_d3" name="valor_d3" placeholder="fhritp"><br><br>
                    <button type="submit" onclick="count();" onsubmit="return false">Contar palabras</button>
                </form>
                <p></p>

                <form style="text-align: center">
                    <label for="phone" style="color:green"> (3) Introduzca el decimal a convertir a hexadecimal:</label><br><br>
                    <input type="integer" id="valor_d" name="valor_d" placeholder="123"><br><br>
                    <button type="submit" onclick="convertir(1);" onsubmit="return false">Convertir a hexadecimal</button>
                        <p></p>
                    <label for="phone" style="color:green"> (4) Introduzca el decimal a convertir a binario:</label><br><br>
                    <input type="integer" id="valor_d2" name="valor_d2" placeholder="610"><br><br>
                    <button type="submit" onclick="convertir(2);" onsubmit="return false">Convertir a binario</button>
                </form>
                <p></p>

                <!-- Aquí van algunas herramientas -->
                <script>

                var c = document.getElementById("myCanvas");
                var ctx = c.getContext("2d");
                ctx.font = "30px Arial";
                ctx.strokeText("Ejemplo",30,70);

                function texto(){
                        $str = parseInt(document.getElementById('valor_d').value);
                        ctx.strokeText($str,30,70);
                        alert('Hecho!');
                }

                function convertir(option) {
                        if (option == 1) {
                                $str = parseInt(document.getElementById('valor_d').value);
                        }
                        else if (option == 2) {
                                 $str = parseInt(document.getElementById('valor_d2').value);
                        }

                        if (!Number.isInteger($str)){
                                alert("Sólo puedes usar números.");
                        }
                        else {
                                if (option == 1){
                                        $str = $str.toString(16);
                                }
                                else if (option == 2){
                                        $str = $str.toString(2);
                                        $str = $str.padStart(5, "0");
                                }
                                //document.getElementById("valor_d").innerHTML = $str;
                                // TODO: PQ LO DE ARRIBA NO FUNCIONA? COMO EVITAR QUE LA PAGINA REFRESQUE?
                                alert('Resultado de la conversión = ' + $str);
                        }
                }

                function count() {
                        $str = document.getElementById('valor_d3').value;
                        $str = $str.split(' ').length;
                        alert('Numero de palabras = ' + $str);
                }
                </script>
