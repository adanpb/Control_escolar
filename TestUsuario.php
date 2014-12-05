<?php
    /**
     * Created by PhpStorm.
     * User: Adan
     * Date: 12/09/14
     * Time: 06:08 PM
     */
    //require ('bd.php');
    require ('header.php');
    require ('menu.php');
    require ('Usuario.php');
    $obj = new Usuario();
    if(isset($_POST['submit'])){
        switch($_POST['submit']){
            case "Alta";
                echo"<br>Bot&oacute;n" .$_POST['submit'];
                $obj->createUsiario("$_POST[nombre]","$_POST[apellidop]","$_POST[apellidom]","$_POST[nivel]","$_POST[estatus]");
                break;
            case "Borrar";
                echo"<br>Bot&oacute;n" .$_POST['submit'];
                $obj->deleteUsiario($_POST['idm']);
                break;
            case "Modificar";
                echo"<br>Bot&oacute;n" .$_POST['submit'];
                $obj->updateUsiario($_POST['idmo']);
                break;
            case "Buscar";
                echo"<br>Bot&oacute;n" .$_POST['submit'];
                $obj->readUsiarioS($_POST['idb']);
                break;

        }
    }
    //$obj->createUsiario("Raul","Garcia","Mondragon",1,1);
    $obj->readUsiarioG();
 echo"<br><br>";
   //  $obj = new Usuario();
    echo"<center>
        <div>
                <form name=alumno action=TestUsuario.php method=Post role='form'>
                    <table>
                        <tr><td><label>Nombre(s)</label></td><td><input type=text name=nombre class='form-control'> </input></td></tr>
                        <tr><td><label>Apellido Paterno</label></td><td><input type=text name=apellidop class='form-control'> </input></td></tr>
                        <tr><td><label>Apellido Materno</label></td><td><input type=text name=apellidom class='form-control'> </input></td></tr>
                        <tr><td><label>Nivel</label></td><td><select name=nivel class='form-control'>
                                                    <option value=1>Administrador</option>
                                                    <option value=2>Maestro</option>
                                                    <option value=3>Alumno</option>
                                                </select></td></tr>
                        <tr><td colspan=2><center><input type=submit name=submit value=Alta class='btn btn-info'> </input></center></td></tr>
                        <tr><td colspan=2><label>ID: </label><input type=text name=idmo class='form-control'> </input> <input type=submit name=submit value=Modificar class='btn btn-warning' > </input> </td></tr>
                        <tr><td colspan=2><label>ID: </label><input type=text name=idm class='form-control'> </input> <input type=submit name=submit value=Borrar class='btn btn-warning' > </input> </td></tr>
                        <tr><td colspan=2><label>ID: </label><input type=text name=idb class='form-control'> </input> <input type=submit name=submit value=Buscar class='btn btn-warning' > </input> </td></tr>
                        <tr><td colspan=2><input type=hidden name=estatus value=1> </input></td></tr>
                    </table>
                </form>
         </div>
         </center>";

    require ('footer.php');
?>