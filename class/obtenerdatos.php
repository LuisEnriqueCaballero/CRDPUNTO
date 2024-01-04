<?php
class ObtenerDatos{
    public function obtenerdato($idPaciente){
        $conectar=new conectar();
        $con=$conectar->conexion();
        $sql="SELECT Id_documento,DocumentoI,nombre,apellido FROM paciente WHERE DocumentoI='$idPaciente'";
        $query=mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);
        
        $datos=array(
            'Id_documento'=>$ver[0],
            'DocumentoI'=>$ver[1],
            'datos'=>$ver[3]." ".$ver[2],
    );
        return $datos;
    }
}
?>
