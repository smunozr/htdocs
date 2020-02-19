<?php
/**
 * Clase que genera una etiqueta P que sirve para escribir parrafos sin formato
 * recoge parametros que son el texto que va a contener la etiqueta
 */

class P
{
    protected $contenido;
    protected $atrib;

    public function __construct($atrib)
    {
        $this->atrib.=$atrib;
    }

    public function setContenido(...$contenido){

        foreach ($contenido as $value) {
            $this->contenido .= $value;
        }

    }


    public function __toString()
    {
        return "<p ".$this->atrib.">"."\n".$this->contenido."\n"."</p>\n";
    }


}