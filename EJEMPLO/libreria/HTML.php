<?php


class HTML
{
    protected $head;
    protected $body;
    public function __construct($head,$body)
    {
        $this->head=$head;
        $this->body=$body;

    }

    public function __toString()
    {
        $cadena="<DOCTYPE html>\n<html lang='es'>\n".$this->head.$this->body."</html>";
        return $cadena;
    }
}