<?php


class H5
{
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido;
    }

    public function __toString()
    {
        return "<h5>".$this->value."</h5>"."\n";
    }

}