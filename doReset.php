<?php
session_start();
include "dbFunctions.php";
$username = $_SESSION['resetPUser'];;
$PW=$_POST['passwordN'];
$PWC=$_POST['passwordNC'];
$msg="";
if ($PW==$PWC){
    $check= "Select * from users
        WHERE password=SHA1('$PW') and username='$username'";
    $resultCheck = mysqli_query($link, $check) or die(mysqli_error($link));
    if (mysqli_num_rows($resultCheck) == 0){
        $update = "UPDATE users SET 
                password=SHA1('$PW')
                WHERE username=$username";
        $resultUpdate = mysqli_query($link, $update) or die(mysqli_error($link));
        $msg="<p class='header'>Password has been succesfully reset!<a href='Login.php'> Back to Login.</a></p>";
    }else{
        $msg="<p class='header'>Password suggested has to be different to the current one.<a href='Reset.php'> Try again.</a></p>";
    }
} else{
    $msg="<p class='header'>The new password and confirm password are different.<a href='Reset.php'> Try again.</a></p>";
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Reset Password</h3>
        <?php echo $msg;?>
    </body>
</html>