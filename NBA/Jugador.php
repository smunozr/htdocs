<?php

class Jugador{
    private $puntos;
    private $asistencias;
    private $rebotes;
    private $tapones;

    function __construct($puntos, $asistencias, $rebotes, $tapones)
    {
        $this->puntos=$puntos;
        $this->asistencias=$asistencias;
        $this->rebotes=$rebotes;
        $this->tapones=$tapones;
    }

    function __get($prop){
        $valor="";
        switch ($prop){
            case "puntos":$valor= $this->puntos;
                break;
            case "asistencias":$valor=$this->asistencias;
                break;
            case "rebotes":$valor=$this->rebotes;
                breaK;
            case "tapones":$valor=$this->tapones;
                break;
            default:$valor="Error";
        }

        return $valor;
    }
}