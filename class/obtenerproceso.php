<?php
class llenarcampos{
    public function obtenerdatos($dni){
        $conectar=new conectar();
        $con=$conectar->conexion();

        $sql="SELECT Id_documento,nombre,apellido FROM paciente WHERE Id_documento='$dni'";
        $query= mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);

        $datos=array(
            'Id_documento'=>$ver[0],
            'datos'=>$ver[2].' '.$ver[1],
            
        );
        return $datos;
    }
}
?>