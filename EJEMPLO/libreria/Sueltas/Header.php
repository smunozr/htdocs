<?php
/**
 * Clase que genera una etiqueta header que sirve generar un encabezado en el documento html
 * recoge parametros para incluir lo necesario en el encabezado.
 */

class Header
{
    protected $inicio="<header>\n";
    protected $cierre="</header>\n";
    protected $contenido;

    public function __construct(...$param)
    {
        foreach ($param as $valor){
            $this->contenido.=$valor;
        }
    }

    public function __toString()
    {
        return $this->inicio.$this->contenido.$this->cierre;
    }
}