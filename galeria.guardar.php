<?php
//incluir un archivo de conexion
    include 'includes/conexion.php';

    //validar si existe un envio del post

    if(isset($_POST['accion'])) {
      //empezar a validar el contenido del post

      //INICIO SUBIR IMAGEN
       $dir_subida = '../imagenes/fotos/';
       $extencion = substr($_FILES['imagen']['name'], -4); //Obiene la extension de la imagen
       $nome_imagen = 'imagen_'.time().$extencion;
       $imagen_portada = $dir_subida . basename($nome_imagen);


       if(move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_portada)) {
         echo 'Imagen subida correctamente';
       } else {
         echo 'Error al subir la imagen';
       }
       //FIN SUBIR IMAGEN



       //guardamos todos los post dentro de variables
       $nombre = $_POST['nombre'];
       $evento_id = $_POST['evento_id'];
       $imagen = $nome_imagen;


         if($_POST['accion'] == 'guardar'){
           //creamos un statement para almacenar los datos
           $stmt = $con->query("INSERT INTO fotos (evento_id, nombre, imagen, fecha_subida) VALUES ('$evento_id', '$nombre', '$imagen', NOW() )");

           if($stmt->rowCount() > 0){
             header('Location: evento.detalle.php?id='. $evento_id );
           }

         }


    }//Fin Validar POST
?>
