<?php
    require ('bd.php');
    class AsignarAlumno {
        private $id;
        private $idg;
        private $idau;
        private $Nombreg;
        private $Nombreal;

        public function create_asAlumno ($idg) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero=$_POST["idau"];
                $count = count($numero);
                for ($i = 0; $i < $count; $i++) {
                    $numero[$i];
                    $insertaa = ("INSERT INTO asignar_alumno (idg, idua) VALUES ($idg, $numero[$i])");
                    $executeaa = mysql_query($insertaa) or die ("Error en consulta de asignar alumno");
                    $updateua = ("UPDATE usuario SET Estatus=2 WHERE id=$numero[$i]");
                    $execueteuau = mysql_query ($updateua) or die ("Error en acutalizar estatus de alumno");
                }
            }
        }
        public function readAsgnarAG ($idg){
            $searchaa = ("select u.id, concat(u.nombre,' ', u.ApellidoPaterno,' ',u.ApellidoMaterno) as ncompleto, aa.idg from usuario as u, asignar_alumno as aa where u.id=aa.idua and aa.idg=$idg");
            $executeaa = mysql_query($searchaa) or die("Error al buscarl los alumnos en grupo");
            echo"<div class=table-responsive>";/*etiquetas te bootstrap*/
            echo"<table class=\"table table-striped\">";/*Rayado*/
            echo"<tr><td colspan=5 align=center>Lista de alumnos asignados a Grupo</td></tr>";
            echo"<tr><th>Clave</th><th>Nombre</th><th>Opciones</th></tr>";
            while($field = mysql_fetch_array($executeaa)){
                $this->Id = $field['id'];
                $this->idg = $field['idg'];
                $this->Nombreal =$field['ncompleto'];
                echo"<tr><td>$this->Id</td><td>$this->Nombreal </td><td>
                    <form name=em action=ajaxAsignar-alumno.php method=Post role='form'>
                                                    <input type=hidden name=idau value=$this->Id>
                                                    <input type=hidden name=idg value=$this->idg>
                                                    <input type=submit name=submit value=Borrar class='btn btn-warning'> </input>
                                                </form>
                    </td></tr>";
            }
            echo"</table>";
            echo"</div><br>";
        }

        public function showForm()
        {
            echo"<br><br>";
            echo"<center>
            <div>
                    <form name=asalumno action=ajaxAsignar-alumno.php method=Post role='form'>
                        <table>
                            <tr><td><label>Grupo</label></td><td>";
                                    echo"<select name=idg class='form-control'>";
                                    $sqlbg = "SELECT * FROM grupo WHERE Estatus=1;";
                                    $executebg = mysql_query($sqlbg) or die ("Error en consulta de combo maestro");
                                    while($field = mysql_fetch_array($executebg)){
                                        $this->idg = $field['id'];
                                        $this->Nombreg = $field['nombre'];
                                        echo"<option value=$this->idg > $this->Nombreg </option>";
                                    }
                                    echo"</select>";
                                echo"</td></tr>
                            <tr><td colspan=2><center><input type=submit name=submit value=Alta class='btn btn-info'> </input></center></td></tr>
                        </table>
                    </form>
             </div>
             </center>";
        }
/*
        public function showCommbo()
        {
            echo"<select name=idg class='form-control'>";
            $sqlbg = "SELECT * FROM grupo WHERE Estatus=1;";
            $executebg = mysql_query($sqlbg) or die ("Error en consulta de combo maestro");
            while($field = mysql_fetch_array($executebg)){
                $this->idg = $field['id'];
                $this->Nombreg = $field['nombre'];
                echo"<option value=$this->idg > $this->Nombreg </option>";
            }
            echo"</select>";
        }
*/
        public function showForm_alumnnos($idg){
            echo"<center>
                <div>
                    <form name=ajax action=ajaxAsignar-alumno.php method=Post role='form'>
                        <div class=checkbox>
                           <table>";
                                $sqlsad = ("select id, concat(Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nacomp from usuario Where Nivel=3 and Estatus=1");
                                $executesqslsad = mysql_query($sqlsad) or die ("Error al mostrar usuarios disponibles");
                                while($field = mysql_fetch_array($executesqslsad)){
                                    $this->idau = $field['id'];
                                    $this->Nombreal = $field['nacomp'];
                                    echo"
                                        <tr><td><input type=checkbox name=idau[] value=$this->idau ><br></td><td>$this->idau $this->Nombreal <br></td></tr>";
                                }
                                echo" <tr><td colspan=2><center><input type=hidden name=idg value=$idg> </input> <input type=submit name=submit value=Asignar class='btn btn-info'> </input></center></td></tr>
                            </table>
                        </div>
                    </form>
                </div>
            </center>";
        }
        /*
        public function showCheckbox(){
            $sqlsad = ("select id, concat(Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nacomp from usuario Where Nivel=3 and Estatus=1");
            $executesqslsad = mysql_query($sqlsad) or die ("Error al mostrar usuarios disponibles");
            while($field = mysql_fetch_array($executesqslsad)){
                $this->idau = $field['id'];
                $this->Nombreal = $field['nacomp'];
                echo"
                    <tr><td><input type=checkbox name=idau[] value=$this->idau ><br></td><td>$this->idau $this->Nombreal <br></td></tr>";
            }
        }
        */
        public function deleteAlumno ($idau,$idg){
            $sqldeleteaa = "DELETE FROM asignar_alumno WHERE idua=$idau and idg=$idg;";
            $executesqdaa = mysql_query($sqldeleteaa) or die (" Error en consulta de eliminar alumno de grupo");
            $updateua2 = ("UPDATE usuario SET Estatus=1 WHERE id=$idau");
            $execueteuau2 = mysql_query ($updateua2) or die ("Error en acutalizar estatus de alumno");
        }
    }
?>