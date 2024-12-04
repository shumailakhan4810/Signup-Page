<?php
include("dbconnection.php");
session_start();
// if(isset($_SESSION['username'])){
// header("Location:dashboard.php");
// }else{
//     header("Location:mylogin.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label >Username</label>
        <input type="text" name="username" require><br><br>

        <label >Password</label>
        <input type="text" name="password" require id = "ShowPass"><br><br>

        <input type="checkbox" onclick = "ShowPassword()" >
        <label for="">Show Password</label>


        <input type="submit" value="Login" name="loginBtn">
    </form>
<?php
if(isset($_POST['loginBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q= "SELECT * FROM signup  WHERE username = '$username' and password = '$password'";
    $run = mysqli_query($conn,$q);
    $total_rows= mysqli_num_rows($run);
    // echo $total_rows;
    if($total_rows==1){
        $_SESSION['username']=$username;
        $_SESSION['last_time']=time();
        header("Location:dashboard.php");
    }else{
        "<script>alert('User or Password is Incorrect')</script>";
    }

}
?>
<script>
function ShowPassword(){
    var a = document.getElementById("ShowPass");
    if(a.type == "password")
{
    a.type = "text";
}else{
    a.type = "password"; 
}
}


    </script>






</body>
</html>