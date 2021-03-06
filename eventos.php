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
  <h2>Eventos<a href="evento.registrar.php" class="btn btn-xl btn-info">NUEVO EVENTO</a></h2>

<table class="table table-striped">

  <tr>
    <td>ID</td>
    <td>TITULO</td>
    <td>Descripcion</td>
    <td>Detalle</td>
    <td>Imagen Portada</td>
    <td>Fecha</td>

    <td>ACCIONES</td>
  </tr>
  <?php
$stmt = $con->query("SELECT * FROM eventos"); ?>

<?php while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {?>

    <tr>
      <td><?php echo $fila['id']; ?></td>
      <td><a href="evento.detalle.php?id=<?php echo $fila['id']; ?>"><?php echo $fila['nombre']; ?></a></td>
      <td><?php echo $fila['description']; ?></td>
      <td><?php echo $fila['detalle']; ?></td>
      <td><img src="../imagenes/eventos/<?php echo $fila['imagen_portada']; ?>" width="60" class="img img-thumbnail" /></td>
      <td><?php echo $fila['fecha']; ?></td>

      <td>
        <div class="btn-group">
        <a href="evento.editar.php?editar&id=<?php echo $fila['id']; ?>" class="btn btn-sm btn-info">Editar</a>
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

<script type="text/javascript">
      $('#nuevo-usuario').click(function(){
        $('#reg-usuario').removeClass('hidden');
      });
      $('#cancelar-registro').click(function(){
        $('#reg-usuario').addClass('hidden');
      });
      //Function para eliminar usuario
      function eliminar(id){
          if(confirm('Desea borrar este evento?'))
            {
              window.location="evento.eliminar.php?accion=eliminar&id="+id;
            } else {
              //no
            }
      }
</script>

  </body>
</html>
