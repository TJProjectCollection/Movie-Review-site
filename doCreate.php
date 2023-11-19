<?php
session_start();
// include a php file that contains the common database connection codes
include ("dbFunctions.php");

//retrieve computer details from the textarea on the previous page
$Rating = $_POST['Rating'];
$Review = $_POST['review'];
$tdyDate = $_POST['tdyDate'];
$IdC = $_POST['movieID'];
$userID = $_SESSION['user_id'];
$msg="";

$queryCheck = "SELECT reviewId FROM reviews
          WHERE userId=$userID AND movieId=$IdC ";
$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

$row = mysqli_fetch_array($resultCheck);
$reviewId=$row['reviewId'];

if ($_SESSION['pageid'] == "Movies"){
$location="<a href='Moviedetails.php?id=$IdC'>Go back.</a>";
}
else if ($_SESSION['pageid'] == "Review") {
$location="<a href='Review.php'>Go back.</a>";
}
if(mysqli_num_rows($resultCheck) == 0){
    $queryCreate = "INSERT INTO reviews (rating, review, datePosted, movieId, userId) 
              VALUES ('$Rating', '$Review', '$tdyDate', '$IdC', '$userID')";


    $resultCreate = mysqli_query($link, $queryCreate) or die(mysqli_error($link));
    if ($_SESSION['pageid'] == "Movies"){
    header("location:Moviedetails.php?id=$IdC");
    }
    else if ($_SESSION['pageid'] == "Review") {
    header("location:Review.php");    
    }
}else{
    $msg="A review for this movie has aleady been made, only 1 review is allowed per movie for each user.<br/>
            <a href='EditR.php?id=$reviewId;'>Update your current review.</a>"
            . "<br/>Or<br/>"
            . "$location";
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/Review.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
        <title>Create Reviews</title>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Failed Review Creation</h3><br/>
        <h4 class="header"><?php
        echo $msg;
        ?></h4>
    </body>
</html>