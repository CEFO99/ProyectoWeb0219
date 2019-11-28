<?php

function cargarLabo1(){
    $consultas = new Consultas();
    $filas = $consultas->cargarL1();

echo "<table class='table'>
    <thead>
    <tr>
        <th>Laboratorio</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo de reserva</th>
        <th>Materia</th>
        <th>Fecha Inicio</th>
        <th>Fecha fin</th>
    </tr>
    </thead>";

    foreach($filas as $fila){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$fila['title']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellido']."</td>";
        echo "<td>".$fila['tipo_reserva']."</td>";
        echo "<td>".$fila['materia']."</td>";
        echo "<td>".$fila['start']."</td>";
        echo "<td>".$fila['end']."</td>";
        echo "</tr>";
        echo "</tbody>";

    }

echo "</table>";
    }


function cargarLabo2(){
    $consultas = new Consultas();
    $filas = $consultas->cargarL2();

echo "<table class='table'>
    <thead>
    <tr>
        <th>Laboratorio</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo de reserva</th>
        <th>Materia</th>
        <th>Fecha Inicio</th>
        <th>Fecha fin</th>
    </tr>
    </thead>";

    foreach($filas as $fila){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$fila['title']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellido']."</td>";
        echo "<td>".$fila['tipo_reserva']."</td>";
        echo "<td>".$fila['materia']."</td>";
        echo "<td>".$fila['start']."</td>";
        echo "<td>".$fila['end']."</td>";
        echo "</tr>";
        echo "</tbody>";

    }

echo "</table>";
    }


function cargarLabo3(){
    $consultas = new Consultas();
    $filas = $consultas->cargarL3();

echo "<table class='table'>
    <thead>
    <tr>
        <th>Laboratorio</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo de reserva</th>
        <th>Materia</th>
        <th>Fecha Inicio</th>
        <th>Fecha fin</th>
    </tr>
    </thead>";

    foreach($filas as $fila){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$fila['title']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellido']."</td>";
        echo "<td>".$fila['tipo_reserva']."</td>";
        echo "<td>".$fila['materia']."</td>";
        echo "<td>".$fila['start']."</td>";
        echo "<td>".$fila['end']."</td>";
        echo "</tr>";
        echo "</tbody>";

    }

echo "</table>";
    }


function cargarOtro(){
    $consultas = new Consultas();
    $filas = $consultas->cargarOtro();

echo "<table class='table'>
    <thead>
    <tr>
        <th>Laboratorio</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo de reserva</th>
        <th>Materia</th>
        <th>Fecha Inicio</th>
        <th>Fecha fin</th>
    </tr>
    </thead>";

    foreach($filas as $fila){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>".$fila['title']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellido']."</td>";
        echo "<td>".$fila['tipo_reserva']."</td>";
        echo "<td>".$fila['materia']."</td>";
        echo "<td>".$fila['start']."</td>";
        echo "<td>".$fila['end']."</td>";
        echo "</tr>";
        echo "</tbody>";

    }

echo "</table>";
    }


?>