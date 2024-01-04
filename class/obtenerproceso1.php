<?php
class ObtenerdatOdontologo{
    public function Odontologo($dni_odontologo){
        $conectar=new conectar();
        $con=$conectar->conexion();
        $sql="SELECT DNI,nombre,apellido FROM odontologo WHERE DNI='$dni_odontologo'";
        $query=mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);
        $datos=array(
            'DNI'=>$ver[0],
            'datos'=>$ver[2]." ".$ver[1],
        );
        return $datos;
    }
}
?>