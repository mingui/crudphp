<?php
   @session_start();
   if (!isset($_SESSION['logeado'])) {
      header('Location: login.php');
      exit;
  }
?>
<?php
include 'includes/conexion.php';
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
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
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
  <h2>Registrar nuevo evento</h2>
  <form class="" action="evento.guardar.php" method="post" enctype="multipart/form-data" >
    <div class="form-group col-md-7">
      <label>Titulo</label>
        <input type="text" name="nombre" class="form-control" value="" required="required" placeholder="Ingrese el titulo del evento">
    </div>
    <div class="form-group col-md-7">
      <label>Fecha evento</label>
        <input type="date" name="fecha" class="form-control" value="" required="required">
    </div>
    <div class="form-group col-md-7">
      <label>Descripcion</label>
        <textarea name="description" class="form-control"></textarea>
        <input type="hidden" name="accion" value="guardar">
    </div>
    <div class="form-group col-md-7">
      <label>Detalle</label>
        <input type="text" name="detalle" class="form-control" value="" required="required" placeholder="Ingrese el detalle del evento">
    </div>
    <div class="form-group col-md-7">
      <label>Imagen Portada</label>
        <input type="file" name="imagen_portada" class="form-control" value="" required="required" placeholder="Haga click para subir una imagen">
    </div>


<div class="form-group col-md-7">
  <div class="btn-group">
    <a href="eventos.php" class="btn btn-danger">Cancelar</a>
    <button type="submit" class="btn btn-success">Guardar</button>

  </div>

</div>

  </form>


</section>
<footer class="col-md-12">
<?php include 'includes/footer.php'; ?>
</footer>

  </body>
</html>
