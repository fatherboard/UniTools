        <div>
             <h1>Herramientas</h1>
                <p>UniTools pretende ayudar a los estudiantes de la Facultad en las asignaturas de programación.
                Por ello, incluimos aquí herramientas de uso público y gratuito que pensamos pueden seros de
                utilidad en el desarrollo de vuestras prácticas.<em> !Muchas más herramientas se añadirán en el futuro!</em></p>
        </div>

	<div class="split left">
        <form style="text-align:center">
               <label for="phone" style="color:green"> (1) Introduzca su palabra para darle formato:</label><br><br>
               <input type="integer" id="valor_d4" name="valor_d4" placeholder="Ejemplo"><br><br>
               <button type="button" onclick="texto();">Convertir texto</button>
                <p></p>
                <canvas id="myCanvas" style = "width: 300px;height:100px;margin: 0px auto; border: 1px solid red;" style="border:1px solid #000000;">
                </canvas>
        </form>
        <p></p>

        <form style="text-align: center">
            <label for="phone" style="color:green"> (2) Introduzca su texto para contar las palabras:</label><br><br>
            <input type="string" id="valor_d3" name="valor_d3" placeholder="fhritp"><br><br>
            <button type="button" onclick="count();" onsubmit="return false">Contar palabras</button>
        </form>
	</div>
	<div class = "split right">
        <form style="text-align: center">
            <label for="phone" style="color:green"> (3) Introduzca el decimal a convertir a hexadecimal:</label><br><br>
            <input type="integer" id="valor_d" name="valor_d" placeholder="123"><br><br>
            <button type="button" onclick="convertir(1);" onsubmit="return false">Convertir a hexadecimal</button>
                <p></p>
            <label for="phone" style="color:green"> (4) Introduzca el decimal a convertir a binario:</label><br><br>
            <input type="integer" id="valor_d2" name="valor_d2" placeholder="610"><br><br>
            <button type="button" onclick="convertir(2);" onsubmit="return false">Convertir a binario</button>
		<p></p>
            <label for="phone" style="color:green"> (5) Introduzca el binario a convertir a decimal:</label><br><br>
            <input type="integer" id="valor_d12" name="valor_d12" placeholder="10110"><br><br>
            <button type="button" onclick="convertir(3);" onsubmit="return false">Convertir a decimal</button>
        </form>
	</div>

	<!-- Aquí van algunas herramientas -->
        <script>

        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.font = "italic small-caps 30px Verdana";
        ctx.strokeText("Ejemplo",30,70);

        function texto(){
                $str = document.getElementById('valor_d4').value;
		ctx.clearRect(0,0,c.width,c.height);
		ctx.fillText($str, 30, 70);

		alert("Palabra cambiada!");
	}

        function convertir(option) {
                if (option == 1) {
                        $str = parseInt(document.getElementById('valor_d').value);
                }
                else if (option == 2) {
                         $str = parseInt(document.getElementById('valor_d2').value);
                }
		else if (option == 3){
			$str = parseInt(document.getElementById('valor_d12').value, 2);
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
			else {
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
