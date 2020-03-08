<?php
include_once "BBDD/BBDD.php";
include_once "carrito.php";

class pedidos
{

    function confirmarPedido($carrito,$usuario){
        $bbdd=new BBDD();
        $id_ped=$bbdd->getLastpedido()+1;
        $fecha=$this->getFecha();
        $coste=$this->calcCantidadTotal($carrito);
        $cantidad=0;
        foreach ($carrito as $value){
            $cantidad=$cantidad+$value["articulo"]["cantidad"];
        }
       $conf= $bbdd->setPedido($id_ped,$usuario,$cantidad,$fecha,$coste,$carrito);
        return $conf;
    }

    function calcCantidadTotal($carrito){
        $bbdd=new BBDD();
        $total=0;
        foreach ($carrito as $value){
            $a=$bbdd->getPrecio($value["articulo"]["id"]);
            $a=$a*$value["articulo"]["cantidad"];
            $total=$total+$a;
        }
        unset($bbdd);
        return $total;
    }

    function getFecha(){
        $fecha=getdate();
        $fech=$fecha["mday"]."/".$fecha["month"]."/".$fecha["year"];
        return $fech;
    }

    function listarPedidos($usu)
    {
        $bbdd = new BBDD();
        $ped = $bbdd->getPedidos($usu);?>
        <form method="post">
        <select name="pedConsultar" onchange="this.form.submit('index.php')">
        <option>SELECCIONA UN PEDIDO</option>
        <?php
        foreach ($ped as $value)
                echo '<option value="' . $value["id_pedido"] . '">' . $value["fecha"] . "</option>"."\n";
            ?>
        </select>
    </form>
<?php
    }
    function verPedido($id){
        echo "entra";
        $bbdd=new BBDD();
        $idArt=$bbdd->getArtPedido($id);
        foreach ($idArt as $row) {
            $b=$bbdd->getArticuloCarrito($row["id_articulo"]);
            ?>
            <div>
                <img src="<?php echo $b['imagen'] ?>" width="150px" height="200px">
                <h2><?php echo $b['nombre'] ?></h2>
                <p>Cantidad:<?php echo $row['cantidad'] ?></p>
            </div>
            <?php
        } ?>
        <?php
    }

}