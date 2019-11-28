var nuevoEvento;
$('#btnAgregar').click(function(){
  Recolectar();
  EnviarInfo('agregar',nuevoEvento)
});
$('#btnEliminar').click(function(){
  Recolectar();
  EnviarInfo('eliminar',nuevoEvento)
});
$('#btnActualizar').click(function(){
  Recolectar();
  EnviarInfo('modificar',nuevoEvento)
});
function Recolectar(){
  nuevoEvento={
    id:$('#txtID').val(),
    title: $('#txtTitulo').val(),
    start: $('#txtFecha').val() + " " + $('#txtHora').val(),
    color: $('#txtColor').val(),
    descripcion: $('#txtDescripcion').val(),
    textColor: "#FFFFFF",
    end: $('#txtFecha').val() + " " + $('#txtHora').val(),
  };
}
function EnviarInfo(accion,objEvento){
  $.ajax({
    type: 'POST',
    url: 'eventos.php?accion='+accion,
    data: objEvento,
    success: function(msg){
      if(msg){
        $('#Calendario').fullCalendar('refetchEvents');
          if(!modal){
            $("#ModalEventos").modal('toggle');
          }
        }
      },
      error:function(){
        alert("Hay un error..");
      }
  });
}
function limpiarFormulario(){
  $('#txtID').val('');
  $('#txtTitulo').val('');
  $('#txtColor').val('');
  $('#txtDescripcion').val('');
}