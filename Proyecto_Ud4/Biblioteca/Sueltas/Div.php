<?php
/**
 * Clase que genera una etiqueta DIV que sirve para crear bloques dentro del documento HTML
 * admite la inclusion de parametros para dar cuerpo a cada bloque
 */

class Div
{
    protected $inicio="<div>\n";
    protected $cierre="</div>\n";
    protected $contenido;

    public function __construct(...$param)
    {
        foreach ($param as $valor){
            $this->contenido=$this->contenido.$valor;
        }
    }

    public function setID($id){
        $this->inicio="<div id='$id'>";
    }

    public function __toString()
    {
        return $this->inicio.$this->contenido.$this->cierre;
    }
}