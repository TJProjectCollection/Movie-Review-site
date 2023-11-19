<?php
session_start();
$_SESSION['pageid'] = "Register";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/Register.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Account Registration</h3>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card-body bg-secondary d-flex justify-content-center">
                        <form method="post" action="doRegister.php">
                            <table>
                                <br/>
                                <tr>
                                    <td><label class="register" for="idname">Name:</label></td>
                                    <td><input name="Name" type="text" id="idname" required placeholder="Full Name here" autofocus/></td>
                                </tr>

                                <tr>
                                    <td ><label class="register" for="idCalendar">Date of Birth:</label></td>
                                    <td><input name="DOB" id="idCalendar" type="date" required/></td>
                                </tr>
                                <tr>
                                    <td ><label class="register" for="idEmail">Email:</label></td>
                                    <td><input name="Email" type="email" id="idEmail" placeholder="Enter email" required></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><hr/></td>
                                </tr>
                                <tr>
                                    <td ><label class="register" for="idUser">Username:</label></td>
                                    <td><input name="username" type="text" id="idUser"  required placeholder="Username here"/></td>
                                </tr>
                                <tr>
                                    <td><label class="register" for="idPassword">Password:</label></td>
                                    <td><input name="Password" type="password" id="idPassword" placeholder="Enter password" required></td>
                                </tr>
                                <tr>
                                    <td><br/></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Register"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
