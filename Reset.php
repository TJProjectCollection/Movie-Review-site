<?php
session_start();
if(isset($_POST['OTP'])){
    $enteredOTP = $_POST['OTP'];
    $OTPcheck = $_POST['OTPcheck'];
} else{
    $enteredOTP="";
      $OTPcheck="";      
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <?php if ($enteredOTP == $OTPcheck) {?>
        <h3 class="header">Reset Password</h3>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card-body bg-secondary">
                            <form method="post" action="doReset.php">
                                <div class="d-flex justify-content-center">
                            <table>
                            <br/>
                                <tr>
                                    <td><label for="passwordN">New Password:</label></td>
                                    <td><input id="passwordN" type="password" name="passwordN" required/></td>
                                </tr>
                                <tr>
                                    <td><label for="passwordNC">Confirm Password:</label></td>
                                    <td><input id="passwordNC" type="password" name="passwordNC" required/></td>
                                </tr>
                                <tr>
                                    <td><br/></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" Value="Reset password"/></td>
                                </tr>
                            </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php }else{?>
                            <h3 class="header">Invalid OTP</h3>
                            <p class="header"><a href='forgetpassword.php'>please try again!</a><p>
                            <?php }?>
        </body>
</html>