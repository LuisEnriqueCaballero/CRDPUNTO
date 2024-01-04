<?php

include('../../include/conexion.php');
if($_REQUEST['empid']) {
	$sql = "SELECT Id_radiografia,precio,PUNTOS FROM radiografia WHERE Id_radiografia='".$_REQUEST['empid']."'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	
	$data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>
