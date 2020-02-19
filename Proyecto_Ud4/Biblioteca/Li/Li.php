<?php

/**
 * Clase que genera etiquetas del tipo Li para la creacion de listas
 */


class Li
{

    protected $atribs;
    protected $contenido;


    public function __construct($contenido)
    {
        $this->atribs="";
        $this->contenido=$this->contenido.$contenido;

    }


    public function __toString(){
        return "<li".$this->atribs.">".$this->contenido."</li>"."\n";    }
}