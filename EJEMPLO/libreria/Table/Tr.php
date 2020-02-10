<?php
include ("Td.php");
/**
 * Clase que genera etiquetas Tr para rellenar las tablas.
 * Contiene metodos para generar atributos y contenido de cada tr el cual es siempre un elemento de la clase Td.
 */
class Tr
{
    protected $inicio;
    protected $medio;
    protected $cierre;
    protected $contenido;

    public function __construct(...$param)
    {
        switch (sizeof($param)){
            case 0:
                $this->inicio="<tr ";
                $this->medio=">\n";
                $this->contenido="\n";
                $this->cierre="</tr>\n";
                break;
            default:
                $this->inicio="<tr ";
                $this->medio=">\n";
                foreach ($param as $valor){
                    if($valor instanceof Td){
                        $this->contenido=$this->contenido.$valor;
                    }
                }
                $this->cierre="</tr>\n";
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