<?php
/**
 * Clase que genera una etiqueta de la clase IMG que se utiliza para cargar imagenes.
 */

class Img
{
    protected $inicio;
    protected $cierre;

    public function __construct($src,$alt){

        $this->inicio="<img ";
        $this->cierre="src='$src' alt='$alt'>\n";

    }

    public function seId($id){
        $this->inicio="<img id='$id' ";
    }

    public function __toString(){
        return $this->inicio.$this->cierre;
    }
}