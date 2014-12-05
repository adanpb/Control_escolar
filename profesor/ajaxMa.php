<?php
require ('Alumno_grupo.php');
require ('accprof.php');
require ('header.php');
require ('menu.php');
$objma = new Alumno_grupo();
$idg = $_POST['idg'];
$objma->readAlumnog($idg);
require('footer.php');
?>