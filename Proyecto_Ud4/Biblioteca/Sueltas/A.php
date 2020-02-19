<?php

/**
 * Clase que genera una etiqueta del tipo a que sirve para cargar enlaces
 * contiene como parametros apertura de etiqueta, cierre, contenido y la direccion a la que dirige el enlace
 */

class A
{
    protected $contenido;
    protected $href;

    public function __construct($href,$contenido)
    {
        $this->href=$href;
        $this->contenido=$contenido;
    }


    public function __toString()
    {
        return '<a href="'.$this->href.'">'.$this->contenido."</a>\n";
    }


}