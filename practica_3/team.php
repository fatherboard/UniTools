<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./practica_3/css/hoja.css">
<link rel="stylesheet" type="text/css" href="css/tea">

<style> 
@import url('https://fonts.googleapis.com/css?family=Allura|Josefin+Sans');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  background: grey;
  font-family: 'Josefin Sans', sans-serif;
}

.wrapper{
  margin-top: 50px;
}

.wrapper h1{
  font-family: 'Allura', cursive;
  font-size: 52px;
  margin-bottom: 60px;
  text-align: center;
}

.team{
  display: flex;
  justify-content: center;
  width: auto;
  text-align: center;
  flex-wrap: wrap;
}

.team .team_member{
  background: #fff;
  margin: 5px;
  margin-bottom: 50px;
  width: 300px;
  padding: 20px;
  line-height: 20px;
  color: #8e8b8b;  
  position: relative;
}

.team .team_member h3{
  color: orangered;
  font-size: 26px;
  margin-top: 50px;
}

.team .team_member p.role{
  color: #ccc;
  margin: 12px 0;
  font-size: 12px;
  text-transform: uppercase;
}

.team .team_member .team_img{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #fff;
}

.team .team_member .team_img img{
  width: 100px;
  height: 100px;
  padding: 5px;
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
        <h1>Nuestro Equipo</h1>
        <div class="team">
            <div class="team_member">
            <div class="team_img">
                <img src="./practica_3/img/fotosTeam/depp.jpg" alt="Team_image">
            </div>
            <h3>Hugo Martins</h3>
            <p class="role">Linux Master</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="./practica_3/img/fotosTeam/momoa.jpg" alt="Team_image">
            </div>
            <h3>Daniel Canseco</h3>
            <p class="role">Css noobi</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p></div>
            <div class="team_member">
            <div class="team_img">
                <img src="./practica_3/img/fotosTeam/jobs.jpg" alt="Team_image">
            </div>
            <h3>Fernando Ruiz</h3>
            <p class="role">Steve Job's Son</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="./practica_3/img/fotosTeam/cepeda.jpg" alt="Team_image">
            </div>
            <h3>Luis Cepeda</h3>
            <p class="role">Anonimous singer</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="./practica_3/img/fotosTeam/wozniak.jpg" alt="Team_image">
            </div>
            <h3>Carlos Bilbao</h3>
            <p class="role">Black hat</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
            <div class="team_member">
            <div class="team_img">
                <img src="./practica_3/img/fotosTeam/bruno.jpg" alt="Team_image">
            </div>
            <h3>Bruno</h3>
            <p class="role">Your worst nightmare</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est quaerat tempora, voluptatum quas facere dolorum aut cumque nihil nulla harum nemo distinctio quam blanditiis dignissimos.</p>
            </div>
        </div>
        </div>
</div>
</body>

</html>