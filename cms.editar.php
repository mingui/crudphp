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
  <h2>EDITAR CMS</h2>
<?php $id = $_GET['id']; ?>
<?php $stmt = $con->query('SELECT * FROM cms WHERE id = ' . $id); ?>
<?php while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
  <form class="" action="cms.guardar.php" method="post">
    <div class="form-group col-md-7">
      <label>Titulo</label>
      <input type="text" name="nombre" class="form-control" value="<?php echo $fila['nombre']; ?>">
    </div>

    <div class="form-group col-md-7">
      <label>Imagen</label>
      <input type="text" name="imagen" class="form-control" value="<?php echo $fila['imagen']; ?>">
    </div>


    <div class="form-group col-md-7">
      <label>Contenido</label>
      <textarea name="contenido" class="form-control"><?php echo $fila['contenido'] ?></textarea>
      <input type="hidden" name="accion" value="editar">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>

    <div class="form-group col-md-7">
      <div class="btn-group">
          <a href="cms.php" class="btn btn-danger">Cancelar</a>
          <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </div>


  </form>
<?php } ?>




</section>
<footer class="col-md-12">
<?php include 'includes/footer.php'; ?>
</footer>

  </body>
</html>
