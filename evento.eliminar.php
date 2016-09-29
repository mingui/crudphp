<?php

   include 'includes/conexion.php';

  if(isset($_GET['accion'])){

      if($_GET['accion'] == 'eliminar'){
        //Borrar Usuario
        $id = $_GET['id'];
        $stmt = $con->query("DELETE FROM eventos  WHERE id = $id ");

        //Obtiene cantidad de resultados de la consulta $stmt->rowCount()
        if ($stmt->rowCount()>0) {
           header('Location: eventos.php');
        }


       }

  }

 ?>
