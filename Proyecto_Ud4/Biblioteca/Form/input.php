<?php


class input
{
    protected $atrib;
    protected $contenido;

    public function __construct($tipo)
    {
        if($tipo=="text" || $tipo=="password" || $tipo=="number" || $tipo=="submit" || $tipo=="date") {
            $this->atrib = 'type="' . $tipo . '" ';
        }else{
            $this->atrib = 'type="' . 'text' . '" ';;
        }
    }

    public function setAtributos($atrib){
        $this->atrib.=$atrib;
    }

    public function setContenido($contenido){

        $this->contenido.=$contenido;

    }

    public function __toString(){
        return "<input ".$this->atrib.">"."\n".$this->contenido."\n";
    }
}