<?php


class H4
{
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido;
    }

    public function __toString()
    {
        return "<h4>".$this->value."</h4>"."\n";
    }

}