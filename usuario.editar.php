<?php

   include 'includes/conexion.php';

  if(isset($_POST['accion'])){

      if($_POST['accion'] == 'editar'){
        //Registar Usuario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        $stmt = $con->query("UPDATE usuarios SET nombres = '$nombre', email = '$email', password = md5('$password') WHERE id = $id ");

        //Obtiene cantidad de resultados de la consulta $stmt->rowCount()
        if ($stmt->rowCount()>0) {
           header('Location: usuarios.php');
        }


       }

  }

 ?>
