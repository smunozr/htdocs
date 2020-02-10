<?php


class HEAD
{
    private $value;

    public function __construct($titulo)
    {
        $this->value=$titulo;
    }

    public function __toString()
    {
        return "<head>"."\n"."<title>".$this->value."</title>"."\n"."</head>";
    }
}