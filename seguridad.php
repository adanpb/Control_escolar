<?php
include 'bd.php';
function quitarcadena($cadena)
{
    $nopermitidos=array("'",'//','<','>',"\"",";");
    $cadena=str_replace($nopermitidos,"",$cadena);
    return $cadena;
}
?>
