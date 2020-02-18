<?php

/**
 * Clase que genera una etiqueta del tipo a que sirve para cargar enlaces
 * contiene como parametros apertura de etiqueta, cierre, contenido y la direccion a la que dirige el enlace
 */

class A
{
    protected $inicio;
    protected $cierre;
    protected $contenido;
    protected $href;

    public function __construct($href,$contenido)
    {
        $this->href=$href;
        $this->inicio="<a href='$href'>\n";
        $this->contenido=$contenido."\n";
        $this->cierre="</a>\n";
    }

    public function setID($id){
        $this->inicio="<a id='$id' href='$this->href'>\n";
    }

    public function __toString()
    {
        return $this->inicio.$this->contenido.$this->cierre;
    }


}