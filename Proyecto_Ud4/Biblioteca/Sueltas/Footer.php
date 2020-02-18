<?php
/**
 * Clase que genera una etiqueta Footer para crear un pie de pagina en el documento html
 * recoge parametros para poder incluir cualquier otra etiqueta necesaria en el pie.
 */

class Footer
{
    protected $inicio="<footer>\n";
    protected $cierre="</footer>\n";
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