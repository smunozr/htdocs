<?php

/**
 * Clase que genera etiquetas del tipo Li para la creacion de listas
 */


class Li
{
    protected $inicio;
    protected $medio;
    protected $cierre;
    protected $contenido;


    public function __construct($contenido)
    {
        $this->inicio="<li ";
        $this->medio=">\n";
        $this->contenido=$this->contenido.$contenido."\n";
        $this->cierre="</li>\n";
    }

    public function setId($id){
        $this->inicio="<li id='$id' ";
    }
    public function __toString(){
        return $this->inicio.$this->medio.$this->contenido.$this->cierre;
    }
}