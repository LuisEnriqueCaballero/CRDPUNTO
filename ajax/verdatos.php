<?php


include_once '../config/conexion.php';
$conectar = new conectar();
$con = $conectar->conexion();

$id = $_POST['id'];
$sql = "SELECT Id_detalle,imagen1,imagen2,imagen3 FROM detalle_venta WHERE Id_detalle='$id'";
$resultado = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($resultado)) {
    $detalle=$row[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/imagen.css">
    <link rel="stylesheet" href="../lib/bootstrap/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php
$imagen="../ajax/Archivos/<?php echo $row[0]?>/<?php echo $row[1]?>"
?>

<div class="lightbox">
  <div class="multi-carousel">
    <div class="multi-carousel-inner">
      <div class="multi-carousel-item">
        <?php if(strlen($row[1])!=0) {
            ?>
            <a href="../ajax/Archivos/<?php echo $row[0]?>/<?php echo $row[1];?>" download="../ajax/Archivos/<?php echo $row[0]?>/<?php echo $row[1];?>">
        <img
          src="../ajax/Archivos/<?php echo $row[0]?>/<?php echo $row[1];?>"
          class="w-100"
        />
        </a>
        <?php } else{?>
        <?php }?>
      </div>
      <br>
      <div class="multi-carousel-item">
      <?php if(strlen($row[2])!=0) {
            ?>
            
        <img 
        
          src="../ajax/Archivos/<?php echo $row[0]?>/<?php echo $row[2]?>"
          class="w-100"
        />
        
        <?php } else{?>
        <?php }?>
      </div>
      <br>
      <div class="multi-carousel-item">
      <?php if(strlen($row[3])!=0) {
        ?>
        <img
          src="../ajax/Archivos/<?php echo $row[0]?>/<?php echo $row[3]?>"
          class="w-100"
        >
        <?php } else{?>
        <?php }?>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<?php
}
?>