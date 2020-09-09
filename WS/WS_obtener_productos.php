<?php

  include("../clases/Conexionbd.php");
  include("../clases/Productos.php");

  if($_SERVER['REQUEST_METHOD'] == 'GET'){

  $objProductos = new Productos();
  
  echo Json_encode($objProductos->obtenerProductos($conexion), JSON_UNESCAPED_UNICODE);

  }else{
    echo "<h1><center>Perdon amiguito no esta disponible :V</center></h1>";
  }

 ?>