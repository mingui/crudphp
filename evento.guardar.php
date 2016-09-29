<?php
//incluir un archivo de conexion
    include 'includes/conexion.php';

//validar si existe un envio del post

if(isset($_POST['accion'])) {
  //empezar a validar el contenido del post

 //INICIO SUBIR IMAGEN
  $dir_subida = '../imagenes/eventos/';
  $extencion = substr($_FILES['imagen_portada']['name'], -4); //Obiene la extension de la imagen
  $nome_imagen = 'evento_'.time().$extencion;
  $imagen_portada = $dir_subida . basename($nome_imagen);


  if(move_uploaded_file($_FILES['imagen_portada']['tmp_name'], $imagen_portada)) {
    echo 'Imagen subida correctamente';
  } else {
    echo 'Error al subir la imagen';
  }
  //FIN SUBIR IMAGEN

  //guardamos todos los post dentro de variables
  $nombre = $_POST['nombre'];
  $description = $_POST['description'];
  $detalle = $_POST['detalle'];
  $imagen_portada = $nome_imagen;
  $fecha = $_POST['fecha'];




  if($_POST['accion'] == 'guardar'){
    //guardar el registro


    //creamos un statement para almacenar los datos
    $stmt = $con->query("INSERT INTO eventos (nombre, description, detalle, imagen_portada, fecha) VALUES ('$nombre', '$description', '$detalle', '$imagen_portada','$fecha')");

    //comprovamos si se registro los datos
    if($stmt->rowCount() > 0){
      //si se registro los datos
      header('location: eventos.php');
    }
  }

//actualizar cms

if($_POST['accion'] == 'editar') {
  $id = $_POST['id'];
  //creamos un statement para actualizar los datos
  $stmt = $con->query("UPDATE eventos SET nombre = '$nombre', description = '$description', imagen_portada = '$imagen_portada', fecha = '$fecha'
 WHERE id = " . $id);

//comprovamos si se registro los datos
if($stmt->rowCount() > 0){
  //si se registro los datos
  header('location: eventos.php');
}

}

}



 ?>
