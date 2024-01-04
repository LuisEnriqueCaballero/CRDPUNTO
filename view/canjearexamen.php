<?php
session_start();
include_once "../config/conexion.php";
if (isset($_SESSION['odontologo'])) {
$conectar=new conectar();
$con=$conectar->conexion();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php include "../temp1/libcss.php"; ?>
        <title>Document</title>
    </head>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    
                    <?php include_once "../temp1/sidebar.php" ?>
                    <?php include_once "../temp1/menu.php" ?>
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h2 style="text-align:center;">LISTA DE TIPO DE EXAMEN RADIOGRAFICO</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="tablaequipo">
                                    <table class="table table-hover table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Numero</th>
                                                <th>Tipo Radiografia</th>
                                                <th>valor de puntos</th>
                                                <th>canjear</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM radiografia";
                                            $query = mysqli_query($con, $sql);
                                            $a = 0;
                                            while ($resultado = mysqli_fetch_array($query)) {
                                                $a++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td><?php echo $resultado['tipo_examen'] ?></td>
                                                    <td><?php echo $resultado['punto_canjeo'] ?></td>
                                                    <td><?php echo "<a href='canjeo.php?id_radiografia=" . $resultado['id_radiografia'] . "'><img src='../images/contorno.png' width='60px' height='30px'></a>" ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once "../temp1/finmenu.php" ?>
                    <?php include "../temp1/libjs.php" ?>

    </body>

    </html>
<?php
} else {
    header("location:login.php");
}
?>