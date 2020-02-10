<?php

class Empleado{
  private $nombre;
  private  $sueldo;
  private static $nEmple=0;

  function __construct(...$param3){

      switch (sizeof($param3)){
          case 1: if (gettype($param3[0])=="string"){
              $this->nombre="$param3[0]" .self::$nEmple;
              self::$nEmple++;
          }elseif (gettype($param3[0])=="integer"){
              $this->sueldo=$param3[0];
          }
          break;

          case 2: if(gettype($param3[0])=="string" && gettype($param3[1])=="integer"){
              $this->nombre ="$param3[0] " .self::$nEmple;
              $this->sueldo=$param3[1];
              self::$nEmple++;
          }
          break;
          default:$this->nombre="Empleado " .self::$nEmple;
              self::$nEmple++;
          break;
      }


  }

  function clone(){

  }
}

$a=new Empleado();
var_dump($a);
$a=new Empleado("pepe");
var_dump($a);
$a=new Empleado(3000);
var_dump($a);
$a= new Empleado("pepe",3000);
var_dump($a);
$a = new Empleado("pepe",3000,2);
var_dump($a);
