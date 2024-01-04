<?php
class Odontologo{
    public function ObtenerdatOdontologo($id){
        $conectar=new conectar();
        $con=$conectar->conexion();

        $sql="SELECT DNI,DocumentoI, nombre, apellido FROM odontologo WHERE DNI='$id'";
        $query=mysqli_query($con,$sql);

        $ver=mysqli_fetch_array($query);

        $datos=array(
            'DNI'=>$ver[0],
            'DocumentoI'=>$ver[1],
            'datoOdontologo'=>$ver[3]." ".$ver[2],
        );
        return $datos;

    }
}
?>