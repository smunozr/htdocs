<?php
include("Td.php");
/**
 * Clase que genera etiquetas Tr para rellenar las tablas.
 * Contiene metodos para generar atributos y contenido de cada tr el cual es siempre un elemento de la clase Td.
 */
class Tr
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
        return "<tr ".$this->atrib.">"."\n".$this->contenido."\n"."</tr>\n";
    }
}