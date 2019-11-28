$(document).ready(function(){
    $('#Calendario').fullCalendar({
      // Header calendario: mes semana dia
        header: {
            left: 'today, prev, next',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        // funcion de deshabilitar botones cuando sea necesario
        dayClick:function(date, jsEvent, view){
            $('#btnAgregar').prop("disabled", false);
            $('#btnActualizar').prop("disabled", true);
            $('#btnEliminar').prop("disabled", true);


            limpiarFormulario(); 
            $('#txtFecha').val(date.format());
            $("#ModalEventos").modal();
        },
        // manda a llamar todos los querys para ejecutarse
        events: '../../eventos.php',
        // funcion para traer los datos de una reserva en especifica 
        eventClick:function(calEvent,jsEvent,view){

          $('#btnAgregar').prop("disabled", true);
          $('#btnActualizar').prop("disabled", false);
          $('#btnEliminar').prop("disabled", false);

          $('#tituloEvento').html(calEvent.title);
          $('#txtDescripcion').val(calEvent.descripcion);
          $('#txtID').val(calEvent.id);
          $('#txtLaboratorio').val(calEvent.title);
          $('#txtCarrera').val(calEvent.carrera);

          $('#txtEstado').val(calEvent.color);
          $('#txtNombre').val(calEvent.nombre);
          $('#txtApellido').val(calEvent.apellido);
          $('#txtCorreo').val(calEvent.correo);
          $('#txtPersona').val(calEvent.num_personas);
          $('#txtTipo').val(calEvent.tipo_reserva);
          $('#txtMateria').val(calEvent.materia);

          FechaHoraS= calEvent.start._i.split(" ");
          $('#txtFecha').val(FechaHoraS[0]);
          $('#txtHoraI').val(FechaHoraS[1]);
          FechaHoraE= calEvent.end._i.split(" ");
          $('#txtFecha').val(FechaHoraE[0]);
          $('#txtHoraF').val(FechaHoraE[1]);

          $("#ModalEventos").modal();
        },
        // poder mover tanto las fechas como hora de un dia a otro
        editable: true,
        eventDrop:function(calEvent){
          $('#txtID').val(calEvent.id);
          $('#txtNombre').val(calEvent.nombre);
          $('#txtCarrera').val(calEvent.carrera);
          $('#txtDescripcion').val(calEvent.descripcion);

          var FechaHora= calEvent.start.format().split("T");
          $('#txtFecha').val(FechaHora[0]);
          $('#txtHoraI').val(FechaHora[1]);
          Recolectar();
          EnviarInfo('modificar',nuevoEvento, true)
        }
    });

var nuevoEvento;
//funciones de cada boton 
// agregar
$('#btnAgregar').click(function(){
  Recolectar();
  EnviarInfo('agregar',nuevoEvento)
});
//eliminar
$('#btnEliminar').click(function(){
  Recolectar();
  EnviarInfo('eliminar',nuevoEvento)
});
//actualizar
$('#btnActualizar').click(function(){
  Recolectar();
  EnviarInfo('modificar',nuevoEvento)
});
//Funcion recolectar informacion
function Recolectar(){
  nuevoEvento={
    id:$('#txtID').val(),
    title: $('#txtLaboratorio').val(),
    start: $('#txtFecha').val() + " " + $('#txtHoraI').val(),
    color: $('#txtEstado').val(),
    descripcion: $('#txtDescripcion').val(),
    textColor: "#FFFFF",
    end: $('#txtFecha').val() + " " + $('#txtHoraF').val(),
    nombre: $('#txtNombre').val(),
    apellido: $('#txtApellido').val(),
    carrera: $('#txtCarrera').val(),
    correo: $('#txtCorreo').val(),
    num_personas: $('#txtPersona').val(),
    tipo_reserva: $('#txtTipo').val(),
    materia: $('#txtMateria').val(),
  };

}
// enviar informacion almacenada en el modal 
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
        alert("Hay un error...");
      }
  });
}
// limpiar informacion del modal
function limpiarFormulario(){
  $('#txtID').val('');
  $('#tituloEvento').val('');
  $('#txtLaboratorio').val('');
  $('#txtFecha').val() + " " + $('#txtHoraI').val('');
  $('#txtEstado').val('');
  $('#txtDescripcion').val('');
  $('#txtFecha').val() + " " + $('#txtHoraF').val('');
  $('#txtNombre').val('');
  $('#txtApellido').val('');
  $('#txtCarrera').val('');
  $('#txtCorreo').val('');
  $('#txtPersona').val('');
  $('#txtTipo').val('');
  $('#txtMateria').val('');
}

});