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

    $allowed = array('txt', 'cpp', 'html', 'h', 'css', 'js', 'php', 'java', 'c'); // se pueden añadir mas en el futuro

    if (in_array($fileExtLower, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 1000000) {
                $fileDestination = 'proyectos/' . $_SESSION['project'] . '/' . $fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: project.php?id=" . $_SESSION['project'] . "&subidoConExito");
            }
            else {
                echo "El archivo es demasiado grande!";
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