<?php
class implante{
    public function obtenerdatos($idimplante){
        $conexion=new conectar();
        $con=$conexion->conexion();

        $sql="SELECT id_implante,marca_implante,modelo_implante,precio,cantidad,punto_ganado,punto_canjeo,descripcion FROM implante WHERE id_implante='$idimplante'";

        $query=mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);
        $datos=array(
            'id_implante'=>$ver[0],
            'marca_implante'=>$ver[1],
            'modelo_implante'=>$ver[2],
            'precio'=>$ver[3],
            'cantidad'=>$ver[4],
            'punto_ganado'=>$ver[5],
            'punto_canjeo'=>$ver[6],
            'descripcion'=>$ver[7],
        );
        return $datos;
    }
}
?>