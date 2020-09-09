
  

 (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Get the forms we want to add validation styles to
              var forms = document.getElementsByClassName('needs-validation');
            
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false  ) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
})();

function datosclientes(){

    $.get("../WS/WS_obtener_clientes.php",
      {
        
      },function(data){
        var res = JSON.parse(data);
        
        for (let index = 0; index < res['resultado'].length; index++) {
          
            $("#clientes").append("<option value = "+ res.resultado[index].cod_cliente +">"+res.resultado[index].nombre +"</option>");
            
        }
           
        
      }

    );

}

function datosproductos(){

    $.get("../WS/WS_obtener_productos.php",
      {
        
      },function(data){
        var res = JSON.parse(data);
        
        for (let index = 0; index < res['resultado'].length; index++) {
          
            $("#Productos").append("<option value = "+ res.resultado[index].cod_producto +">"+res.resultado[index].nombre +"</option>");
            
        }
           
        
      }

    );
}
function traerprecio() {

    
  
    alert(nombre_cliente)

    $.post("../WS/WS_obtener_precios.php",
      {
        "cod_cliente":cod_cliente,
        "cod_producto":cod_producto,
        

      },function(data){
        alert("entro")
        var res = JSON.parse(data);
        var valor = res.status;
        var precio = res.precio;
        alert(precio)

        if (valor == 1) {
          alert("entro")
          cont+=1;
          
          var fila = '<tr id="'+cont+'" onclick="eliminarfila(this.id)"; ><td>'+ nombre_cliente +'</td><td>'+ nombre_producto+'</td><td>'+cantidad+'</td><td>'+(precio*cantidad)+'</td><td><input type="button" value="Eliminar" class="btn" "></td></tr>';
          
          
          $('#tabla').append(fila);
          
        }else{
            alert("No existe precio asociado de este cliente:  "+nombre_cliente+"  con este producto:  "+nombre_producto);
        }
        
      }

    );
    
    

}

function eliminarfila(id){
  
  $('#'+id).remove();
}

     
$(document).ready(function(){
    $('#btn_add').click(function(){
    alert(cod_cliente)
        if (cod_cliente!="999999" && cod_producto!="999999") {
            traerprecio();
        }else{
          alert("Asegurese de rellenar todos los campos")
        }
        
    });
});