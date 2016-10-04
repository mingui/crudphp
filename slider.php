<?php @session_start();

if (!isset($_SESSION['logeado'])) {
  header('location: login.php');
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
<script src="https://use.fontawesome.com/0872956d13.js"></script>
<link rel="stylesheet" href="css/adminestilo.css" type="text/css">
  </head>
  <body>
    <div class="container-fluid">
      <header class="row">
<?php include 'includes/header.php'; ?>

      </header>

    </div>
    <aside class="col-md-2">
      <?php include 'includes/aside.php'; ?>


    </aside>
    <section class="col-md-10">
      <h2>Slider<a href="slider.registrar.php" class="btn btn-xl btn-info">Nuevo Slider</a></h2>

      <table class="table table-striped">
        <tr>
        <td>ID</td>
        <td>Titulo</td>
        <td>Imagen</td>
        <td>Url</td>
        <td>Activo</td>
        </tr>
        <?php
      $stmt = $con->query("SELECT * FROM slider"); ?>

      <?php while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <tr>
          <td><?php echo $fila['id']; ?></td>
          <td><?php echo $fila['titulo']; ?></td>
          <td><img src="../imagenes/eventos/<?php echo $fila['imagen']; ?>" width="60" class="img img-thumbnail" alt="" /></td>
          <td><?php echo $fila['url']; ?></td>
          <td><?php echo $fila['activo']; ?></td>

          <td>
            <div class="btn-group">
            <a href="slider.editar.php?editar&id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-info">Editar</a>
            <a onclick="eliminar(<?php echo $fila['id']; ?>)" class="btn btn-sm btn-danger">Eliminar</a>
            </div>
          </td>
        </tr>
      <?php } ?>

      </table>

    </section>

<footer class="col-md-12">
<?php include 'includes/footer.php'; ?>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>




  </body>
</html>
