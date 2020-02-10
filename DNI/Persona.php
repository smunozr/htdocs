<?php
include_once 'BDD.php';

class Persona
{   public $DNI;
    public $nombre;
    public $ap1;
    public $ap2;
    public $tipovia;
    public $direccion;

    function __construct($nombre,$ap1,$ap2,$direccion,$tipovia,$DNI)
    {
    $this->nombre = $nombre;
    $this->ap1 = $ap1;
    $this->ap2 = $ap2;
    $this->direccion = $direccion;
    $this->DNI = $DNI;
    $this->tipovia = $tipovia;

    $bdd = new BDD();
    $bdd->insertarPersona($this);
    unset($bdd);


    }

}