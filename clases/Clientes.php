<?php 

class Clientes 
{

    public function obtenerClientes($conexion)
    {
      
        
    $data = array();
    $objasnwer = new stdClass();
    

      $SelUsuario = "SELECT * FROM `tbl_mc_regstro_maestro_de_clientes`";
      
      $request_consulta = mysqli_query($conexion, $SelUsuario);

     
      $filas = mysqli_fetch_array($request_consulta);

      while($filas != null){
        $classobjresponse = new stdClass();
        $classobjresponse->cod_cliente = $filas["cod_cliente"];
        $classobjresponse->nombre = $filas["nombre_cliente"]." ".$filas["apellido_cliente"];
        

        array_push($data, $classobjresponse);
       
        $filas = mysqli_fetch_array($request_consulta);

      }
      
      $objasnwer->resultado = $data;
      
     return $objasnwer;

 
 
    }

    
}


?>