<?php
session_start();
$_SESSION['pageid'] = "Contact";
?>
<html>
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/contact.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <div class="text-center">
            <h3 class="header">Contact us for any enquiries</h3>
            <i class="fa fa-map-marker-alt fa-2x mt-2 mb-3" aria-hidden="true"></i>
            <br/><h4 class="text">456 Cinema Road,<br/> Citytown, SG 67890,<br/>Singapore</h4><br/>
                <i class="fa fa-phone-volume fa-2x mt-2 mb-3" aria-hidden="true"></i>
                <br/><h4 class="text">+65 1234 5678</h4> <br/>
                <i class="fa fa-envelope fa-2x mt-3 mb-3" aria-hidden="true"></i>
                <br/><h4 class="text">contact@moviereviewslist.sg</h4><br/>
        </div>  
    </body>
</html>