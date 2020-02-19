<?php


class H6
{
    protected $contenido;

    public function __construct($contenido)
    {
        $this->contenido=$contenido;
    }

    public function __toString()
    {
        return "<h6>".$this->contenido."</h6>"."\n";
    }

}