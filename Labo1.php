<?php
  require_once('includes/db.php');
  require_once('consultas.php');
  require_once('cargar.php');
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

<li class="nav-item">
        <a class="nav-link" href="calendario.php">Inicio</a>
      </li>   
<!--Laboratorios-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Laboratorios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Labo1.php">Laboratorio L1</a>
          <a class="dropdown-item" href="Labo2.php">Laboratorio L2</a>
          <a class="dropdown-item" href="Labo3.php">Laboratorio L3</a>
          <a class="dropdown-item" href="otro.php">Otro</a>
        </div>
      </li>
<!-- Ayuda -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#ModalAyuda">Ayuda</a>
      </li>   
<!--Cerrar-->
<li class="nav-item">
        <a class="nav-link" href="includes/logout.php">Cerrar Sesion</a>
      </li>   
    </ul>
  </div>
</nav>
                <a href="/" class="navbar-brand">Reserva de Laboratorios UCA</a>
               </nav >
<!--Contenedor del calendario-->
<div class="container">
        <div class="row">
            <div class="col">
              <?php cargarLabo1(); ?>
            </div>
            <div class="col-sm-10">
              <!-- Calendario -->
              <div id="Calendario"></div>
            </div>
            <div class="col">
            </div>
        </div>
    </div>



<!-- Modal ayuda-->
<div class="modal fade" id="ModalAyuda" tabindex="-1" role="dialog" aria-labelledby="ModalAyuda" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalAyuda">Información sobre Estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Colores significado</p>
        <p>Verde = Aprobado</p>
        <p>Rojo = Denegado</p>
        <p>Anaranjado = En proceso</p>
        <p>Amarillo = Cancelado</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>


</body>
</html>