<?php
$us=$_REQUEST ['Nombre']??"";
$apellido=$_REQUEST ['apelldio']??"";



if($us!=""&&$apellido!=""){
    ?>
    <form>
        <table align="center">
            <tr>
                <td>
                    <h1>Bienvenido</h1>
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
                    <label for="apell">Apellido:</label>
                </td>
                <td>
                    <input type="text" name="apelldio" id="apell">
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