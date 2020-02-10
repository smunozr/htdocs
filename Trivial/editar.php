<?php ?>

    <form method="post" enctype="multipart/form-data" action="editar.php">
        <label>Introduce la pregunta:<input type="text" name="pregunta" required="required"></label><br/>
        <label>Introduce una opcion:<input type="text" name="opc1" required="required"></label><br/>
        <label>Introduce una opcion:<input type="text" name="opc2" required="required"></label><br/>
        <label>Introduce una opcion:<input type="text" name="opc3" required="required"></label><br/>
        <label>Introduce una opcion:<input type="text" name="opc4" required="required"></label><br/>
        <label>Introduce la imagen que se mostrara con la pregunta:<input type="file" accept="image/jpg,gif,png,jpeg" name="imagen"></label><br/>
        <label>selecciona la cual es la respuesta correcta<select name="respC" required="required"><br/>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select></label>
            <input type="submit" value="Enviar">
    </form>
    <a href="index.php"><button>Volver</button></a>
<?php
    if(isset($_REQUEST["pregunta"])){
        $preg=$_REQUEST["pregunta"];
        $opc1=$_REQUEST["opc1"];
        $opc2=$_REQUEST["opc2"];
        $opc3=$_REQUEST["opc3"];
        $opc4=$_REQUEST["opc4"];
        $destino="../imagenes";
        if($_FILES["imagen"]["name"]!=""){
            move_uploaded_file($_FILES["imagen"]["tmp_name"],$destino);
            $imagen=$destino."/".$_FILES["imagen"]["name"];
        }else{
            $imagen="imagenes/default.png";
        }
        $respC=$_REQUEST["respC"];
        $pregunta= array("pregunta"=>$preg, "opc1"=>$opc1, "opc2"=>$opc2, "opc3"=>$opc3, "opc4"=>$opc4, "imagen"=> $imagen, "respC"=>$respC);
        $fichero=fopen("fichero/preguntas.csv","a");
        fputcsv($fichero,$pregunta);
        fclose($fichero);

        echo "Pregunta guardada";

    }
