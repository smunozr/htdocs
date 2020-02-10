<?php
/**
 * Clase que genera etiquetas Ol que se utilizan para crear listas ordenadas
 */

class Ol
{

    protected $inicio;
    protected $medio;
    protected $cierre;
    protected $contenido;

    public function __construct(...$param)
    {
        $this->inicio="<ol ";
        switch (sizeof($param)){
            case 1:
                if($param[0]=="a" || $param[0]=="A" || $param[0]==1 || $param[0]=="i" || $param[0]=="I"){
                    $this->medio = "type='$param[0]'>\n";
                    $this->cierre = "</ol>\n";
                }else{
                    $this->medio = "type=''>\n";
                    $this->cierre = "</ol>\n";
                }
                break;
            default:
                $this->medio = "type=''>\n";
                $this->cierre = "</ol>\n";
                break;
        }
    }

    public function setId($id){
        $this->inicio="<ol id='$id' ";
    }

    public function setContenido(...$param)
    {
        foreach ($param as $valor) {
            $this->contenido = $this->contenido.$valor;
        }
    }


    public function __toString()
    {
        return $this->inicio.$this->medio.$this->contenido.$this->cierre;
    }


}
