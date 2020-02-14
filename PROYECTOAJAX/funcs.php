<?php

    function logoff(){
        header("Content-Type: text/xml");
        $xml = "";
        if(isset($_SESSION["login"]) && $_SESSION["login"]==true){
            session_destroy();
            $xml="<xml><session>ABORTED</session></xml>";
        }else{
            $xml="<xml><session>FAIL</session></xml>";
        }
        return $xml;

    }

    function insert($id,$tituilo,$duracion){
        header("Content-Type: application/json");
        $json="";
       if($_SESSION["login"]==true){
            $cnn=mysqli_connect("localhost","root","","ajax");
            $sql="INSERT INTO articulos values ('$id','$tituilo','$duracion')";
            $result= mysqli_query($cnn, $sql);
            $json="{
            'Datos':{
                'id':'$id',
                'titulo':'$tituilo',
                'duracion':'$duracion'
                }
            }";
        }

        return $json;
    }

    function select(){
        header("Content-Type: application/json");
        $json="";
     //   if ($_SESSION["login"]==true) {
            $cnn = mysqli_connect("localhost", "root", "", "ajax");
            $sql = "SELECT titulo, duracion FROM articulos";
            $res = mysqli_query($cnn, $sql);
            $result=mysqli_fetch_all($res);
            $json='{"Peliculas":[';
           foreach ($result as $value){
                $json.='{"titulo":'.'"'.$value[0].'"'.',"duracion":'.'"'.$value[1].'"'."},";
            }
           $json=substr($json, 0, -1);
           $json.="]}";
       // }
        return $json;
    }

    function delete(){
        header("Content-Type: application/json");
        $json='"mensaje":{
                status:ok;
        }';
    }

    function loggear($usu,$pw){
        header("Content-Type: text/xml");
        $cnn=mysqli_connect("localhost","root","","ajax");
        $sql="SELECT usuario FROM sesion WHERE usuario='$usu' AND paswd='$pw'";
        $res=mysqli_query($cnn,$sql);

        if(mysqli_num_rows($res)==1){
            $_SESSION["login"]=true;
            $xml="<status>OK</status>";
        }else{
            $xml="<status>FAIL</status>";
        }
        return $xml;
    }
