
<?php
    $nombre=$_REQUEST["nombre"]??"";
    $respuesta=$_REQUEST["number"]??"";


 if(!isset($_REQUEST["number"])){?>
<form>
    <label>Introduce tu nombre:<input type="text" name="nombre"></label>
    <label>Introduce el numero:<input type="number" name="number"></label>
    <label><input type="submit" value="Enviar" name="send"></label>
</form>

<?php }else{
     $aleatorio1=0;
     $aleatorio2=0;

     $aleatorio1=$aleatorio1.random_int(1,6);
     $aleatorio2=$aleatorio2.random_int(1,6);
    $total=$aleatorio2+$aleatorio1;
     echo "suerte $nombre </br>";
     if( $total==$respuesta){
         echo "enhorabuena, has acertado";
     }else{
         echo "vaya has fallado el numero era:&nbsp $total";

     }
 }?>