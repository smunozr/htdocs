<?php


class H2
{
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido;
    }

    public function __toString()
    {
        return "<h2>".$this->contenido."</h2>"."\n";
    }

}