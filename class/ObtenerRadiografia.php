<?php
class examenRadiologico{
    public function Obtenerexamen($id){
        $conectar=new conectar();
        $con= $conectar->conexion();

        $sql ="SELECT id_radiografia,tipo_examen,precio,punto_ganado FROM radiografia WHERE id_radiografia='$id'";

        $query=mysqli_query($con,$sql);

        $ver=mysqli_fetch_row($query);

        $dato=array(
            'id_radiografia'=>$ver[0],
            'tipo_examen'=>$ver[1],
            'precio'=>$ver[2],
            'punto_ganado'=>$ver[3],
        );
        return $dato;
    }
}
?>