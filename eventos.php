<?php
header('Content-Type: application/json');
$pdo = new PDO("mysql:dbname=sistema;host=localhost","root","");

$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
switch($accion){
    case 'agregar':
        $sentenciaSQL = $pdo->prepare("INSERT INTO reserva (title,descripcion,color,textColor,start,end,nombre,apellido,carrera,correo,num_personas,tipo_reserva,materia) VALUES(:title,:descripcion,:color,:textColor,:start,:end,:nombre,:apellido,:carrera,:correo,:num_personas,:tipo_reserva,:materia)");

        $respuesta = $sentenciaSQL->execute(array(
            "title" => $_POST['title'],
            "descripcion" => $_POST['descripcion'],
            "color" => $_POST['color'],
            "textColor" => $_POST['textColor'],
            "start" => $_POST['start'],
            "end" => $_POST['end'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "carrera" => $_POST['carrera'],
            "correo" => $_POST['correo'],
            "num_personas" => $_POST['num_personas'],
            "tipo_reserva" => $_POST['tipo_reserva'],
            "materia" => $_POST['materia']
        ));
        echo json_encode($respuesta);
        break;
    case 'eliminar':
        $respuesta=false;
        if(isset($_POST['id'])){
            $sentenciaSQL = $pdo->prepare("DELETE FROM reserva WHERE ID=:ID");
            $respuesta=$sentenciaSQL->execute(array("ID"=>$_POST['id']));
        }
        echo json_encode($respuesta);
        break;
        case 'modificar':
            $sentenciaSQL = $pdo->prepare("UPDATE reserva SET
            title=:title,
            descripcion=:descripcion,
            color=:color,
            textColor=:textColor,
            start=:start,
            end=:end,
            nombre=:nombre,
            apellido=:apellido,
            carrera=:carrera,
            correo=:correo,
            num_personas=:num_personas,
            tipo_reserva=:tipo_reserva,
            materia=:materia
            WHERE ID =:ID
            ");
    
            $respuesta = $sentenciaSQL->execute(array(
            "ID" => $_POST['id'],
            "title" => $_POST['title'],
            "descripcion" => $_POST['descripcion'],
            "color" => $_POST['color'],
            "textColor" => $_POST['textColor'],
            "start" => $_POST['start'],
            "end" => $_POST['end'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "carrera" => $_POST['carrera'],
            "correo" => $_POST['correo'],
            "num_personas" => $_POST['num_personas'],
            "tipo_reserva" => $_POST['tipo_reserva'],
            "materia" => $_POST['materia']
            ));
            echo json_encode($respuesta);
            break;
        
    default: 

        $sentenciaSQL = $pdo->prepare("SELECT * FROM reserva");
        $sentenciaSQL->execute();

        $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;
}
?>