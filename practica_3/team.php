<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/hoja.css">
<link rel="stylesheet" type="text/css" href="css/team.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body { 
color: #fff; 
background: #262730 url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/noise-bg.png) repeat 0 0;
}

.social{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}
.social > a{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

    .fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}


</style>


</head>

<body>

<div id="contenedor">

    <?php
    require("includes/common/cabecera.php");
    require("includes/common/navegacion.php");
    ?>

    <div class="wrapper">
        <h1>El Team</h1> </br>
        <div class="team">
            <div class="team_member">
                <div class="team_img">
                    <img src="img/fotosTeam/hugo.png" alt="Team_image">
                </div>
                <h3>Hugo Martins</h3>
                <p class="role">Linux Master</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="img/fotosTeam/cansek.png" alt="Team_image">
            </div>
            <h3>Daniel Canseco</h3>
            <p class="role">Css noobi</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p></div>
            <div class="team_member">
            <div class="team_img">
                <img src="img/fotosTeam/fer.png" alt="Team_image">
            </div>
            <h3>Fernando Ruiz</h3>
            <p class="role">Steve Job's Son</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="img/fotosTeam/cepeda.png" alt="Team_image">
            </div>
            <h3>Luis Cepeda</h3>
            <p class="role">Anonimous singer</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="img/fotosTeam/carlos.png" alt="Team_image">
            </div>
            <h3>Carlos Bilbao</h3>
            <p class="role">Black hat</p>
            <p>"Disfrutando de la creación de esta página web!"</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="img/fotosTeam/bruno.png" alt="Team_image">
            </div>
            <h3>Bruno</h3>
            <p class="role">Your worst nightmare</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
        </div>
    </div>

    <div class="social">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-linkedin"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
    </div>
	

</div>
</body>

</html>
