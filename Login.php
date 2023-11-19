<?php
session_start();
$_SESSION['pageid'] = "Login";
if (isset($_COOKIE['rememberUsername'])){
    $rememberUsername = $_COOKIE['rememberUsername'];
    $checked="checked";
} else{
    $rememberUsername = "" ;
}
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Account Login</h3>
        <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card-body bg-secondary d-flex justify-content-center">
                        <form method="post" action="doLogin.php">
                            <table>
                            <br/>
                                <tr>
                                    <td><label for="id_username">Username:</label></td>
                                    <td><input id="id_username" type="text" name="username" value="<?php echo $rememberUsername; ?>"/></td>
                                </tr>
                                <tr>
                                    <td><label for="id_password">Password:</label></td>
                                    <td><input id="id_password" type="password" name="password"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="left"><input type="checkbox" name="remember" <?php if(isset($checked)){echo $checked;} ?>>Remember Me</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" Value="Login"/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="header">Not a member?<a  href='Register.php'>Register!</a></div>
        <div class="header"><a  href='forgetpassword.php'>Forgot your password?</a></div>
    </body>
</html>