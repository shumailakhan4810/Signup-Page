<?php
include("dbconnection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <?php
if(isset($_SESSION['username'])){
    if( ($_SESSION['last_time'] - time() )>60 ){
        header("Location:mylogin.php");
    }else{
        $_SESSION['last_time'] =time();

        echo "Welcome :".$_SESSION['username'];

    }

}else{
    header("Location:mylogin.php");
}

?>
<br>
<a href="dashboard2.php">Go to Dashboard</a>
</body>
</html>