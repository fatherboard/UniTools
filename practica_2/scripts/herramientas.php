
                <div>
                 <h1>Herramientas</h1>
                    <p>UniTools pretende ayudar a los estudiantes de la Facultad en las asignaturas de programación.
                    Por ello, incluimos aquí herramientas de uso público y gratuito que pensamos pueden seros de
                    utilidad en el desarrollo de vuestras prácticas.<br><br>       
                        <em>!Muchas más herramientas se añadirán en el futuro!</em></p>                                                                                     
                </div>

                <form style="text-align: center">
                    <label for="phone" style="color:green"> (1) Introduzca el decimal a convertir a hexadecimal:</label><br><br>
                    <input type="integer" id="valor_d" name="valor_d" placeholder="123"><br><br>
                    <button type="submit" onclick="convertir(1);" onsubmit="return false">Convertir a hexadecimal</button>
                </form>
                <p></p>
                <form style="text-align: center">
                    <label for="phone" style="color:green"> (2) Introduzca el decimal a convertir a binario:</label><br><br>
                    <input type="integer" id="valor_d2" name="valor_d2" placeholder="610"><br><br>
                    <button type="submit" onclick="convertir(2);" onsubmit="return false">Convertir a binario</button>
                </form>
                <form style="text-align: center">
                    <label for="phone" style="color:green"> (3) Introduzca su texto para contar las palabras:</label><br><br>
                    <input type="string" id="valor_d3" name="valor_d3" placeholder="fhritp"><br><br>
                    <button type="submit" onclick="count();" onsubmit="return false">Contar palabras</button>
                </form>


                <!-- Aquí van algunas herramientas -->
                <script>

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
