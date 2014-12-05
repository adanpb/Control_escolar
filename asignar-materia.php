<?php
    require('bd.php');
 class asignatrMateria {
    private $Id;
    private $idma;
    private $idmat;
    private $Nombre;

    public function createAsignarMateria($idma,$idmat){
        echo "createAsignarMateria";
        var_dump($_POST);//imprimir toda los datos que se envian al fomrulario
        $sql0 = "insert into asignar_materia (idm, idma) VALUES ($idma,$idmat)";
        $executesql0 = mysql_query($sql0) or die (" Error en consulta 0");
        /*$sqlrams = "select am.id as id, am.idm as idm, m.nombre as nomat from asignar_materia as am, materia as m, usuario as u WHERE u.id=am.idm and m.id=am.idma and am.idm=$idma;";
        $executerams = mysql_query($sqlrams) or die ("Error en consulta de busqueda Especifica");
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan=5 align=center>Lista de materias asignadas</td></tr>";
        echo"<tr><th>Materia</th><th>Opciones</th></tr>";
        while($field = mysql_fetch_array($executerams)){
            $this->Id = $field['id'];
            $this->idma =$field['idm'];
            $this->idmat =$field['nomat'];
            echo"<tr><td>$this->idmat</td><td>Eliminar</td></tr>";
        }
        echo"</table>";
        echo"</div><br>";
        */
    }
    public function readAsignarMateriaS($idma){
       // echo"<br>ReadAsignarMateriaS";
        $sqlrams = "select am.id as id, am.idm as idm, am.idma as idmm, m.nombre as nomat from asignar_materia as am, materia as m, usuario as u WHERE u.id=am.idm and m.id=am.idma and am.idm=$idma;";
        $executerams = mysql_query($sqlrams) or die ("Error en consulta de busqueda Especifica    sss");
        echo"<div class=table-responsive>";/*etiquetas te bootstrap*/
        echo"<table class=\"table table-striped\">";/*Rayado*/
        echo"<tr><td colspan=5 align=center>Lista de materias asignadas</td></tr>";
        echo"<tr><th>Materia</th><th>Opciones</th></tr>";
        while($field = mysql_fetch_array($executerams)){
            $this->Id = $field['id'];
            $this->idma =$field['idm'];
            $this->idmat =$field['idmm'];
            $this->nommat =$field['nomat'];
            echo"<tr><td>$this->nommat</td><td>   <form name=em action=ajax.php method=Post role='form'>
                                                    <input type=hidden name=idma value=$this->idma>
                                                    <input type=hidden name=idmat value=$this->idmat>
                                                    <input type=submit name=submit value=Eliminar class='btn btn-warning'> </input>
                                                </form>
                    </td></tr>";
        }
        echo"</table>";
        echo"</div><br>";
    }
    public function readAsignarMateriaid($idma){
       // echo"<br>ReadAsignarMateriaS";
        $sqlrams = "select am.id as id, am.idm as idm, m.nombre as nomat from asignar_materia as am, materia as m, usuario as u WHERE u.id=am.idm and m.id=am.idma and am.idm=$idma;";
        $executerams = mysql_query($sqlrams) or die ("Error en consulta de busqueda Especifica");
        echo"<div class=table-responsive>";/*etiquetas te bootstrap*/
        echo"<table class=\"table table-striped\">";/*Rayado*/
        echo"<tr><td colspan=5 align=center>Lista de materias asignadas</td></tr>";
        echo"<tr><th>Materia</th><th>Opciones</th></tr>";
        while($field = mysql_fetch_array($executerams)){
            $this->Id = $field['id'];
            $this->idma =$field['idm'];
            $this->idmat =$field['nomat'];
            echo"<tr><td>$this->idmat</td><td>Eliminar</td></tr>";
        }
        echo"</table>";
        echo"</div><br>";
    }


    public function seleccionaMaestro($idma){
        echo"<center>
            <div>
                <form name=alumno action=ajax.php method=Post name=accion id=accion target='_self'>
                    <table>
                        <tr><td><label>Maestro(a)</label></td><td>";
                            $sqlutm = "UPDATE materia SET Estatus=1;";
                            $executeutm = mysql_query($sqlutm) or die ("Error en consulta de combo maestro");
                            echo"<select name=idma class='form-control'>";
                            $sqlbm = "SELECT * FROM Usuario WHERE Nivel=2 and Estatus=1;";
                            $executebm = mysql_query($sqlbm) or die ("Error en consulta de combo maestro");
                            while($field = mysql_fetch_array($executebm)){
                                $this->idma = $field['id'];
                                $this->Nombre = $field['Nombre'];
                                echo"<option value=$this->idma > $this->Nombre </option>";
                            }
                            echo"</select>";
                            echo"</td></tr>
                        <tr><td colspan=2><center><input type=submit name=submit value=Seleccionar class='btn btn-info'> </input></center></td></tr>
                    </table>
                </form>
            </div>
         </center>";
    }

    public function showComboMaestro(){
        $sqlutm = "UPDATE materia SET Estatus=1;";
        $executeutm = mysql_query($sqlutm) or die ("Error en consulta de combo maestro");
        echo"<select name=idma class='form-control'>";
        $sqlbm = "SELECT * FROM Usuario WHERE Nivel=2 and Estatus=1;";
        $executebm = mysql_query($sqlbm) or die ("Error en consulta de combo maestro");
        while($field = mysql_fetch_array($executebm)){
            $this->idma = $field['id'];
            $this->Nombre = $field['Nombre'];
            echo"<option value=$this->idma > $this->Nombre </option>";
        }
        echo"</select>";
    }

    public function seleccionarMateria($idma){
        echo"<center>
                <div>
                    <form action=TestAsignar-materia.php method=Post name=maestro id=maestro target='_self'>
                        <table>
                            <tr><td><label>Materia</label></td><td>";
                                $sqlbmaam = "select * from asignar_materia where idm=$idma;";
                                $executebmaam = mysql_query($sqlbmaam) or die ("Error en consulta de combo maestro");
                                $filas1 = mysql_num_rows($executebmaam);
                                for($z=0; $z<$filas1; $z++){
                                    $idmatt = mysql_result($executebmaam,$z,'idma');
                                    $sqlum = "update materia set Estatus=(2) where id=$idmatt;";
                                    $executeum = mysql_query($sqlum) or die ("Error en consulta de actualizar materias");
                                }
                                echo"<select name=idmat class='form-control'>";
                                $sqlbma = "select * from materia where Estatus=1;";
                                $executebma = mysql_query($sqlbma) or die ("Error en consulta de combo maestro");
                                $filas11 = mysql_num_rows($executebma);
                                for($zz=0; $zz<$filas11; $zz++){
                                    $idmat = mysql_result($executebma,$zz,'id');
                                    $nombreuma = mysql_result($executebma,$zz,'nombre');
                                    echo"<option value=$idmat>$nombreuma</option>";
                                }
                                echo"</select> ";
                                echo"</td></tr><input type=hidden name=idma value=$idma> </input>    <input type=hidden name=accion value=1> </input>
                            <tr><td colspan=2><center><input type=submit name=submit value=Asignar class='btn btn-info'> </input></center></td></tr>
                        </table>
                    </form>
                </div>
             </center>";
    }

    public function showComboMateria($idma){
        $sqlbmaam = "select * from asignar_materia where idm=$idma;";
        $executebmaam = mysql_query($sqlbmaam) or die ("Error en consulta de combo maestro");
        $filas1 = mysql_num_rows($executebmaam);
        for($z=0; $z<$filas1; $z++){
            $idmatt = mysql_result($executebmaam,$z,'idma');
            $sqlum = "update materia set Estatus=(2) where id=$idmatt;";
            $executeum = mysql_query($sqlum) or die ("Error en consulta de actualizar materias");
        }
        echo"<select name=idmat class='form-control'>";
        $sqlbma = "select * from materia where Estatus=1;";
        $executebma = mysql_query($sqlbma) or die ("Error en consulta de combo maestro");
        $filas11 = mysql_num_rows($executebma);
        for($zz=0; $zz<$filas11; $zz++){
            $idmat = mysql_result($executebma,$zz,'id');
            $nombreuma = mysql_result($executebma,$zz,'nombre');
                echo"<option value=$idmat>$nombreuma</option>";
        }
        echo"</select> ";
    }

    public function deleteAsignarMateria($idma,$idmat){
        echo "createAsignarMateria";
        $sqldeleteam = "DELETE FROM asignar_materia WHERE idm=$idma AND idma=$idmat;";
        $executesqdam = mysql_query($sqldeleteam) or die (" Error en consulta 0");
    }
}
?>