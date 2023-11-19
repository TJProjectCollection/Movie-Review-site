<?php
session_start();
include "dbFunctions.php";

$ID = $_GET['id'];
$_SESSION['specificMovieID'] = $ID;
$queryM = "SELECT * FROM movies WHERE movieId=$ID";
$resultM = mysqli_query($link, $queryM) or die(mysqli_error($link));

$rowM = mysqli_fetch_array($resultM);
$title = $rowM['movieTitle'];
$genre = $rowM['movieGenre'];
$rating = $rowM['movieRating'];
$picture = $rowM['picture'];
$runTime = $rowM['runningTime'];
$language = $rowM['language'];
$director = $rowM['director'];
$cast = $rowM['cast'];
$synopsis = $rowM['synopsis'];

$queryR = "SELECT U.username, U.userId, R.rating, R.review, R.datePosted, R.reviewId
FROM reviews R
INNER JOIN users U ON U.userId = R.userId
WHERE movieId=$ID AND U.Acc_status = 'activated'";
$resultR = mysqli_query($link, $queryR) or die(mysqli_error($link));

$arrContent = array();  //For cases where there are no reviews for the movie
while ($rowR = mysqli_fetch_array($resultR)) {
    $arrContent[] = $rowR;
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Movie Details</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheets/Movies.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header"><?php echo $title; ?></h3>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-1">
                    <div class="card bg-dark text-white">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <img class="card-img img-fluid" src="Images/<?php echo $picture; ?>" alt="Card image">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p>Movie Length: <?php echo $runTime; ?><br/>
                                            Rating: <?php echo $rating; ?>/10<br/>
                                            Language: <?php echo $language; ?></p>
                                        <hr/>
                                        <p>Genre: <?php echo $genre; ?><br/><br/>
                                            Synopsis:<br/><?php echo $synopsis; ?></p>
                                        <hr/>
                                        <p>Director(s): <?php echo $director; ?></p>
                                        <hr/>
                                        <p>Cast(s): <?php echo $cast; ?></p>
                                        <a href="Movies.php">Back</a>


                                        <?php if(isset($_SESSION['user_id'])){ ?>
                                        <form method="post" action="doCreate.php">
                                        <table>
                                            <tr>
                                                <td>
                                                <h4>[Add Review]</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <label for="Rating">Rating:</label>
                                                <input name="Rating" type="number" id="Rating" min=0 max=5 required placeholder="0" class="rating"/>/5
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="review">Review:</label><br/>
                                                <textarea rows="5" cols="30" name="review" 
                                                        id="review" required placeholder="Write a review here."></textarea>
                                                </td> 
                                            </tr>
                                            <tr>
                                                <td><label>Date Posted:</label>
                                                    <input type="hidden" name="tdyDate" value="<?php echo date("Y-m-d") ?>"/>
                                                <?php echo date("Y-m-d") ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                <input type="hidden" name="movieID" value="<?php echo $ID;?>"/>
                                                <input type="submit" value="Add Review"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($arrContent)){?>
                <div class="col-lg-8">
                    <div class="card-header bg-dark text-white">
                        <h3 class="header">Reviews</h3>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="card bg-dark text-white">
                        <table border="1">
                            <tr>
                                <th>User</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Date Posted</th>
                                <?php if(isset($_SESSION['user_id'])){ ?>
                                <th>Update</th>
                                <th>Delete</th>
                                <?php } ?>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($arrContent); $i++) {
                                $user = $arrContent[$i]['username'];
                                $rating = $arrContent[$i]['rating'];
                                $review = $arrContent[$i]['review'];
                                $date = $arrContent[$i]['datePosted'];
                                $userId = $arrContent[$i]['userId'];
                                $reviewId = $arrContent[$i]['reviewId'];
                            ?>
                                <tr>
                                    <td><?php echo $user; ?></td>
                                    <td><?php echo $rating; ?>/5</td>
                                    <td><?php echo $review; ?></td>
                                    <td><?php echo $date; ?></td>
                            <?php 
                                if(isset($_SESSION['user_id'])){
                                    if(($_SESSION['user_id']) == $userId){ ?>
                                    <td>
                                        <a href="EditR.php?id=<?php echo $reviewId; ?>">Update</a>
                                    </td>
                                    <td>
                                        <a href="doDeleteR.php?id=<?php echo $reviewId; ?>">Delete</a>
                                    </td>
                                </tr>
                           <?php
                                    }
                                }  
                            }
                            ?>      
                        </table>
                    </div>
                </div>
                <?php } else{?>
                <div class="col-lg-8 mb-5">
                    <div class="card-header bg-dark text-white">
                        <h3 class="header">There are currently no reviews for this movie.</h3>
                    </div>
                </div>
                <?php  
                }
                ?> 
            </div>
        </div>
    </body>
</html>