<?php
include_once ("BODY.php");
include_once ("HEAD.php");

class HTML
{
    private $body;
    private $head;

    public function __construct($body="",$head="")
    {
        $this->body=$body;
        $this->head=$head;
    }

    public function __toString()
    {
        return '<!DOCTYPE html>'."\n".'<html lang=\"en\">'."\n".$this->head."\n".$this->body."\n".'</html>';
    }
}