<?php


class H5
{
    protected $inicio="<H5>\n";
    protected $cierre="</H5>\n";
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido."\n";
    }

    public function __toString()
    {
        $cadena=$this->inicio.$this->contenido.$this->cierre;
        return $cadena;
    }
}