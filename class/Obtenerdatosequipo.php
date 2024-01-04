<?php
class equipo{
    public function Obtenerdatos($id){
        $conectar=new conectar();
        $con=$conectar->conexion();

        $sql="SELECT id_equipo,marca_equipo,modelo_equipo,precio,cantidad,descripcion,punto_canjeo,punto_ganado FROM equipo WHERE id_equipo='$id'";
        $query=mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);

        $datos=array(
            'id_equipo'=>$ver[0],
            'marca_equipo'=>$ver[1],
            'modelo_equipo'=>$ver[2],
            'precio'=>$ver[3],
            'cantidad'=>$ver[4],
            'descripcion'=>$ver[5],
            'punto_canjeo'=>$ver[6],
            'punto_ganado'=>$ver[7],     
        );
        return $datos;
    }
}
?>