<?php
  $mysqli = new mysqli('localhost', 'root', '', 'sistema');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DEI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>

    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/Style.css">
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/es.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
      
        <div class="row">
            <div class="col-7">
            <header class="header">
           <img src="imagenes/uca.png" alt="logo" class="logo">
        <ul id="menu">
        <li><a href="#">Inicio</a>
            <ul>
                <li><a href="#">Encargado</a>
                <li><a href="#">Instructores</a>
            </ul>
        </li>
            <li><a href="#">Laboratorios</a>
            <ul>
                <li><a href="#">Laboratorio L1</a>
                <li><a href="#">Laboratorio L2</a>
                <li><a href="#">Laboratorio L3</a>
                <li><a href="#">Laboratorio  #</a>
                <li><a href="#">Laboratorio  #</a>
            </ul>
        </li>
            <li><a href="#">Reserva</a>
            <ul>
                <li><a href="#">Uso Personal</a>
                <li><a href="#">Reuniones</a>
                <li><a href="#">Otro</a>
            </ul>
            </li>
            <li><a href="#">Agrupaciones</a>
                <ul>
                    <li><a href="#">Centros de Computo</a>
                    <li><a href="#">Laptops</a>
                    <li><a href="#">Permanencias</a>
                </ul>
                <li><a href="#">Ayuda</a>
                    <ul>
                        <li><a href="#">Ayuda</a>
                    </ul>
        </ul>
       </header>
            </div>
            <div class="col-7"><div id="Calendario"></div></div>
            <div class="col"></div>
        </div>
    </div>

    <script> 
            $(document).ready(function(){
                $('#Calendario').fullCalendar({
                    header: {
                        left: 'today, prev, next',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    dayClick:function(date, jsEvent, view){
                        $('#btnAgregar').prop("disabled", false);
                        $('#btnActualizar').prop("disabled", true);
                        $('#btnEliminar').prop("disabled", true);


                        limpiarFormulario();
                        $('#txtFecha').val(date.format());
                        $("#ModalEventos").modal();
                    },
                    events: 'http://localhost:8082/Calendario/eventos.php',

                    eventClick:function(calEvent,jsEvent,view){

                      $('#btnAgregar').prop("disabled", true);
                      $('#btnActualizar').prop("disabled", false);
                      $('#btnEliminar').prop("disabled", false);

                      $('#tituloEvento').html(calEvent.title);
                      $('#txtDescripcion').val(calEvent.descripcion);
                      $('#txtID').val(calEvent.id);
                      $('#txtTitulo').val(calEvent.title);
                      $('#txtColor').val(calEvent.color);

                      FechaHora= calEvent.start._i.split(" ");
                      $('#txtFecha').val(FechaHora[0]);
                      $('#txtHora').val(FechaHora[1]);

                      $("#ModalEventos").modal();
                    },
                    editable: true,
                    eventDrop:function(calEvent){
                      $('#txtID').val(calEvent.id);
                      $('#txtTitulo').val(calEvent.title);
                      $('#txtColor').val(calEvent.color);
                      $('#txtDescripcion').val(calEvent.descripcion);

                      var FechaHora= calEvent.start.format().split("T");
                      $('#txtFecha').val(FechaHora[0]);
                      $('#txtHora').val(FechaHora[1]);
                      Recolectar();
                      EnviarInfo('modificar',nuevoEvento, true)
                    }
                });
            }); 
</script>



<!-- Modal -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="txtID" id="txtID">
        <input type="hidden" name="txtFecha" id="txtFecha">
        <div class="form-row">
          <div class="form-group col-md-6">  
            <label for="">Nombre: </label> 
            <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre">
          </div>
          <div class="form-group col-md-6">  
            <label for="">Apellido: </label> 
            <input type="text" name="txtApellido" id="txtApellido" class="form-control" placeholder="Apellido">
          </div>
          <div class="form-group col-md-6">  
            <label for="">Carrera: </label> 
            <select class="form-control">
              <option value="0">Seleccione:</option>
              <?php
                $query = $mysqli -> query ("SELECT * FROM carrera");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">  
            <label for="">Correo: </label> 
            <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" placeholder="Correo">
          </div>
          <div class="form-group col-md-6">  
            <label for="">Laboratorio: </label> 
            <select class="form-control">
              <option value="0">Seleccione:</option>
              <?php
                $query = $mysqli -> query ("SELECT * FROM laboratorios");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">  
            <label for="">Numero de persona: </label> 
            <input type="text" name="txtPersona" id="txtPersona" class="form-control" placeholder="Numero de personas">
          </div>
          <div class="form-group col-md-3">
            <label for="">Hora Inicio: </label><input type="text" name="txtHoraI" id="txtHoraI" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label for="">Hora Fin: </label><input type="text" name="txtHoraF" id="txtHoraF" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Estado: </label>
            <select name="color" class="form-control" id="color" required>
						  <option value="" selected="selected">Estado</option>
						  <option style="color:#4caf50;" value="#4caf50">Aprobado</option>
						  <option style="color:#ffab40;" value="#ffab40">En proceso</option>
						  <option style="color:#f44336;" value="#f44336">Denegado</option>
						  
						</select>
          </div>
        </div>
        <div class="form-group">
          <label for="">Descripción: </label>
          <textarea name="txtDescripcion" id="txtDescripcion" rows="3" class="form-control"></textarea>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
        <button type="button" id="btnActualizar" class="btn btn-warning">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
        <p >Copyright 2019 Laboratorios UCA. All Rights Reserved</p>
    </footer>
<script>
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
</script>

</body>
</html>