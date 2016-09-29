<?php
   @session_start();
   include 'includes/conexion.php';
  //print_r($_POST);


  //1. COMPROBAR SI EXISTE EL USUARIO CON LA SENHA
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $stmt = $con->query("SELECT * FROM usuarios WHERE email = '$email' AND password = '$password' ");
  if ($stmt->rowCount() > 0) {
    # existe el usuario
    $_SESSION['logeado'] = 'si';

      while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $_SESSION['usuario'] = $fila['nombres'];
      }

      header('Location: index.php');
  } else {
    //Datos incorrectos
    $_SESSION['mensaje'] = "<p class='alert alert-danger'>Datos incorrectos</p>";
    header('Location: login.php');
  }



 ?>
