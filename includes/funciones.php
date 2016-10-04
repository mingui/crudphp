<?php
//Funcion para obtener el detalle de un CSM segun el id
function get_detalle_cms($id){
  include 'includes/conexion.php';
  $stmt = $con->query("SELECT * FROM cms WHERE id = $id");
   while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<h2>'.$fila['nombre'].'</h2>';
      echo '<h4>'.$fila['contenido'].'</h4>';
   }

}




 ?>
