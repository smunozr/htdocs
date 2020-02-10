<?php

class Ejemplo{
    var $atributo1;
    var $atributo2;
    var $atributo3;

    function metodo1($param){
        $this->atributo1=$param;
        echo $this->atributo1;
    }

    function metodo2($param){
        echo $param;
    }
}

    $miObjeto = new Ejemplo();
    $miObjeto->metodo1(3);
    $miObjeto->atributo1="a";
    echo $miObjeto->atributo1;