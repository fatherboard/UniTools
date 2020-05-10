<?php

if (!isset($_SESSION)) {
    session_start();
  }
  
if (isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtLower = strtolower(end($fileExt));

    $allowed = array('png', 'jpg', 'jpeg');

    if (in_array($fileExtLower, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000) {
                $fileNameNew = $_SESSION['username']  . "." . "jpg";
                $fileDestination = 'img/fotosPerfil/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: perfil.php?subidoConExito");
            }
            else {
                echo "La foto es demasiado grande!";
            }
        }
        else {
            echo "Se ha producido un error con la subida!";
        }
    }
    else {
        echo "Tipo de archivo no permitido!";
    }
}