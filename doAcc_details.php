<?php
session_start();
include "dbFunctions.php";
$userID = $_SESSION['user_id'];
$query = "SELECT * FROM users
          WHERE userId=$userID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
// fetch the execution result to an array
$row = mysqli_fetch_array($result);
$user=$row['username'];
$name=$row['name'];
$DOB=$row['dob'];
$email=$row['email'];
$PW=$row['password'];

if (!$_POST['Name']==""){
$name = $_POST['Name'];}
if (!$_POST['DOB']==""){
$DOB = $_POST['DOB'];}
if (!$_POST['Email']==""){
$email = $_POST['Email'];}
if (!$_POST['username']==""){
$user = $_POST['username'];}
if (!$_POST['Password']==""){
$PW = $_POST['Password'];}


$msg = "";
$userquery = "SELECT userId FROM users
          WHERE username='$user'";
$userCheck = mysqli_query($link, $userquery) or die(mysqli_error($link));
$userrow = mysqli_fetch_array($userCheck);
$UID=$userrow['userId'];

if ((mysqli_num_rows($userCheck) == 0)||($userID == $UID)){
$update = "UPDATE users SET 
               username='$user', 
               password=SHA1('$PW'), 
               name='$name', 
               dob='$DOB', 
               email='$email'
               WHERE userId=$userID";
$resultUpdate = mysqli_query($link, $update) or die(mysqli_error($link));
}

if (isset($resultUpdate)) {
    header("location: Acc_details.php");
}
else {
    $msg = "<p>Unable to save changes as the username " . $user . " already exists.<br/>"
            . "<a href='Acc_details.php'>Try again!</a></p>";
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Details</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php include "navbar.php" ?>
        <h3>Movie reviews - Update Details</h3>
        <?php echo $msg; ?>
    </body>
</html>