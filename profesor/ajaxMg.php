<?php
require ('Materias_grupo.php');
require ('accprof.php');
require ('header.php');
require ('menu.php');
$objmg = new Materias_grupo();
$idg = $_POST['idg'];
$objmg->readAsignarMateriasS($idg);
require('footer.php');
?>