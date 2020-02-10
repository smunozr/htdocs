<?php

class Persona{
    var $nombre;
    var $apell1;
    var $apell2;
    var $dni;
    var $tipoVia;
    var $direccion;

    function __construct($nombre,$apell1,$apell2,$dni,$tipoVia,$direccion){
        $this->nombre=$nombre;
        $this->apell1=$apell1;
        $this->apell2=$apell2;
        $this->dni=$dni;
        $this->tipoVia=$tipoVia;
        $this->direccion=$direccion;
    }

    function __get($prop){
        $valor="";
        switch ($prop){
            case "nombre":$valor= $this->nombre;
            break;
            case "apell1":$valor=$this->apell1;
            break;
            case "apell2":$valor=$this->apell2;
            breaK;
            case "dni":$valor=$this->dni;
            break;
            case "tipoVia":$valor=$this->tipoVia;
            break;
            case "direccion":$valor=$this->direccion;
            break;
            default:$valor="Error";
        }

        return $valor;
    }
}