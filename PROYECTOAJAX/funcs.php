<?php
    function login($usu,$pw)
    {
        $xml="";
       /* $mbd= new PDO('mysql:host=localhost;dbname=ajax',"root" );
        print_r($mbd->errorInfo()) ;
        $sql = "SELECT usuario FROM login WHERE usuario='$usu' AND contraseña='$pw'";
        echo $sql;
        $result = $mbd->query($sql);
        $row=$result->fetchAll();
        var_dump($row);
       if($result->rowCount()===1){
            $xml="<xml><status>OK</status></xml>";
        }else{
            $xml="<xml><status>FAIL</status></xml>";
        }*/

        return $xml;
    }

    function logoff(){
        header("Content-Type: text/xml");
        $xml = "<prueba>ok</prueba>";
        return $xml;
    }

    function insert(){
        header("Content-Type: application/json");
        $json='"mensaje":{
                status:ok;
        }';
    }

    function select(){
        header("Content-Type: application/json");
        $json='"mensaje":{
                status:ok;
        }';
    }

    function delete(){
        header("Content-Type: application/json");
        $json='"mensaje":{
                status:ok;
        }';
    }
