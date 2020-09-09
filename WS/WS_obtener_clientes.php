<?php

  include("../clases/Conexionbd.php");
  include("../clases/Clientes.php");

  if($_SERVER['REQUEST_METHOD'] == 'GET'){

  $objClientes = new Clientes();
  
  echo Json_encode($objClientes->obtenerClientes($conexion), JSON_UNESCAPED_UNICODE);

  }else{
    echo "<h1><center>Perdon amiguito no esta disponible :V</center></h1>";
  }

 ?>