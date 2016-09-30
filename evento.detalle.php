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
      <h2>GALERIA CREAR</h2>
      <?php $id = $_GET['id']; ?>
      <?php  $stmt = $con->query("SELECT * FROM eventos WHERE id = $id"); ?>

      <form class="" action="galeria.guardar.php" method="post" enctype="multipart/form-data">
        <?php while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
          <h1><?php echo $fila['nombre']; ?></h1>
        <div class="form-group">
                  <input type="hidden" name="nombre" value="<?php echo $fila['nombre']; ?>" class="form-control" >
        </div>

        <div class="form-group">

            <input type="hidden" name="evento_id" value="<?php echo $fila['id']; ?>" class="form-control" >
        </div>

        <div class="form-group">
            <label for="">Imagen</label>
            <input type="file" name="imagen" class="form-control" value="" required="required" placeholder="Haga click para subir una imagen">

        </div>
        <input type="hidden" name="accion" value="guardar">

        <button type="submit" class="btn btn-success">Guardar</button>
      <?php } ?>
      </form>

      <hr>

      <div class="row">
          <?php  $stmt = $con->query("SELECT * FROM fotos WHERE evento_id = $id"); ?>
          <?php while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
              <div class="col-md-2 text-center">
                  <img src="../imagenes/fotos/<?php echo $fila['imagen'] ?>" class="img img-responsive img-thumbnail" />
                  <br>
                  <span class="badge">Vistas: <?php echo $fila['vistas'] ?> / <a href="#">Eliminar</a></span>
              </div>
          <?php } ?>
      </div>




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
