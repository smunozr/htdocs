<?php
$us=$_REQUEST ['Nombre']??"";
$pw=$_REQUEST ['passw']??"";
$cerrarSess=$_REQUEST['cerrar']??false;

    if($cerrarSess!=false) {unset($_SESSION['usuario']);unset($_SESSION['tipo']);};
    if(isset($_SESSION['usuario'])||validarUsuario($us,$pw)==true){
        ?>
        <form method="post" action="index.php">
            <table align="center">
                <tr>
                    <td>
                        <?php echo ("Sesion Iniciada");?>
                        <input type="submit" value="Cerrar sesion" name="Csesion">
                        <input type="hidden" value="true" name="cerrar">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    else{
       ?>
        <form method="post">
            <table align="center">
             <tr>
                <td>
                    <label for="Name">Nombre:</label>
                </td>
                <td>
                    <input type="text" name="Nombre" id="Name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pass">Constraseña:</label>
                </td>
                <td>
                    <input type="password" name="passw" id="pass">
                </td>
            <tr/>
            <tr>
                <td>
                    <input type="submit">
                </td>
            </tr>
            </table>
        </form>
<?php    }; ?>






