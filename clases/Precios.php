<?php 

class Precios
{

  
    function obtenerPrecios($conexion,$cod_cliente,$cod_producto)
    {

      $data = array();
    $objasnwer = new stdClass();
 
      $SelPrecios = "SELECT `cod_cliente`,`cod_producto`,`precio_producto` FROM `tbl_mcp_clientes_x_productos` WHERE `cod_cliente`=$cod_cliente  and `cod_producto`= $cod_producto";

      $request_consulta = mysqli_query($conexion, $SelPrecios);

     
      $filas = mysqli_fetch_array($request_consulta);

      if($filas != null){

        $objasnwer->status = 1;
        $objasnwer->precio = $filas["precio_producto"];
        $data = $objasnwer;

 
      }else {
            
        $objasnwer->status = 0;
        $objasnwer->data = "Incorrrecto";
        $data = $objasnwer;
        
    }


    return $data; 

 
 
    }

    






}


?>