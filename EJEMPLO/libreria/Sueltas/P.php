<?php
/**
 * Clase que genera una etiqueta P que sirve para escribir parrafos sin formato
 * recoge parametros que son el texto que va a contener la etiqueta
 */

class P
{
    protected $inicio="<p>\n";
    protected $cierre="</p>\n";
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido."\n";
    }

    public function setId($id){
        $this->inicio="<p id='$id'>\n";
    }

    public function __toString()
    {
        $cadena=$this->inicio.$this->contenido.$this->cierre;
        return $cadena;
    }


}