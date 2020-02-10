<?php
$cartas=array(1,2,3);

if(!isset($_REQUEST["barajar"])){
    for($x=0;$x<3;$x++){
        echo $cartas[$x]." ";
    } ?>
    <form method="post" action="31.php">
        <input type="submit" name="barajar" value="Barajar">
        <input type="hidden" name="ent">
    </form>
<?php }elseif(isset($_REQUEST["ent"])){
    echo "O O O";?>
    <form method="post" action="31.php">
        <label>Introduce la posicion en la que crees que se encuentra el as:<input type="number" name="num"></label>
        <input type="hidden" name="barajar">
        <input type="submit" value="Enviar"  name="envi" >
    </form>
    <?php } elseif(isset($_REQUEST["envi"])){
    shuffle($cartas);
    $resp=$_REQUEST["num"]??"";
    for($x=0;$x<3;$x++){
        echo $cartas[$x]." ";
    }
    if($cartas[$resp-1]==1){
        echo "Has Acertado!!";
    }else{
        echo "Lo siento has perdido";
    }
}
?>





