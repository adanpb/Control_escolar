<?php
    require ('Materias_grupo.php');
    require ('accprof.php');
    require ('header.php');
    require ('menu.php');
    $objmg = new Materias_grupo();

    $objmg->showMaterias();
    require('footer.php');
?>