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
        $cnn=mysqli_connect("localhost","root","","ajax");
        $sql = "SELECT usuario FROM login WHERE usuario='$usu' AND contraseña='$pw'";
        $res = mysqli_query($cnn, $sql);
        if (mysqli_num_rows($res)==1){
            $xml="<xml><status>OK</status></xml>";
            $_SESSION["login"]=true;
        }else{
            $xml="<xml><status>FAIL</status></xml>";
        }
        mysqli_close($cnn);
        return $xml;
    }

    function logoff(){
        header("Content-Type: text/xml");
        $xml = "";
        if($_SESSION["login"]==true){
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
        if ($_SESSION["login"]==true) {
            $cnn = mysqli_connect("localhost", "root", "", "ajax");
            $sql = "SELECT titulo, duracion FROM articulos";
            $res = mysqli_query($cnn, $sql);
            $result=mysqli_fetch_all($res);
            //var_dump($result);
            $json="{
                'Datos':{
                ";
           foreach ($result as $value){
                $json.="
                'pelicula':{
                    'titulo':'$value[0]',
                    'duracion':'$value[1]'
                },";
            }
           $json.="}
           }";
        }
        return $json;
    }

    function delete(){
        header("Content-Type: application/json");
        $json='"mensaje":{
                status:ok;
        }';
    }
