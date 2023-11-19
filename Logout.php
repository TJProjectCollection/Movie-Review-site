<?php
session_start();
$_SESSION['pageid'] = "Logout";
$message = "You have logged out.";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
        <title>Login</title>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Account Logout</h3>
        <?php
        if (isset($_SESSION['user_id'])) {
        session_destroy();
        $_SESSION = array();
        header("location: Logout.php");
        }?>
        <h4 class="header"><?php echo $message; ?></h4>
    </body>
</html>