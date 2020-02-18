<?php


class H1
{
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido;
    }

    public function __toString()
    {
        return "<h1>".$this->contenido."</h1>"."\n";
    }

}