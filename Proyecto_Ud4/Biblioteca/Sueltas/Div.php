<?php
/**
 * Clase que genera una etiqueta DIV que sirve para crear bloques dentro del documento HTML
 * admite la inclusion de parametros para dar cuerpo a cada bloque
 */

class Div
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
        return "<div ".$this->atrib.">"."\n".$this->contenido."\n"."</div>\n";
    }
}