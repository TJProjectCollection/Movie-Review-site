<?php
session_start();
include "dbFunctions.php"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forgot Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Forgot Password</h3>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card-body bg-secondary">
                            <form method="post" action="doforgetpassword.php">
                                <div class="d-flex justify-content-center">
                                    <table>
                                    <br/>
                                        <tr>
                                            <td><label for="username">Username:</label></td>
                                            <td><input id="username" type="text" name="username" required placeholder="Your username"/></td>
                                        </tr>
                                        <tr>
                                            <td><label for="email">Email:</label></td>
                                            <td><input id="email" type="email" name="email" required placeholder="Email used during sign up"/></td>
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
        </body>
</html>