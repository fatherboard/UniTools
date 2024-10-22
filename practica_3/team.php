<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
        <title>EL EQUIPO</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="img/icon/unitools16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/icon/unitools32.png" sizes="32x32">


    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/side_OG.css">
    <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
    
   
    <link rel="stylesheet" type="text/css" href="css/social.css">

</head>

<body>
 <div class="contenedor">

<?php //class="side_menu"
require("includes/common/navegacion_OG.php");?>

<?php //class="cabecera"
require("includes/common/cabecera_OG.php");?>

<div class="contenido">
   
    <div class="box">
         <div class="fb-col box" id="team_titulo">
		    <div class="t1 fb-row" >
			    <h1>Nuestro equipo  </h1>
            </div>
        <div class="b1">
            <p>Aquí encontrarás información sobre nuestros miembros y compenentes.</p>
        </div>

        
        <div class="fb-row jc_space-around" id="team">
            <div class="team_member">
                <div class="team_img">
                    <img src="img/fotosTeam/hugo.png" alt="Team_image">
                </div>
                <h3>Hugo Martins</h3>
                <p class="role">El Portugués</p>
                <p>Me encanta la programación web y la seguridad informática. ¡Los shibas y los móviles son mi pasión!</p>
            </div>
            <div class="team_member">
                 <div class="team_img">
                    <img src="img/fotosTeam/dani.png" alt="Team_image">
                 </div>
                 <h3>Daniel Canseco</h3>
                 <p class="role">Css master</p>
                 <p>Aprendiendo de los errores. Nunca te rindas, como siempre me decía mi abuelita gallega.</p></div>
            <div class="team_member">
                 <div class="team_img">
                     <img src="img/fotosTeam/fer.png" alt="Team_image">
                    </div>
                 <h3>Fernando Ruiz</h3>
                <p class="role">Experto en AW</p>
                <p>Pienso que PHP es un lenguaje bellisimo, y nunca me canso de ir mejorandor y aprendiendo.</p>
            </div>
            <div class="team_member">
                 <div class="team_img">
                      <img src="img/fotosTeam/cepeda.png" alt="Team_image">
                 </div>
                <h3>Luis Cepeda</h3>
                <p class="role">Joven Promesa</p>
                <p> "Uso el CSS como un estilo, de vida" Futuro ingeniero informático, no me pagan lo suficiente... bueno, no me pagan. </p>
            </div>
            <div class="team_member">
                <div class="team_img">
                    <img src="img/fotosTeam/carlos.png" alt="Team_image">
                </div>
                <h3>Carlos Bilbao</h3>
                <p class="role">Black hat y Grid Senior</p>
                <p>"¡Disfrutando de la creación de esta página web! Tenemos muchas ideas para futuras versiones"</p>
            </div>
            <div class="team_member">
                <div class="team_img">
                    <img src="img/fotosTeam/bruno.png" alt="Team_image">
                </div>
                <h3>Bruno</h3>
                <p class="role">Ingeniero del Software </p>
                <p>Experto en Bases de Datos y muy entusiasmado con este proyecto para la asignatura de AW.</p>
            </div>
        </div>
        
    
    </div>

    <div class="social">
        <a href="https://www.facebook.com" class="fa fa-facebook"></a>
        <a href="https://twitter.com" class="fa fa-twitter"></a>
        <a href="https://www.google.es" class="fa fa-google"></a>
        <a href="https://es.linkedin.com" class="fa fa-linkedin"></a>
        <a href="https://www.youtube.com/user" class="fa fa-youtube"></a>
        <a href="https://www.instagram.com" class="fa fa-instagram"></a>
    </div>
	
    </div>

</div>

</body>

</html>
