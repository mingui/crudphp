<?php
   @session_start();
   if (!isset($_SESSION['logeado'])) {
      header('Location: login.php');
      exit;
  }
?>
<?php
include 'includes/conexion.php';
include 'includes/funciones.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="imagenes/icon.png">
    <title>Panel Admin</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/adminestilo.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>
    <div class="container-fluid text-center">
      <header class="row">
<?php include 'includes/header.php'; ?>

      </header>

    </div>
    <aside class="col-md-2 text-center">
      <?php include 'includes/aside.php'; ?>


    </aside>
<section class="col-md-10">

      <?php

        function sumar($a, $b) {
          $s = $a + $b;
           return $s;
       }

       function multipicar($a, $b){

         $s = $a * $b;
         return $s;

       }

       function resultado($a, $b){
           $s = $a - $b;
           $s = multipicar($s, $a);
           $s = number_format($s, 0, '','.');
           return $s;

       }


       function recorrer_array($valor){
            echo '<h2>QUIENES SOMOS NOSOTROS</h2>';

            echo '<h4 class="alert alert-danger"><i>Audio Power</i>, nace en 2008 en la ciudad de Santa Rita trayendo calidad en el servicio de alquileres de equipos de sonidos e iluminacion para todos los tipos de eventos, se destaco en el sector de fiestas, 15 anos, bodas y presentaciones en vivo.
Se destaco tambien en sonido para grandes eventos que requiere cubrir una gran area de personas, sonido especial para charlas y hoy en dia cuenta con estructura de aluminio que se ajusta a la necesidad de cada evento, luces innovadoras como cabezas moviles y un sonido profesional Array System que lleva a los clientes la calidad necesaria para los eventos.<h4>';

       }





       ?>



  <?php recorrer_array(500); ?>


</section>
<footer class="col-md-12">
<?php include 'includes/footer.php'; ?>
</footer>

<script type="text/javascript">
      $('#nuevo-usuario').click(function(){
        $('#reg-usuario').removeClass('hidden');
      });

      $('#cancelar-registro').click(function(){
        $('#reg-usuario').addClass('hidden');
      });

      //Function para eliminar usuario
      function eliminarUsuario(id){
          if(confirm('Desea borrar este usuario?'))
            {
              window.location="usuario.eliminar.php?accion=eliminar&id="+id;
            } else {
              //no
            }
      }
</script>

  </body>
</html>
