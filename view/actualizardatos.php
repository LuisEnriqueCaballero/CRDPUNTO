<?php
session_start();
if(isset($_SESSION['odontologo'])){

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include "../temp1/libcss.php";?>
    <title>Document</title>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                
                <?php include_once "../temp1/sidebar.php" ?>
                <?php include_once "../temp1/menu.php" ?>
                <div class="container">
                    
                </div>
                <?php include_once "../temp1/finmenu.php" ?>
                <?php include "../temp1/libjs.php" ?>
                
</body>

</html>
<?php
}else{
    header("location:login.php");
}
?>