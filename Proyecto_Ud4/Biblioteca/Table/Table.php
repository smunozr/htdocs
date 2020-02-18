<?php
include("Tr.php");

/**
 * Clase Table que genera tablas a partir de objetos Td y Tr que le vayamos pasando.
 */
class Table
{
    protected $inicio;
    protected $medio;
    protected $cierre;
    protected $contenido;

    public function __construct(...$param)
    {
        switch (sizeof($param)){
            case 0:
                $this->inicio="<table ";
                $this->medio=">\n";
                $this->contenido="\n";
                $this->cierre="</table>\n";
                break;
            default:
                $this->inicio="<table ";
                $this->medio=">\n";
                foreach ($param as $valor){
                    if($valor instanceof Tr){
                        $this->contenido=$this->contenido.$valor;
                    }
                }
                $this->cierre="</table>\n";
                break;
        }

    }

    public function setAtributos(...$param){
        $atributos="";
        foreach ($param as $valor){
            $atributos=$atributos." ".$valor;
        }
        $this->medio=$atributos.$this->medio;
    }

    public function setContenido(...$param){
        foreach ($param as $valor){
            if($valor instanceof Tr){
                $this->contenido=$this->contenido.$valor;
            }
        }
    }

    public function __toString(){
        return $this->inicio.$this->medio.$this->contenido.$this->cierre;
    }

}