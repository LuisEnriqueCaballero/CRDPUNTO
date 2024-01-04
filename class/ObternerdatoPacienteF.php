<?php
class paciente{
    public function obtenerdatos($id){
        $conectar=new conectar();
        $con=$conectar->conexion();

        $sql ="SELECT Id_documento,DocumentoI,nombre,apellido FROM paciente WHERE Id_documento='$id'";
        $query=mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);
        $datos=array(
            'Id_documento'=>$ver[0],
            'DocumentoI'=>$ver[1],
            'datopaciente'=>$ver[3]." ".$ver[2],
            
        );
        return $datos;
    }
}
?>
