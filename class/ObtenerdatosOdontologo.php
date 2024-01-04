<?php
class Odontologo{
    public function obtenerdatos($idodontologo){
        $conectar=new conectar();
        $con=$conectar->conexion();

        $sql="SELECT DNI,DocumentoI,Tipo_documento,nombre,apellido,fecha,sexo,telefono,correo_electronico,
        cop,clinica,departamento,provincia,distrito,direccion,usuario,pasword FROM odontologo WHERE DNI='$idodontologo'";
        $query=mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);

        $datos=array(
            'DNI'=>$ver[0],
            'DocumentoI'=>$ver[1],
            'Tipo_documento'=>$ver[2],
            'nombre'=>$ver[3],
            'apellido'=>$ver[4],
            'fecha'=>$ver[5],
            'sexo'=>$ver[6],
            'telefono'=>$ver[7],
            'correo_electronico'=>$ver[8],
            'cop'=>$ver[9],
            'clinica'=>$ver[10],
            'departamento'=>$ver[11],
            'provincia'=>$ver[12],
            'distrito'=>$ver[13],
            'direccion'=>$ver[14],
            'usuario'=>$ver[15],
            'pasword'=>$ver[16],
        );
        return $datos;
    }
}
?>