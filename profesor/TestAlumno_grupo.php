<?php
require ('Alumno_grupo.php');
require ('accprof.php');
require ('header.php');
require ('menu.php');
$objma = new Alumno_grupo();

$objma->showGrupo();
require('footer.php');
?>