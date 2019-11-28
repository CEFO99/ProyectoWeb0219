<?php
  require_once('includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva de Laboratorio</title>
    <!--css--> 
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css" >
    <link rel="stylesheet" href="assets/css/Style.css" > 
        
    <!--Scripts--> 
    <script src="Calendario/js/eventos.js"></script>
    <script src="Calendario/js/jquery.min.js"></script>
    <script src="Calendario/js/moment.min.js"></script>
    <script src="Calendario/js/fullcalendar.min.js"></script>
    <script src="Calendario/js/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    
<!--BOOTSTRAP 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background-image: url('assets/imagenes/wallpaperp.jpg');">
<nav class="navbar navbar-dark bg-dark mb-4">
<!--UCA logo-->
<img src="assets/imagenes/ucalogo.png" alt="logoUCA" class="logof" width="50" height="50">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

<!--Inicio-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inicio
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Encargado</a>
          <a class="dropdown-item" href="#">Instructores</a>
        </div>
      </li>
<!--Laboratorios-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Laboratorios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Laboratorio L1</a>
          <a class="dropdown-item" href="#">Laboratorio L2</a>
          <a class="dropdown-item" href="#">Laboratorio L3</a>
          </div>
      </li>
<!--Cerrar-->
      <li class="nav-item">
        <a class="nav-link" href="includes/logout.php">Cerrar</a>
      </li>   
<!-- Ayuda -->
      <li class="nav-item">
        <a class="nav-link" href="#">Ayuda</a>
      </li>   
    </ul>
  </div>
</nav>
                <a href="/" class="navbar-brand">Reserva de Laboratorios UCA</a>
               </nav >
<!--Contenedor del calendario-->
<div class="container" style="background-color: white;">      
        <div class="row">
            <div class="col-20"><div id="Calendario"></div></div>
        </div>
    </div>

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
          <div class="form-group col-md-4">  
            <label for="">Carrera: </label> 
            <select class="form-control" id="txtCarrera">
              <option>Ingenieria Informatica</option>
              <option>Arquitectura</option>
              <option>Ingenieria Electrica</option>
              <option>Ingenieria Civil</option>
              <option>Ingenieria Mecanica</option>
            </select>
          </div>
          <div class="form-group col-md-4">  
            <label for="">Tipo de reserva: </label> 
            <select class="form-control" id="txtTipo" placeholder="Seleccione">
              <option value="Estudio">Estudio</option>
              <option value="Ocio">Ocio</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="form-group col-md-4">  
            <label for="">Laboratorio: </label> 
            <select class="form-control" id="txtLaboratorio">
            <option value="DEI Lab 01">DEI Lab 01</option>
            <option value="DEI Lab 02">DEI Lab 02</option>
            <option value="DEI Lab 03">DEI Lab 03</option>
            <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="form-group col-md-4">  
            <label for="">Materia: </label> 
            <select class="form-control" id="txtMateria">
              <option disabled>Seleccione:</option>
              <option value="Programacion Web">Programacion Web</option>
              <option value="POO">POO</option>
              <option value="Bases de datos">Bases de datos</option>
              <option value="Otra">Otra</option>
            </select>
          </div>
          <div class="form-group col-md-4">  
            <label for="">Correo: </label> 
            <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" placeholder="Correo">
          </div>
          
          <div class="form-group col-md-4">  
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
            <label for="Estado">Estado: </label>
            <!-- <input class="form-control" type="text" name="txtEstado" id="txtEstado" placeholder="En proceso" readonly> -->
            <select name="txtEstado" id="txtEstado" class="form-control">
						  <option value="#BD6622" selected>En proceso</option>
						  <option value="#4caf50">Aprobado</option>
              <option value="#f44336">Denegado</option>
              <option value="#f44336">Cancelado</option>
						</select>
          </div>
        </div>
        <div class="form-group">
          <label for="">Descripción: </label>
          <textarea name="txtDescripcion" id="txtDescripcion" rows="3" class="form-control"></textarea>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
        <button type="button" id="btnActualizar" class="btn btn-warning">Actualizar</button>
        <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<footer  class="py-4 bg-dark text-white-50>">	
  <div class="container text-center text-white">	
    <small>Copyright 2019 Laboratorios UCA. All Rights Reserved</small>	
  </div>	
</footer>

<script src="Calendario/js/calendario.js"></script>
</body>
</html>