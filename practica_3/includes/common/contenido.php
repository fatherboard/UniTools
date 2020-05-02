<html>
    <head>
       <!--  <link rel="stylesheet" type="text/css" href="./practica_3/css/contenido.css">  
         <link rel="stylesheet" type="text/css" href="./practica_3/css/contenidoanim.css"> -->      
        <style>
            .principal{
                display: flex;
                flex-flow: row;
                align-items: stretch;
            }

            .barraLateralIzq{
                border-style: solid;
                border-color: black;
                border-width: 3px;
                display: flex;
                flex-flow: column;
                justify-content: space-between;
                background-color:grey;
                align-items: center;
                flex-basis: 20%;
            }

            .barraLateralIzq > div{
               
                align-items: center;
                justify-content: center;

            }

            .contenido{
                border-top-style: solid;
                border-bottom-style: solid;
                border-color: black;
                border-width: 3px;
                background-color: whitesmoke;
                flex-basis: 80%;
            }                

            .barraLateralDer{
                border-style: solid;
                border-color: black;
                border-width: 3px;
                display: flex;
                flex-flow: column;
                background-color:blueviolet;
                justify-content: space-between;
                align-items: center;
                flex-basis: 20%;
            }

            .barraLateralDer > div{
                align-items: center;
                justify-content: center;
            }

            .apartado3{
                justify-content: space-around;
                padding: 30px;
            }              
            
            /* animacion */

            body {
            margin:0px;            
            text-align:center;
            }

            #container {
            color:#999;
            text-transform: uppercase;
            font-size:36px;
            font-weight:bold;
            padding-top:200px;  
            position:fixed;
            width:100%;
            bottom:45%;
            display:block;
            }

            #flip {
            height:50px;
            overflow:hidden;
            }

            #flip > div > div {
            color:#fff;
            padding:4px 12px;
            height:45px;
            margin-bottom:45px;
            display:inline-block;
            }

            #flip div:first-child {
            animation: show 5s linear infinite;
            }

            #flip div div {
            background:#42c58a;
            }
            #flip div:first-child div {
            background:#4ec7f3;
            }
            #flip div:last-child div {
            background:#DC143C;
            }

            @keyframes show {
            0% {margin-top:-270px;}
            5% {margin-top:-180px;}
            33% {margin-top:-180px;}
            38% {margin-top:-90px;}
            66% {margin-top:-90px;}
            71% {margin-top:0px;}
            99.99% {margin-top:0px;}
            100% {margin-top:-270px;}
            }          
                   
            </style>


    </head>    

    <body>
      

   <div class="principal">

        <div class="barraLateralIzq">
                <div><p>Titulo Barra Lateral Izq<p></div>
                <div><img src ="img/img_back/open-neon-signage-turned-on-2995188.jpg" alt="sube"width="200"></div>
                <div><img src ="img/img_back/person-using-a-mac-book-pro-4050287.jpg" alt="sube"width="200"></div>
        </div>

        <div class="contenido">
            <div class="apartado1">
                <center>
                    <a href="index.php">
                        <img src="img/UniTools.png" alt="UniTools" width="70">
                    </a>
                </center>
                <h1><strong> UniTools </strong></h1>
            
            </div>

            <div id=container>           
                    <div id=flip>
                        <div><div>Sube</div></div>
                        <div><div>Almacena</div></div>
                        <div><div>Descarga</div></div>
                     </div>
            
                </div>

            <div class="apartado2">
                <h2><em> Tu lugar favorito en la nube </h2>          
               
                    
                
                <h3> Sube - Almacena - Descarga </em></h3> 
                <a href = "registro.php">
                    <h4><i><ins> Únete a nuestra comunidad y disfruta de todas sus ventajas y posibilidades </ins></i></h4>
                </a>
            </div> 

           
            
            <div class="apartado3">
                    <p> 
                        Unitools es una plataforma creada el 24 de Febrero de 2020 por un pequeño grupo de estudiantes. 
                    </p>
                    <p> 
                        La principal función de Unitool es permitirte tanto subir, actualizar y descargar tus archivos personales
                        de tal manera que puedas accceder a ellos desde cualquier sitio y desde todos tus dispositivos.
                    </p>
                    <p> 
                        Gracias a nuestra comunidad, podrás hacer uso de diversas herramientas, iniciar temas de conversación,
                         resolver tus dudas y responder a otros usuarios.
                    </p>  
                    <p> 
                        No te lo pienses más y sumergete en esta increible experencia.
                    </p>
                
            </div>   

            <div class="apartado4">
                <center>
                    <img src ="img/iconosubida.png" alt="sube"width="50">
                    <img src ="img/iconocarpeta.png" alt="guarda"width="50"> 
                    <img src ="img/iconodescarga.png" alt="descarga" width="50">                         
                </center>
            </div>

            <div class="apartado5">
                <p><mark> Actualmente la página se encuentra en construcción. </mark></p>
            </div>

            <div class="apartado6">
                <center>
                   <!-- <img src ="img/facultad.jpg" alt="facu"width="700"> -->
                    <img src ="img/img_back/photo-of-person-holding-mobile-phone-3183153.jpg" alt="sube"width="700">
                    
                </center>
            </div>   

            <div class="apartado7">
                <embed src="music/musicafondo3.mp3" autostarty="true" loop="true" volume="60" width="0" height="0">
            </div>  
            
        </div>       

        <div class="barraLateralDer">
            <div><p>Espacio reservado </br> para anunciantes</p> </div>
            
            <div><p> Si deseas publicitarte en nuestra página, llama al 674904134 </p></div>
        </div>

    </div>
       
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.5/lib/darkmode-js.min.js"></script>
    <script> new Darkmode().showWidget();</script>
    <script src="./practica_3/script/script.js"></script>

</body>

</html>