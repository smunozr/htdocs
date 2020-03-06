<?php


class BBDD
{
    const HOST = "localhost";
    const US = "root";
    const PW = "";
    const BBDD = "bodega";
    private $cnn;

    function __construct()
    {
        $this->cnn=mysqli_connect(self::HOST,self::US,self::PW,self::BBDD);
    }
}