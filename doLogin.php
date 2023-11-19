<?php
session_start();
$msg = "";

//check whether session variable 'user_id' is set
//in other words, check whether the user is already logged in
if (isset($_SESSION['user_id'])) {
    $msg = "You are already logged in.";
} else { //user is not logged in
    //check whether form input 'username' contains value
    if (isset($_POST['username'])) {

        //retrieve form data
        $entered_username = $_POST['username'];
        $entered_password = $_POST['password'];

        //connect to database
        include ("dbFunctions.php");

        //match the username and password entered with database record
        $query = "SELECT userId, username, Acc_status FROM users 
                  WHERE username='$entered_username' AND 
                  password = SHA1('$entered_password')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        //if record is found, store id and username into session
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $row['userId'];
            $_SESSION['username'] = $row['username'];
            $status = $row['Acc_status'];
            $msg = "Welcome, " . $_SESSION['username'] . "!";
            
            if (isset($_POST['remember'])) {
                setcookie("rememberUsername", $entered_username, time()+60*60*24*365*10);
            } else{
                setcookie("rememberUsername", 0, time()-60*60*24*365*10);
            }
            if($status=="deactivated"){
                $userID = $_SESSION['user_id'];
                $msg .= " Your account has been reactivated due to logging in.";
                $queryAct = "UPDATE users SET Acc_status ='activated' WHERE userId=$userID";
                $resultAct = mysqli_query($link, $queryAct) or die(mysqli_error($link));
            }
            
        } else { //record not found
            $msg = "Login is not successful,<a href='Login.php'> please try again!</a>";
        }
        mysqli_close($link);
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
        <title>Do Login</title>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Movie reviews - Login</h3>
        <h4 class="header"><?php echo $msg; ?></h4>
    </body>
</html>