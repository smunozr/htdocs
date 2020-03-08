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
        $this->cnn = mysqli_connect(self::HOST, self::US, self::PW, self::BBDD);
    }

    function login($usu, $pw)
    {
        $usu=html_entity_decode(trim(strip_tags($usu)));
        $pw=html_entity_decode(trim(strip_tags($pw)));
            $validado=false;
            $sql = "SELECT usuario FROM clientes WHERE usuario='$usu' AND contraseña='$pw'";
            $row = mysqli_query($this->cnn, $sql);

            if (mysqli_num_rows($row)==1){
                $res=mysqli_fetch_assoc($row);
                $validado=true;
            }
            return $validado;
    }
    function getTipo($usu){
        $sql = "SELECT tipo FROM clientes WHERE usuario='$usu'";
        $row = mysqli_query($this->cnn, $sql);
        $res=mysqli_fetch_assoc($row);
        $res=$res["tipo"];
        return $res;
    }
    function getArticulos(){
        $sql="SELECT * FROM articulos";
        $row= mysqli_query($this->cnn,$sql);
       while ($result=mysqli_fetch_assoc($row)){
           $res[]=$result;
       }
        return $res;
    }

    function getArticuloCarrito($id){
        $sql="SELECT * FROM articulos WHERE id_articulo='$id'";
        $row=mysqli_query($this->cnn,$sql);
        $res=mysqli_fetch_assoc($row);

        return $res;
    }

    function getPedidos($usuario){
        $sql="SELECT fecha, id_pedido FROM pedidos WHERE usuario='$usuario'";
        $row=mysqli_query($this->cnn,$sql);
        while ($result=mysqli_fetch_assoc($row)){
            $res[]=$result;
        }
        return $res;
    }

    function getLastpedido(){
        $sql="SELECT MAX(id_pedido) FROM pedidos";
        $row=mysqli_query($this->cnn,$sql);
        $result=mysqli_fetch_assoc($row);
        $result=$result["MAX(id_pedido)"];
        return $result;
    }

    function getArtPedido($pedido){
        $sql="SELECT id_articulo, cantidad FROM ped_art WHERE id_pedido='$pedido'";
        $row=mysqli_query($this->cnn,$sql);
        while ($result=mysqli_fetch_assoc($row)){
            $res[]=$result;
        }
        return $res;
    }

    function getArticulosMuestra($articulos){
        foreach ($articulos as $value){
            $sql= "SELECT nombre, imagen, stock FROM articulos WHERE id_articulo='$value'";
            $row=mysqli_query($this->cnn,$sql);
            $res[]=mysqli_fetch_assoc($row);
        }
        return $res;
    }

    function getPrecio($id){
        $sql="SELECT precio FROM articulos where id_articulo='$id'";
        $row=mysqli_query($this->cnn,$sql);
        $res=mysqli_fetch_assoc($row);
        $res=$res["precio"];
        return $res;
    }
    function setPedido($id,$usuario,$articulosN,$fecha,$coste,$carrito){
        $introducido=false;
        $sql="INSERT INTO pedidos VALUES ('$id','$usuario','$articulosN','$fecha','$coste')";
        $row=mysqli_query($this->cnn,$sql);
        foreach ($carrito as $value){
            $id_art=$value["articulo"]["id"];
            $canti=$value["articulo"]["cantidad"];
            $sql="INSERT INTO ped_art values ('$id','$id_art','$canti')";
            $row2=mysqli_query($this->cnn,$sql);
        }
        $this->elimarStock($carrito);
        if($row==true && $row2==true){
            $introducido=true;
        }
        return $introducido;
    }

    function __destruct()
    {
        mysqli_close($this->cnn);
        $this->cnn=null;
    }

    function elimarStock($carrito){
        foreach ($carrito as $value){
            $cantidad=0;
            $id=$value["articulo"]["id"];
            $sql1="SELECT stock FROM articulos WHERE id_articulo='$id'";
            $row=mysqli_query($this->cnn,$sql1);
            $cantidad=mysqli_fetch_assoc($row);
            $cantidad=$cantidad["stock"]-$value["articulo"]["cantidad"];
            $sql2= "UPDATE articulos SET stock='$cantidad' where id_articulo='$id'";
            mysqli_query($this->cnn,$sql2);
        }
    }
}