<?php

require ('bd.php');
/**
 * Created by PhpStorm.
 * User: Adan
 * Date: 12/09/14
 * Time: 06:00 PM
 */
class Usuario {
    private $Id;
    private $Nombre;
    private $Apellido_Paterno;
    private $Apellid_Materno;
    private $Telefono;
    private $Calle;
    private $Numero_Exterior;
    private $Numero_Interior;
    private $Colonia;
    private $Municipio;
    private $Estado;
    private $CP;
    private $Correo;
    private $Usuario;
    private $Contraseña;
    private $Nivel;
    private $Estatus;

    public function createUsiario($nombre,$apellidop,$apellidom,$nivel,$estatus){
        echo "createUsuario";
        $insert01 = "Insert into usuario (Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus)
                        VALUES ('$nombre','$apellidop','$apellidom',$nivel,$estatus)";
        $execute01 = mysql_query($insert01) or die ("Error $insert01");
    }

    public function readUsiarioG(){
        echo "readUsuarioG";
        $sql0 = "select* from usuario ORDER BY ApellidoPaterno ASC";
        $result01 = mysql_query($sql0) or die ("Error en consulta 0");

        echo"<div class=table-responsive>";/*etiquetas te bootstrap*/
        echo"<table class=\"table table-striped\">";/*Rayado*/
        echo"<tr><td colspan=5 align=center>Lista de usuarios</td></tr>";
        echo"<tr><th>Id</th><th>Nombre</th><th>Apellido P</th><th>Apellido M</th><th>Nivel</th></tr>";
        while($field = mysql_fetch_array($result01)){
            $this->Id = $field['id'];
            $this->Nombre =$field['Nombre'];
            $this->Apellido_Paterno =$field['ApellidoPaterno'];
            $this->Apellid_Materno =$field['ApellidoMaterno'];
            /*
            $this->Nombre =utf8_decode($field['Nombre']);
            $this->Apellido_Paterno =utf8_decode($field['ApellidoPaterno']);
            $this->Apellid_Materno =utf8_decode($field['ApellidoMaterno']);
            */
            $this->Nivel = $field['Nivel'];

            switch($this->Nivel){
                case 1;
                        $type = "Administrador";
                    break;
                case 2;
                        $type = "Maestro";
                    break;
                case 3;
                        $type = "Alumno";
                    break;
            }
            echo"<tr><td>$this->Id</td><td>$this->Nombre</td><td>$this->Apellido_Paterno</td><td>$this->Apellid_Materno</td><td>$type</td></tr>";

            /*
            echo"<br>Id: ".$this->Id;
            echo"<br>Nombre: ".$this->Nombre;
            echo"<br>Apellido P: ".$this->Apellido_Paterno;
            echo"<br>Apellido M: ".$this->Apellid_Materno;
            echo"<br>Nivel: ".$this->Nivel;
            */
        }
        echo"</table>";
        echo"</div>";
    }

    public function readUsiarioS($id){
        echo "readUsuarioS";
        $sql1 = "select* from usuario where id=$id ORDER BY ApellidoPaterno ASC";
        $result02 = mysql_query($sql1) or die ("Error en consulta 0");
        while($field = mysql_fetch_array($result02)){
            $this->Id = $field['id'];
            $this->Nombre =utf8_decode($field['Nombre']);
            $this->Apellido_Paterno =utf8_decode($field['ApellidoPaterno']);
            $this->Apellid_Materno =utf8_decode($field['ApellidoMaterno']);
            $this->Nivel = $field['Nivel'];
            echo"<br>Id: ".$this->Id;
            echo"<br>Nombre: ".$this->Nombre;
            echo"<br>Apellido P: ".$this->Apellido_Paterno;
            echo"<br>Apellido M: ".$this->Apellid_Materno;
            echo"<br>Nivel: ".$this->Nivel;
        }
    }

    public function updateUsiario($id){
        echo"<br>UPDATE Usuario";
        $update01 = "UPDATE usuario SET Nivel = 2 WHERE id =$id;";
        $execute02 = mysql_query($update01) or die ("Error $update01");
    }

    public function deleteUsiario($id){
        echo"<br>DELETE Usuario";
        $delete01 = "delete from usuario where id=$id;";
        $execute03 = mysql_query($delete01) or die ("Error $delete01");
    }
}
?>

