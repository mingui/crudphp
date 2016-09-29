<?php

$dir_subida = '../imagenes/eventos/';
$extencion = substr($_FILES['imagen_portada']['name'], -4); //Obiene la extension de la imagen
$nome_imagen = 'evento_'.time().$extencion;
$imagen_portada = $dir_subida . basename($nome_imagen);


if(move_uploaded_file($_FILES['imagen_portada']['tmp_name'], $imagen_portada)) {
  echo 'Imagen subida correctamente';
} else {
  echo 'Error al subir la imagen';
}




?>
