<?php

    class Consultas{
    public function cargarL1(){
        $rows = null;
        $modelo = new DB();
        $conexion = $modelo->connect();
        $sql = "SELECT * FROM reserva WHERE title = 'DEI Lab 01'";
        $statement = $conexion->prepare($sql);
        $statement->execute();

        while($result = $statement->fetch()){
            $rows[] = $result;
        }

        return $rows;
        }

    public function cargarL2(){
        $rows = null;
        $modelo = new DB();
        $conexion = $modelo->connect();
        $sql = "SELECT * FROM reserva WHERE title = 'DEI Lab 02'";
        $statement = $conexion->prepare($sql);
        $statement->execute();

        while($result = $statement->fetch()){
            $rows[] = $result;
        }

        return $rows;
        }

    public function cargarL3(){
        $rows = null;
        $modelo = new DB();
        $conexion = $modelo->connect();
        $sql = "SELECT * FROM reserva WHERE title = 'DEI Lab 03'";
        $statement = $conexion->prepare($sql);
        $statement->execute();

        while($result = $statement->fetch()){
            $rows[] = $result;
        }

        return $rows;
        }

    public function cargarOtro(){
        $rows = null;
        $modelo = new DB();
        $conexion = $modelo->connect();
        $sql = "SELECT * FROM reserva WHERE title = 'Otro'";
        $statement = $conexion->prepare($sql);
        $statement->execute();

        while($result = $statement->fetch()){
            $rows[] = $result;
        }

        return $rows;
        }
    }

?>