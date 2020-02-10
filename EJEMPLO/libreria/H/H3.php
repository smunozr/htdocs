<?php


class H3
{
    protected $inicio="<H3>\n";
    protected $cierre="</H3>\n";
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