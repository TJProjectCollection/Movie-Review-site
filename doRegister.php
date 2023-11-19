<?php
session_start();
include "dbFunctions.php";
$name = $_POST['Name'];
$DOB = $_POST['DOB'];
$email = $_POST['Email'];
$user = $_POST['username'];
$PW = $_POST['Password'];
$msg = "";
if (date("Y-m-d")<$DOB){
    $msg = "<p>The DOB cannot exist yet.<br/>"
            . "<a href='Register.php'>Try again!</a></p>";
}else{

$userquery = "SELECT * FROM users
          WHERE username='$user'";
$userCheck = mysqli_query($link, $userquery) or die(mysqli_error($link));

if (mysqli_num_rows($userCheck) == 0){
$query = "INSERT INTO users (username,password,name,dob,email,Acc_status)
            VALUES ('$user',SHA1('$PW'),'$name','$DOB','$email','activated')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
}

if (isset($result)) {
    $msg = "<p>Your new account has been successfully created.<br/> 
                You are now ready to <a href='Login.php'>login</a>.</p>";
}
else {
    $msg = "<p>The username " . $user . " already exists.<br/>"
            . "<a href='Register.php'>Try again!</a></p>";
}
mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>doRegister</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/Register.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Movie reviews - Register</h3><br/>
        <h4 class="header"><?php echo $msg; ?></h4>
    </body>
</html>