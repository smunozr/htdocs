<?php


class H1
{
    protected $inicio="<H1>\n";
    protected $cierre="</H1>\n";
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