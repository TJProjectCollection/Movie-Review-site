<?php
session_start();
// include a php file that contains the common database connection codes
include ("dbFunctions.php");

$reviewId = $_GET['id'];

$queryM = "SELECT movieId FROM reviews WHERE reviewId=$reviewId";
$resultM = mysqli_query($link, $queryM) or die(mysqli_error($link));

$row = mysqli_fetch_array($resultM);
$movieId=$row['movieId'];



$queryR = "Delete FROM reviews WHERE reviewId=$reviewId";
$resultR = mysqli_query($link, $queryR) or die(mysqli_error($link));

if ($_SESSION['pageid'] == "Movies"){
header("location:Moviedetails.php?id=$movieId");
}
else if ($_SESSION['pageid'] == "Review") {
header("location:Review.php");    
}
mysqli_close($link);
?>