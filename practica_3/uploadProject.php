<?php

if (!isset($_SESSION)) {
    session_start();
  }
  
  if (isset($_POST['submit'])){
    $file = $_FILES['archivo'];
    $fileName = $_FILES['archivo']['name'];
    $fileTmpName = $_FILES['archivo']['tmp_name'];
    $fileSize = $_FILES['archivo']['size'];
    $fileError = $_FILES['archivo']['error'];
    $fileType = $_FILES['archivo']['type'];

    $fileExt = explode('.', $fileName);
    $fileExtLower = strtolower(end($fileExt));

    $allowed = array('txt', 'cpp', 'html', 'h', 'css', 'js', 'php', 'java', 'c'); // se pueden añadir mas en el futuro

    if (in_array($fileExtLower, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000) {
                $fileNameNew = $titulo  . "." . $fileExt;
                $fileDestination = 'proyectos_almacenados/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                //header("Location: proyectos.php?todoBien");
            }
            else {
                echo "El proyecto es demasiado grande!";
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
?>