<?php


class BODY
{
    private $value;
    public function __construct()
    {
        $this->value="";
    }
    public function addContent($param){
        $this->value.=$param;
    }
    public  function __toString()
    {
        return "<body>"."\n".$this->value."\n"."</body>";
    }
}