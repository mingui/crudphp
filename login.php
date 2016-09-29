<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>PANEL ADMIN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <style media="screen">
      body{
        background: #531A6B;
      }
    </style>
  </head>
  <body>
    <div class="container">
          <div class="row">
              <div class="col-md-4 col-md-offset-4 well text-center " style="margin-top:100px;">
                <img src="http://audiopower.com.py/imagenes/logo.png" class="img img-circle" width="100" />
                  <h1>Login</h1>
                  <?php echo   $_SESSION['mensaje']; $_SESSION['mensaje']='';  ?>
                  <form class="" action="verificalogin.php" method="post">
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" placeholder="Ingrese su email" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" placeholder="Ingrese su password" required class="form-control">
                      </div>
                      <button type="submit" name="button" class="btn btn-primary btn-lg">Login</button>

                  </form>
              </div>
          </div>
    </div>
</body>
</html>
