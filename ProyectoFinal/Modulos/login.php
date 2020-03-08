<?php
include_once ("BBDD/BBDD.php");

class login
{
    function loggear($usu, $pwd){
        $a=new BBDD();
        $validado=false;
        if($a->login($usu, $pwd)==true){
            include_once ("loggout.html");
            $validado=true;
            $_SESSION["usuario"]=$usu;
            $_SESSION["tipo"]=$a->getTipo($usu);
        }else{
            include_once ("loggin.html");
        }
        unset($a);
        return $validado;
    }

    function loggout(){
        session_destroy();
        unset($_SESSION["usuario"]);
        unset($_SESSION["tipo"]);
        unset($_SESSION["carrito"]);
        include_once ("loggin.html");
    }

}