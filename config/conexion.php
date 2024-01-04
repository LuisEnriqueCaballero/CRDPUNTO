<?php

// $con = new mysqli("localhost", "centroradiologic", "crdigital99@", "centroradiologic_db_crdpunto2");
// if ($con->connect_errno) {
//     echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
// }else{
//     echo "conexion segura";
// } 



class conectar{
    private $server="localhost";
    private $user ="root";
    private $password="";
    private $data ="crdpunto1";
    public function conexion(){
        $con =mysqli_connect($this->server,$this->user,$this->password,$this->data);
        
        return $con;
    }
}

?>