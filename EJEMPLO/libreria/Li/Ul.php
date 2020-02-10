<?php
/**
 * Clase qu genera una etiqueta Ul para hacer listas desordenadas.
 */

class Ul
{
    protected $inicio;
    protected $medio;
    protected $cierre;
    protected $contenido;

    public function __construct(...$param)
    {
        $this->inicio="<ul ";
        switch (sizeof($param)){
            case 1:
                if($param[0]=="circle" || $param[0]=="disc" || $param[0]=="square"){
                    $this->medio = "type='$param[0]'>\n";
                    $this->cierre = "</ul>\n";
                }else{
                    $this->medio = "type=''>\n";
                    $this->cierre = "</ul>\n";
                }
                break;
            default:
                $this->medio = "type=''>\n";
                $this->cierre = "</ul>\n";
                break;
        }

    }

    public function setId($id){
        $this->inicio="<ul id='$id' ";
    }

    public function setContenido(...$param){
        foreach ($param as $valor){
            $this->contenido=$this->contenido.$valor;
        }
    }

    public function __toString(){
        return $this->inicio.$this->medio.$this->contenido.$this->cierre;
    }


}