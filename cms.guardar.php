<?php
    //INCLUIR UN ARCHIVO DE CONEXION
    include 'includes/conexion.php';

    //VALIDAR SI EXISTE EL ENVIO DEL POST

    if(isset($_POST['accion'])) {
      //EMPEZAR A VALIDAR EL CONTENIDO DEL POST

      //GUARDAMOS TODOS LOS POST DENTRO DE VARIABLES
      $nombre = $_POST['nombre'];
      $imagen = $_POST['imagen'];
      $contenido = $_POST['contenido'];

      if($_POST['accion'] == 'guardar') {
        //GUARDAMOS EL REGISTRO

      //CREAMOS UN STATEMENT PARA ALMACENAR LOS DATOS
        $stmt = $con->query("INSERT INTO cms (nombre, contenido, fecha, imagen) VALUES ('$nombre', '$contenido', NOW(), '$imagen')");

        //COMPROBAMOS SI SE REGISTRO LOS datos
          if($stmt->rowCount() > 0 ) {
            //SI SE REGISTRO LOS DATOS
            header('Location: cms.php');
          }

      }


     //ACTUALIZAR CMS

     if($_POST['accion'] == 'editar') {
        $id =  $_POST['id'];
       //CREAMOS UN STATEMENT PARA ACTUALIZAR LOS DATOS
         $stmt = $con->query("UPDATE cms SET nombre = '$nombre', contenido = '$contenido', fecha = NOW(), imagen = '$imagen' WHERE id = " . $id);


         //COMPROBAMOS SI SE REGISTRO LOS datos
           if($stmt->rowCount() > 0 ) {
             //SI SE REGISTRO LOS DATOS
             header('Location: cms.php');
           }

     }



    }




 ?>
