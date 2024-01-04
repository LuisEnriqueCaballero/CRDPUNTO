
// class obtenerinformacion{
//     public function obtenerdatos($id){
//         $conectar=new conectar();
//         $con=$conectar->conexion();

//         $sql="SELECT Id_detalle,imagen1,imagen2,imagen3 FROM detalle_venta WHERE Id_detalle='$id'";
//         $query=mysqli_query($con,$sql);
//         $ver=mysqli_fetch_array($query);

//         $datos=array(
//             'Id_detalle'=>$ver[0],
//             'imagen1'=>$ver[1],
//             'imagen2'=>$ver[2],
//             'imagen3'=>$ver[3],
//         );
//         return $datos;
//     }
// }
