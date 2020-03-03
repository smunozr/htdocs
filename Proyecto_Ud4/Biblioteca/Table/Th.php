<?php


class Th
{
    protected $atrib;
    protected $contenido;

    public function __construct($atrib)
    {
        $this->atrib=$atrib;

    }

    public function setAtributos($atrib){
        $this->atrib.=$atrib;
    }

    public function setContenido(...$contenido){

        foreach ($contenido as $value) {
            $this->contenido .= $value;
        }

    }

    public function __toString(){
        return "<th ".$this->atrib.">"."\n".$this->contenido."\n"."</th>\n";
    }
}