<?php
    require('header.php');
    require('menu.php');
    require ('asignar-materia.php');
    require ('bd.php');
    $objam = new asignatrMateria();
    $idma = $_POST['idma'];
    $objam->readAsignarMateriaS($idma);
    $objam->seleccionarMateria($idma);
?>