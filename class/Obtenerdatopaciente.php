<?php
class paciente{
    public function obtenerdatos($idpaciente){
        $conectar=new conectar();
        $con=$conectar->conexion();

        $sql ="SELECT Id_documento,DocumentoI,Tipo_documento,nombre,apellido,telefono,sexo,edad,correo_electronico,
        Departamento,provincia,distrito,direccion FROM paciente WHERE Id_documento='$idpaciente'";
        $query=mysqli_query($con,$sql);
        $ver=mysqli_fetch_row($query);
        $datos=array(
            'Id_documento'=>$ver[0],
            'DocumentoI'=>$ver[1],
            'Tipo_documento'=>$ver[2],
            'nombre'=>$ver[3],
            'apellido'=>$ver[4],
            'telefono'=>$ver[5],
            'sexo'=>$ver[6],
            'edad'=>$ver[7],
            'correo_electronico'=>$ver[8],
            'Departamento'=>$ver[9],
            'provincia'=>$ver[10],
            'distrito'=>$ver[11],
            'direccion'=>$ver[12]
        );
        return $datos;
    }
}
?>
