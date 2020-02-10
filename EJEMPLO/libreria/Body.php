<?php

/**
 * Clase que crea el cuerpo del documento HTML con la etiqueta Body,
 * recogiendo parametros que van a ir desarrolando el documento completo
 */
class Body
{
    protected $inicio="<body>\n";
    protected $cierre="</body>\n";
    protected $contenido;

    public function __construct(...$params)
    {
        foreach ($params as $valor){
            $this->contenido.=$valor;
        }
    }


   public function __toString()
   {
        $cadena=$this->inicio.$this->contenido.$this->cierre;
       return $cadena;
   }

}