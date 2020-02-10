<?php
/**
 * Clase que genera etiquetas Td para rellenar las Tr de una tabla.
 * Contiene metodos para generar atributos y contenido de cada celda.
 */

class Td
{
    protected $inicio;
    protected $medio;
    protected $cierre;
    protected $contenido;

    public function __construct()
    {
        $this->inicio="<td ";
        $this->medio=">\n";
        $this->contenido="\n";
        $this->cierre="</td>\n";
    }

    public function setAtributos(...$param){
        $atributos="";
        foreach ($param as $valor){
            $atributos=$atributos." ".$valor;
        }
        $this->medio=$atributos.$this->medio;
    }

    public function setContenido($contenido){
        $this->contenido=$contenido;
    }

    public function __toString(){
        return $this->inicio.$this->medio.$this->contenido.$this->cierre;
    }
}