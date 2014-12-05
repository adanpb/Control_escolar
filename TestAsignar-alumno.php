<?php
    require ('header.php');
    require ('menu.php');
    require ('asignar-alumno.php');
    $objaa = New AsignarAlumno();
    $objaa->showForm();
   /*
    echo"<br><br>";
    echo"<center>
            <div>
                    <form name=asalumno action=ajaxAsignar-alumno.php method=Post role='form'>
                        <table>
                            <tr><td><label>Grupo</label></td><td>";
                                $objaa->showCommbo();
                            echo"</td></tr>
                            <tr><td colspan=2><center><input type=submit name=submit value=Alta class='btn btn-info'> </input></center></td></tr>
                        </table>
                    </form>
             </div>
    </center>";*/

    require ('footer.php');

?>