<?php
/**
 * Clase que genera etiquetas Td para rellenar las Tr de una tabla.
 * Contiene metodos para generar atributos y contenido de cada celda.
 */

class Td
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
        return "<td ".$this->atrib.">"."\n".$this->contenido."\n"."</td>\n";
    }
}