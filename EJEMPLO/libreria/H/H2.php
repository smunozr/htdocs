<?php


class H2
{
    protected $inicio="<H2>\n";
    protected $cierre="</H2>\n";
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