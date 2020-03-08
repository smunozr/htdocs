<?php

class articulos
{

    function listarArticulos(){
        $a=new BBDD();
        $art=  $a->getArticulos();
        foreach ($art as $row){?>
            <div>
                <img src="<?php echo $row['imagen']?>" width="150px" height="200px">
                <h2><?php echo $row['nombre']?></h2>
                <h3>Stock: <?php echo $row['stock']?></h3>
                <form action="index.php" method="post">
                    <input type="number" name="cantidad" placeholder="cantidad" max="<?php echo $row['stock']?>">
                    <input type="hidden" name="func" value="5">
                    <input type="hidden" name="articulo" value="<?php echo $row['id_articulo']?>">
                    <input type="submit" value="Añadir">
                </form>
            </div>
        <?php
        }
    }
}