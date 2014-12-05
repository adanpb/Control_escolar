<?php
    require('../bd.php');
    class Materias_grupo {
        private $id;
        private $idg;
        private $idm;
        private $idma;
        private $NombreP;
        private $Nombreg;
        private $Nombrem;

        public function showMaterias () {

            $user=$_COOKIE['usuario'];
            $idm=$user;

            echo"<center>
            <div>
                <form name=alumno action=ajaxMg.php method=Post name=accion id=accion target='_self'>
                    <table>
                        <tr><td><label>Grupo: </label></td><td>";
            //echo$sqlmat = "select * from asignar_materia as m, asignar_grupo as ag, grupo as g where m.idm=$idm and m.id=ag.idam and ag.idg=g.id";
            //echo$sqlmat = "select  DISTINCT g.id, g.nombre, m.id as idam from asignar_materia as m, asignar_grupo as ag, grupo as g where m.idm=$idm and m.id=ag.idam and ag.idg=g.id";
            $sqlmat = "select  DISTINCT g.id, g.nombre from asignar_materia as m, asignar_grupo as ag, grupo as g where m.idm=$idm and m.id=ag.idam and ag.idg=g.id";
            $executesqlmats = mysql_query ($sqlmat) or die ("Error en consulta de mostrar materias por grupo del maestro");
            echo"<select name=idg class='form-control'>";
            while($field = mysql_fetch_array($executesqlmats)){
                $this->id = $field['id'];
                $this->Nombreg =$field['nombre'];
                echo"<option value=$this->id > $this->Nombreg </option>";
            }
            echo"</select>";
            echo"</td></tr>
                        <tr><td colspan=2><center><input type=submit name=submit value=Seleccionar class='btn btn-info'> </input></center></td></tr>
                    </table>
                </form>
            </div>
         </center>";
        }
        public function readAsignarMateriasS($idg){

            $user=$_COOKIE['usuario'];
            $idm=$user;
            // echo"<br>ReadAsignarMateriaS";
            //$sqlrams = "select DISTINCT g.id, g.nombre, m.id as idam from asignar_materia as m, asignar_grupo as ag, grupo as g where m.id=ag.idam and ag.idg=g.id and g.id=$id";
           //$sqlrams = "select * from asignar_materia as m, asignar_grupo as ag, grupo as g, materia as mat where m.idma=$id and m.id=ag.idam and ag.idg=g.id and m.idma=mat.id";
            $sqlrams = "SELECT * FROM asignar_materia AS m, asignar_grupo AS ag, grupo AS g, materia AS mat WHERE m.idm=$idm AND g.id=$idg AND m.id=ag.idam AND ag.idg=g.id AND m.idma=mat.id";
            $executerams = mysql_query($sqlrams) or die ("Error en consulta de busqueda Especifica");
            echo"<div class=table-responsive>";
            echo"<table class=\"table table-striped\">";
            echo"<tr><td colspan=5 align=center>Lista de materias en grupo</td></tr>";
            echo"<tr><th>Materia</th></tr>";
            while($field = mysql_fetch_array($executerams)){
                $this->idg = $field['id'];
                $this->Nombrem =$field['Nombre'];
                echo"<tr><td>$this->Nombrem</td></tr>";
            }
            echo"</table>";
            echo"</div><br>";
        }
    }
?>