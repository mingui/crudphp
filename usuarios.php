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
  <h2>Usuarios<a href="#" id="nuevo-usuario" class="btn btn-xl btn-info">Nuevo Usuario</a></h2>
  <div class="col-md-12" id="abm">

<?php if (isset($_GET['editar'])) { ?>

  <?php
    //hacer consulta sql a la tabla usuarios
        $id = $_GET['id'];
        $stmt2 = $con->query("SELECT * FROM usuarios WHERE id = $id");
   ?>

     <?php while ($fila = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
    <form action="usuario.editar.php" method="post">
        <h2>Editar Usuario</h2>
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $fila['nombres'];  ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $fila['email'];  ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="password">password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $fila['password'];  ?>" required>
        </div>
        <div class="form-group col-md-4">
            <label for="password"><hr></label>
            <input type="hidden" name="accion" value="editar">
            <input type="hidden" name="id" value="<?php echo $fila['id'];  ?>">

            <button type="submit" class="btn btn-info" name="button">Guardar</button>
            <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
    <?php } ?>
<?php } else { ?>

<div class="hidden" id="reg-usuario">
        <form action="usuario.guardar.php" method="post">
          <h2>Registrar Usuario</h2>
          <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
          </div>
          <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="form-group col-md-6">
            <label for="password">password</label>
            <input type="password" class="form-control" name="password" placeholder="password" required>
          </div>
          <div class="form-group col-md-6">
            <input type="hidden"  name="accion" value="guardar">
            <button type="submit" class="btn btn-info" >Guardar</button>
            <button type="button" class="btn btn-danger" id="cancelar-registro">Cancelar</button>
          </div>
        </form>
</div>

    <?php } ?>







  </div>
<table class="table table-striped">
  <tr>
    <td>ID</td>
    <td>NOMBRES</td>
    <td>EMAIL</td>
    <td>Password</td>
    <td>ACCIONES</td>
  </tr>
<?php
  //hacer consulta sql a la tabla usuarios
      $stmt = $con->query("SELECT * FROM usuarios");


 ?>

  <?php while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
      <td><?php echo $fila['id'];  ?></td>
      <td> <?php echo $fila['nombres'];  ?></td>
      <td> <?php echo$fila['email'];  ?></td>
      <td><?php echo $fila['password'];  ?></td>
      <td>
        <div class="btn-group">
        <a href="?editar&id=<?php echo $fila['id'];  ?>" class="btn btn-sm btn-info">Editar</a>
        <a onclick="eliminarUsuario(<?php echo $fila['id'];  ?>)" class="btn btn-sm btn-danger">Eliminar</a>
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
