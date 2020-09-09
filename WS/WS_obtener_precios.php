<?php

  include("../clases/Conexionbd.php");
  include("../clases/Precios.php");

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $cod_cliente = $_POST["cod_cliente"];
  $cod_producto = $_POST["cod_producto"];
    
  $objClientes = new Precios();
  
  echo Json_encode($objClientes->obtenerPrecios($conexion,$cod_cliente,$cod_producto), JSON_UNESCAPED_UNICODE);

  }else{
    echo "<h1><center>Perdon amiguito no esta disponible :V</center></h1>";
  }

 ?>