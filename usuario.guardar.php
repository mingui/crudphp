<?php

   include 'includes/conexion.php';

  if(isset($_POST['accion'])){

      if($_POST['accion'] == 'guardar'){
        //Registar Usuario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = $con->query("INSERT INTO usuarios (nombres, email, password)
                            VALUES ('$nombre', '$email', MD5('$password') )");

        //Obtiene cantidad de resultados de la consulta $stmt->rowCount()
        if ($stmt->rowCount()>0) {
           header('Location: usuarios.php');
        }


       }

  }

 ?>
