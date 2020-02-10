<?php


class Head
{

    protected $title;
    protected $meta=Array();

    public function __construct($title = "Mi pagina")
    {
        $this->title = "<title>".$title."</title>\n";

    }

    public function addMeta($name,$content){
        $cadena="<meta name='$name' content='$content'/>";
        $this->meta[]=$cadena;
    }
    public function __toString()
    {
        $cadena="<head>\n";
        $cadena.=$this->title;
        foreach ($this->meta as $valor){
            $cadena.=$valor."\n";
        }
        $cadena.="</head>\n";
        return $cadena;
    }

}