<?php
    require('header.php');
    require('menu.php');
    require('asignar-alumno.php');
    $objaa = New AsignarAlumno();
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case "Asignar";
                echo"<br>Bot&oacute;n" .$_POST['submit'];
                $objaa->create_asAlumno($_POST['idg']);
                break;
            case "Borrar";
                echo"<br>Bot&oacute;n" .$_POST['submit'];
                $objaa->deleteAlumno($_POST['idau'],$_POST['idg']);
                break;
        }
    }
    $ne= $_POST['ne'];
    $n
	e= $_POST['es'];
    $dir= $_POST['dir'];
    $objaa->readAsgnarAG($idg);
    $objaa->showForm_alumnnos($idg);
    /*
    echo"<center>
        <div>
            <form name=ajax action=ajaxAsignar-alumno.php method=Post role='form'>
                <div class=checkbox>
                   <table>
                       ";
                        $objaa->showCheckbox();
                        echo" <tr><td colspan=2><center><input type=hidden name=idg value=$idg> </input> <input type=submit name=submit value=Asignar class='btn btn-info'> </input></center></td></tr>
                    </table>
                </div>
            </form>
        </div>
    </center>";
    */

    require('footer.php');
?>