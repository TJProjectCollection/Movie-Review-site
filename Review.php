<?php
session_start();
$_SESSION['pageid'] = "Review";
$userID = $_SESSION['user_id'];
$username = $_SESSION['username'];


include "dbFunctions.php";
$queryR = "SELECT M.movieTitle, R.rating, R.review, R.datePosted, R.reviewId
FROM reviews R
INNER JOIN movies M ON M.movieId = R.movieId
WHERE userId=$userID";
$resultR = mysqli_query($link, $queryR) or die(mysqli_error($link));

$arrContent = array();  //For cases where there are no reviews for the movie
while ($rowR = mysqli_fetch_array($resultR)) {
    $arrContent[] = $rowR;
}
$queryC = "SELECT movieTitle, movieId FROM movies";
$resultC = mysqli_query($link, $queryC) or die(mysqli_error($link));

while ($rowC = mysqli_fetch_array($resultC)) {
    $arrContentC[] = $rowC;
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheets/Review.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
        <title>Reviews</title>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="bg-secondary header">Reviews</h3>
<ul class="nav nav-tabs">
    <li class="nav-item bg-dark text-white">
        <a class="nav-link active" data-bs-toggle="tab" href="#User">User</a>
    </li>
    <li class="nav-item bg-dark text-white active">
        <a class="nav-link" data-bs-toggle="tab" href="#Create">Create</a>
    </li>
</ul>
        
<div class="tab-content">
    <div class="tab-pane container active" id="User">
        <h3 class="header"><?php echo $username; ?>'s Reviews</h3>
    <?php if(!empty($arrContent)){?>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card bg-dark text-white">
                            <table border="1" cellpadding="0" cellspacing="5px">
                                <tr>
                                    <th>Movie</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Date Posted</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                for ($i = 0; $i < count($arrContent); $i++) {
                                    $title = $arrContent[$i]['movieTitle'];
                                    $rating = $arrContent[$i]['rating'];
                                    $review = $arrContent[$i]['review'];
                                    $date = $arrContent[$i]['datePosted'];
                                    $reviewId = $arrContent[$i]['reviewId'];
                                ?>
                                    <tr>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $rating; ?>/5</td>
                                        <td><?php echo $review; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td>
                                            <a href="EditR.php?id=<?php echo $reviewId; ?>">Update</a>
                                        </td>
                                        <td>
                                            <a href="doDeleteR.php?id=<?php echo $reviewId; ?>">Delete</a>
                                        </td>
                                    </tr>
                               <?php
                                    }  
                                ?>      
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <h3 class="header">You have not created any reviews yet!</h3>
        `   <?php } ?>
        </div>
    <div class="tab-pane container fade" id="Create">
        <h3 class="header">Create Reviews</h3>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card-body bg-secondary d-flex justify-content-center">
                                <form method="post" action="doCreate.php">

                                    <table>
                                        <tr>
                                            <td><label for="movieTitle">Select Movie to Review:</label>
                                            <select id="movieTitle" name="movieID" autofocus>
                                                <?php
                                                for ($i = 0; $i < count($arrContentC); $i++) {
                                                    $titleC = $arrContentC[$i]['movieTitle'];
                                                    $IdC = $arrContentC[$i]['movieId'];
                                                ?>
                                                    <option value="<?php echo $IdC; ?>"><?php echo $titleC; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
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
                                            <input type="submit" value="Create Review"/>
                                            </td>
                                        </tr>
                                    </table>   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </body>
</html>