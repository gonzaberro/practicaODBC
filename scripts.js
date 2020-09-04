function mostrarTablaClientes(filtro){

$.post( "tablaClientes.php",{filtro:filtro}, function( data ) {

  $("#containerPrincipal").html( data );

});
}

function buscarCliente(){
   
        mostrarTablaClientes($("#buscarCliente").val());
  
}

function showModal(customer,funcion){

  switch(funcion){
  case 1: 
    editarCliente(customer);
  break;
  case 2: 
    nuevoCliente();
  break;
  }
   
}
function editarCliente(customer){
  $.post( "editarCliente.php",{customer:customer}, function( data ) {

    $("#bodyModal").html( data );
    $('#primaryModal').modal("show");

}); 
}
function nuevoCliente(){
  $.post( "nuevoCliente.php", function( data ) {
    $("#bodyModal").html( data );
    $('#primaryModal').modal("show");

}); 
}
function bajarCliente(customer){

  $.post( "bajarCliente.php",{customer:customer}, function( data ) {

    buscarCliente();

  }); 

}

function activarCliente(customer){

  $.post( "activarCliente.php",{customer:customer}, function( data ) {

    buscarCliente();

  }); 

}

function guardarModal(){
 
  if($("#customer_id").val()==0 && $("#address_id").val()==0){ //creo un nuevo cliente
    crearCliente();
  }else{
    guardarCliente();
  }
  
}
function guardarCliente (){
  $.post( "guardarCliente.php",$("#modalForm").serialize(), function( data ) {
   
    $('#primaryModal').modal("hide");
   buscarCliente();
  }); 
}

function crearCliente (){
  $.post( "crearCliente.php",$("#modalForm").serialize(), function( data ) {
   
    $('#primaryModal').modal("hide");
   buscarCliente();
  }); 
}


