<?php
session_start();
// include a php file that contains the common database connection codes
include ("dbFunctions.php");

//retrieve computer details from the textarea on the previous page
$updatedRating = $_POST['Rating'];
$updatedReview = $_POST['review'];
$tdyDate = $_POST['tdyDate'];
//retrieve id from the hidden form field of the previous page
$reviewId = $_POST['reviewId'];
$ID=$_SESSION['specificMovieID'];

//build a query to update the table
//update the record with the details from the form
$queryUpdate = "UPDATE reviews SET 
               rating='$updatedRating',  
               review='$updatedReview', 
               datePosted='$tdyDate'
               WHERE reviewId=$reviewId";

//execute the query
$resultUpdate = mysqli_query($link, $queryUpdate) or die(mysqli_error($link));


if ($_SESSION['pageid'] == "Movies"){
header("location:Moviedetails.php?id=$ID");
}
else if ($_SESSION['pageid'] == "Review") {
header("location:Review.php");    
}

mysqli_close($link);
?>

