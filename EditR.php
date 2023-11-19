<?php
session_start();
// include a php file that contains the common database connection codes
include ("dbFunctions.php");
if (!isset($_SESSION['user_id'])){
    echo "Testttt";
}
$reviewId = $_GET['id'];

// create query to retrieve a single record based on the value of $compID 
$queryR = "SELECT M.movieTitle, R.rating, R.review, R.datePosted, R.reviewId
            FROM reviews R
            INNER JOIN movies M ON M.movieId = R.movieId
            WHERE reviewId=$reviewId";

// execute the query
$resultR = mysqli_query($link, $queryR) or 
                die(mysqli_error($link));

// fetch the execution result to an array
$rowR = mysqli_fetch_array($resultR);
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/Review.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
        <title>Edit Review</title>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Edit Review</h3>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card-body bg-dark text-white">
                        <form method="post" action="doEditR.php">
                            <table>
                                <tr>
                                    <td><label>Title:</label>
                                    <?php echo $rowR['movieTitle'] ?></td>
                                </tr>
                                <tr>
                                    <td>
                                    <label for="Rating">Rating:</label>
                                    <input name="Rating" type="number" id="Rating" min=0 max=5  value="<?php echo $rowR['rating']; ?>" required class="rating"/>/5
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="review">Review:</label><br/>
                                    <textarea rows="5" cols="30" name="review" 
                                            id="review"><?php echo $rowR['review'] ?></textarea>
                                    </td> 
                                </tr>
                                <tr>
                                    <td><label>Date last updated:</label>
                                        <input type="hidden" name="tdyDate" value="<?php echo date("Y-m-d") ?>"/>
                                    <?php echo $rowR['datePosted'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="hidden" name="reviewId" value="<?php echo $rowR['reviewId'] ?>"/>
                                    <input type="submit" value="Update Review"/>
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