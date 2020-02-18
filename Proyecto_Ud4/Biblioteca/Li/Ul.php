<?php
/**
 * Clase qu genera una etiqueta Ul para hacer listas desordenadas.
 */

class Ul
{
    protected $atrib;
    protected $contenido;

    public function __construct($tipo)
    {
        $this->atrib = "type='$tipo'";

    }

    public function setContenido($param){

            $this->contenido.=$param;

    }

    public function __toString(){
        return "<ul"." ".$this->atrib.">"."\n".$this->contenido."</ul>"."\n";    }


}