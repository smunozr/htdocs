<?php


class BODY
{
    private $value;
    public function __construct()
    {
        $this->value="HOLA MUNDO";
    }

    public  function __toString()
    {
        return "<body>"."\n".$this->value."\n"."</body>";
    }
}