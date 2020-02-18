<?php

/**
 * Esta clase genera mediante la etiqueta HR una linea divisoria que separa zonas en el documento HTML
 */
class Hr
{
    public function __toString()
    {
        return "<hr/>\n";
    }

}