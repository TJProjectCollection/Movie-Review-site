<?php
session_start();

$userID = $_SESSION['user_id'];
include "dbFunctions.php";

if (isset($_POST['Confirmed'])){
    if (isset($_POST['deact'])){
    $query = "UPDATE users SET Acc_status ='deactivated' WHERE userId=$userID";
    
    $result1 = mysqli_query($link, $query) or die(mysqli_error($link));
    }
    if (isset($_POST['del'])){
    $query = "DELETE FROM users
          WHERE userId=$userID";
    
    $result2 = mysqli_query($link, $query) or die(mysqli_error($link));
    }
}

$msg = "";
$check = "";
if (isset($result2)) {
    $msg = "The account of user " . $_SESSION['username'] . " has been deleted.";
    $check="check";
}
else if (isset($result1)) {
    $msg = "The account of user " . $_SESSION['username'] . " has been deactivated.<br/>
            All reviews from this account are also hidden till account is reactivated.";
    $check="check";
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Account Management</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php
        if ($check == "check"){
            if (isset($userID)) {
                session_destroy();
                $_SESSION = array();
                setcookie("rememberUsername", 0, time()-60*60*24*365*10);
            }
            session_start();
            $_SESSION['pageid'] = "";
        }
        include "navbar.php"
        ?>
        <h3 class="header">Account Management</h3>
        <h4 class="header"><?php
        echo $msg;
        session_destroy();
        $_SESSION = array();
        ?></h4>
    </body>
</html>