<?php
require('../bd.php');

class Alumno_grupo {
    private $idg;
    private $Nombreg;
    private $Nombrea;

    public function showGrupo () {

        $user=$_COOKIE['usuario'];
        $idm=$user;

        echo"<center>
            <div>
                <form name=alumnog action=ajaxMa.php method=Post name=accion target='_self'>
                    <table>
                        <tr><td><label>Grupo: </label></td><td>";
                            $sqlmat = "select  DISTINCT g.id, g.nombre from asignar_materia as m, asignar_grupo as ag, grupo as g where m.idm=$idm and m.id=ag.idam and ag.idg=g.id";
                            $executesqlmats = mysql_query ($sqlmat) or die ("Error en");
                            echo"<select name=idg class='form-control'>";
                            while($field = mysql_fetch_array($executesqlmats)){
                                $this->idg = $field['id'];
                                $this->Nombreg =$field['nombre'];
                                echo"<option value=$this->idg > $this->Nombreg </option>";
                            }
                        echo"</select>";
                        echo"</td></tr>
                        <tr><td colspan=2><center><input type=submit name=submit value=Seleccionar class='btn btn-info'> </input></center></td></tr>
                    </table>
                </form>
            </div>
         </center>";
    }

    public function readAlumnog($idg){


        $sqlrams = "SELECT CONCAT (u.Nombre, ' ', u.ApellidoPaterno, ' ', ApellidoMaterno) AS nombrea FROM usuario AS u, grupo AS g, asignar_alumno AS au WHERE au.idg=g.id AND au.idua=u.id AND g.id=$idg";
        $executerams = mysql_query($sqlrams) or die ("Error en consulta de busqueda Especifica");
        echo"<div class=table-responsive>";
        echo"<table class=\"table table-striped\">";
        echo"<tr><td colspan=5 align=center>Lista de alumnos en grupo</td></tr>";
        echo"<tr><th>Alumno</th></tr>";
        while($field = mysql_fetch_array($executerams)){
            $this->Nombrea =$field['nombrea'];
            echo"<tr><td>$this->Nombrea</td></tr>";
        }
        echo"</table>";
        echo"</div><br>";
    }

}

?>