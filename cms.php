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
  <h2>CMS<a href="cms.nuevo.php" class="btn btn-xl btn-info">NUEVO CMS</a></h2>

  <?php $stmt = $con->query("SELECT * FROM cms"); ?>

<table class="table table-striped">
<thead>
  <tr>
    <td>ID</td>
    <td>TITULO</td>
    <td>FECHA</td>
    <td>ACCIONES</td>
  </tr>
</thead>

  <?php while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
      <td><?php echo $fila['id']; ?></td>
      <td><?php echo $fila['nombre']; ?></td>
      <td> <?php echo $fila['fecha']; ?></td>

      <td>
        <div class="btn-group">
        <a href="cms.editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-info">Editar</a>
        <a onclick="eliminarCms(<?php echo $fila['id']; ?>)" class="btn btn-sm btn-danger">Eliminar</a>
        </div>
      </td>
    </tr>
  <?php } ?>

</table>

</section>
<footer class="col-md-12">
<?php include 'includes/footer.php'; ?>
</footer>

<script type="text/javascript">


      //Function para eliminar cms
      function eliminarCms(id){
          if(confirm('Desea borrar este cms?'))
            {
              window.location="cms.elimnar.php?accion=eliminar&id="+id;
            } else {
              //no
            }
      }
</script>

  </body>
</html>
