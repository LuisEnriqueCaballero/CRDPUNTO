<?php
class Obtener{
    public function ObtenerDatos($idempresa){
        $conectar =new conectar();
        $con=$conectar->conexion();

        $sql ="SELECT id_empresa,nombre,descripcion FROM empresa WHERE id_empresa='$idempresa'";
        $query=mysqli_query($con,$sql);
        $ver = mysqli_fetch_row($query);

        $datos=array(
            'id_empresa'=>$ver[0],
            'nombre'=>$ver[1],
            'descripcion'=>$ver[2],
            
        );
        return $datos;
    }
}
?>