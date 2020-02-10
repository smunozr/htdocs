<table border="4">
<?php
    $a=0;
    $b=0;
    for ($cont=1;cont<10;$cont++){
        $a++;
        for ($cont2=1;cont2<=10;$cont2++){
            echo "<tr><td>".($a."*".$b."=".($a*$b)."</td></tr>\n");
        }
    }

    ?>
</table>
