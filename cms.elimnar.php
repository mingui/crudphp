<?php
//INCLUIR UN ARCHIVO DE CONEXION
include 'includes/conexion.php';

    if(isset($_GET['accion']) & $_GET['accion'] == 'eliminar' ) {
      //ELIMINAMOS EL REGISTRO

      $codigo = $_GET['id'];
      $stmt = $con->query('DELETE FROM cms WHERE id = ' . $codigo);

      if($stmt->rowCount()>0){
        header('Location:  cms.php');

      }
    }




 ?>
