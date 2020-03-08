<?php


class carrito
{
    function añadirArticulo($articulo, $cantidad)
    {
        $arr = array("articulo" =>
            array("id" => $articulo, "cantidad" => $cantidad)
        );
        $_SESSION["carrito"][] = $arr;
    }

    function destCarrito(){
        $_SESSION["carrito"]=null;
    }

    function listarCarrito($carro){
        $bbdd=new BBDD();
        $carrito=$carro;
        //GET ARTICULO
        foreach ($carrito as $row) {
            $b=$bbdd->getArticuloCarrito($row["articulo"]["id"]);
            ?>
            <div>
                <img src="<?php echo $b['imagen'] ?>" width="150px" height="200px">
                <h2><?php echo $b['nombre'] ?></h2>
                <p>Cantidad:<?php echo $row["articulo"]['cantidad'] ?></p>
            </div>
            <?php
        } ?>
        <form method="post" action="index.php">
            <input type="hidden" value="6" name="func">
            <input type="submit" value="Confirmar pedido">
        </form>
    <?php
        unset($bbdd);
    }

}