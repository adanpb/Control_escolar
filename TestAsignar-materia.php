<?php
    require ('header.php');
    require ('menu.php');
    require ('asignar-materia.php');
    require ('bd.php');

    $objam = new asignatrMateria();

    if(isset($_REQUEST['accion'])){
        $accion = $_REQUEST['accion'];
    }else{
        $accion = 0;
    }
    if(isset($_REQUEST['idma'])){
        $idma = $_REQUEST['idma'];
    }else{
        $idma = 0;
    }
    if(isset($_REQUEST['idmat'])){
        $idmat = $_REQUEST['idmat'];
    }else{
        $idmat = 0;
    }

    switch($accion){
        case 0;
                $objam->seleccionaMaestro($idma);
            break;
        case 1;
                echo$idma;
                echo"<br>";
                $objam->createAsignarMateria($idma,$idmat);
                $objam->seleccionaMaestro($idma);
            break;
        case 2;
                $objam->deleteAsignarMateria($idma,$idmat);
                $objam->seleccionaMaestro($idma);
            break;
    }
    //$objam->readAsignarMateriaS();
/*
    echo"<center>
            <div>
                <form name=alumno action=ajax.php method=Post name=accion id=accion target='_self'>
                    <table>
                        <tr><td><label>Maestro(a)</label></td><td>";
                        $objam->showComboMaestro();
                        echo"</td></tr>
                        <tr><td colspan=2><center><input type=submit name=submit value=Seleccionar class='btn btn-info'> </input></center></td></tr>
                    </table>
                </form>
            </div>
         </center>";
*/


    require ('footer.php');
?>