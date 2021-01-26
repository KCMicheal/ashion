<?php
require_once('dbconnect.php');

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = md5($_POST['passwordd']);
    $rpassword = md5($_POST['rpassword']);
    $email = $_POST['email'];
    
    $sql = "INSERT INTO users(username,passwordd,retype_password,email) VALUES('$username','$password','$rpassword','$email')";
    $sqlInsert=mysqli_query($con,$sql);
    if($sqlInsert){
        echo "<script>Records inserted successfully</script>";
        header("Location:login_register.php#tab-1");
    }
    else{
        echo "<script>There was a problem inserting your record</script>".mysqli_errno();
    }
}

if(isset($_POST['login'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];

    $sql="SELECT * FROM users WHERE username='$user' AND passwordd='$pass'";
    $sqlInsert=mysqli_query($con,$sql);
    $count=mysqli_num_rows($sqlInsert);

    if($count>0){
        echo "<script>alert('You will be redirected shortly')</script>";
        header("Refresh:1, url=index.php");
    }
    else{
        echo "<script>alert('There is no such user')</script>";
        header("Refresh:1, url=login_register.php");
    }
}
mysqli_close($con);
?>