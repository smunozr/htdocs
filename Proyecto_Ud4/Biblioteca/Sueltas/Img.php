<?php
/**
 * Clase que genera una etiqueta de la clase IMG que se utiliza para cargar imagenes.
 */

class Img
{
    protected $atrib;


    public function __construct($src,$alt){

        $this->atrib='src="'.$src.'" '.'alt="'.$alt.'"';

    }

    public function seId($id){
        $this->inicio="<img id='$id' ";
    }

    public function __toString(){
        return '<img '.$this->atrib.'>';
    }
}