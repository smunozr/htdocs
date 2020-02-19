<?php
include("Tr.php");

/**
 * Clase Table que genera tablas a partir de objetos Td y Tr que le vayamos pasando.
 */
class Table
{
    protected $atrib;
    protected $contenido;

    public function __construct($atrib)
    {
     $this->atrib=$atrib;

    }

    public function setAtributos($atrib){
        $this->atrib.=$atrib;
    }

    public function setContenido(...$contenido){

        foreach ($contenido as $value) {
            $this->contenido .= $value;
        }

    }

    public function __toString(){
        return "<table ".$this->atrib.">"."\n".$this->contenido."\n"."</table>";
    }

}