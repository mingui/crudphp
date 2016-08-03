<?php
//Conexion  a Base de datos
$con = new PDO('mysql:host=localhost;dbname=audiopower;charset=utf8', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 ?>
