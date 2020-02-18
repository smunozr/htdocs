<?php
/**
 * Clase que genera etiquetas Ol que se utilizan para crear listas ordenadas
 */

class Ol
{

    protected $atrib;
    protected $contenido;

    public function __construct($tipo)
    {
        $this->atrib = "type='$tipo'";

    }
    public function setAtrib(...$param)
    {
        foreach ($param as $valor) {
            $this->atrib = $this->atrib.$valor;
        }
    }
    public function setContenido(...$param)
    {
        foreach ($param as $valor) {
            $this->contenido = $this->contenido.$valor;
        }
    }

    public function __toString()
    {
        return "<ol".$this->atrib.">".$this->contenido."</ol>"."\n";
    }


}
