<?php


class H3
{
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido;
    }

    public function __toString()
    {
        return "<h3>".$this->value."</h3>"."\n";
    }

}