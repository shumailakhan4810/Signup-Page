<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin:auto;
            height:400px;
            width:300px;
        }
    </style>
</head>
<body>
    <!-- <center style="margin = 120px"> -->
    <h1>Signup Form</h1>
    <form action="" method="post" name="f">
        <table border="1" cellspacing="0">
            <tr>
                <td colspan=2 align="center">Signup Form</td>
            </tr>
            <tr>
                <td><label>FirstName</label></td>
                <td><input type="text" name="fname" require></td>
            </tr>
            <tr>
                <td><label>LastName</label></td>
                <td><input type="text" name="lname" require></td>
            </tr>
            <tr>
                <td><label>Gender</label></td>
                <td><select name="gender" require style="width:165px">
                    <option value="">select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select></td>
            </tr>
            <tr>
                <td><label>Age</label></td>
                <td ><input type="number" name="age" min="10" max="50"  require style="width:165px";></td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td><input type="text" pattern="^[A-Za-z\d]+(?:[_%+][A-Za-z\d]+)*@[a-z]+\.[a-z]{2,4}$" title="Invalid Email"  name="email" require></td>
            </tr>
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" name="username" require></td>
            </tr>
            <tr>
                <!-- uppercase lowercase number symbols and 8 min character -->
                <td><label>Password</label></td>
                <td><input type="text" pattern="^[\dA-Za-z\W_]+$"name="password"title="uppercase lowercase number symbols and 8 min character"  require></td>
            </tr>
            <tr>
                <td><label>ConfirmPassword</label></td>
                <td><input type="text"  name="Confirmpassword" require></td>
            </tr>
            <tr>
                <td colspan=2 align="center"><input type="submit" value="signup" onclick =" return check()" name="signupBtn"></td>
            </tr>
             </table>
    </form>
   
<?php

    if(isset($_POST['signupBtn'])){
        $firstname=$_POST['fname'];
        $lastname=$_POST['lname'];
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];

              $q="INSERT INTO `signup`(`firstname`, `lastname`, `gender`, `age`, `email`, `username`, `password`) VALUES ('$firstname','$lastname','$gender','$age','$email','$username','$password')";
        $run=mysqli_query($conn,$q);
        if($run){
            echo "<script>alert('Registeration Successfully')</script>";
            echo "<script>alert('username is : ".$username." and password is : ".$password.")</script>";
            // header("Location:signup.php");
            echo "<script>
            window.location.href= 'mylogin.php';
            </script>";
        }
    }
?>
<script>
    function check(){
      let pass = f.password.value;
      let cpass = f.Confirmpassword.value;
      if(pass!=cpass){
        alert("Password is not identical");
        return false;
      }else{
        return true;
      }
    }
</script>













<!-- <script>
function check(){
    let pass = f.password.value;
    let cpass=f.Confirmpassword.value;
    if(pass!=cpass ){
        alert("Password is not identical");
        return false;
    }else{
        return true;

    }
}

</script> -->

</body>
</html>