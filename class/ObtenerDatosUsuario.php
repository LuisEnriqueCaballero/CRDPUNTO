<?php
class usuario{
    public function obtenerdatousuario($idusuario){
        $conectar=new conectar();
        $con = $conectar->conexion();

        $sql="SELECT DNI,nombre,usuario,pasword,Id_empresa FROM usuario WHERE DNI='$idusuario'";

        $query=mysqli_query($con,$sql);

        $ver=mysqli_fetch_row($query);

        $datos=array(
            'DNI'=>$ver[0],
            'nombre'=>$ver[1],
            'usuario'=>$ver[2],
            'pasword'=>$ver[3],
            'Id_empresa'=>$ver[4],
        );
        return $datos;
    }
}
?>