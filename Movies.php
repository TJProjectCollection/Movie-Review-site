<?php
session_start();
$_SESSION['pageid'] = "Movies";
include "dbFunctions.php"; 

$query = "SELECT * FROM movies";
//Ratings is a self added row to database. source is imdb
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Movies list</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/Movies.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        
        <h3 class="header">Movies List</h3>
        <div class="header">
            <span class="fa fa-filter"></span>
            [<a href="Filter.php">Filters</a>]
        </div>
        <div class="row">
        <?php
            for ($i = 0; $i < count($arrContent); $i++) {
                $title = $arrContent[$i]['movieTitle'];
                $genre = $arrContent[$i]['movieGenre'];
                $rating = $arrContent[$i]['movieRating'];
                $picture = $arrContent[$i]['picture'];
                $runTime = $arrContent[$i]['runningTime'];
                $id = $arrContent[$i]['movieId'];
        ?>
        
            <div class="col-sm-3 mt-4">
                <div class="card h-100">
                    <img class="card-img-top" src="Images/<?php echo $picture; ?>" alt="Card image">
                    <div class="card-body bg-dark text-white">
                        <h4 class="card-title"><?php echo $title; ?></h4>
                        Movie Length: <?php echo $runTime; ?>
                        <hr/>
                        <p>Genre: <?php echo $genre; ?><br/>
                           Rating: <?php echo $rating; ?>/10
                        </p>
                        <a href="Moviedetails.php?id=<?php echo $id; ?>">Click for more details</a>
                    </div>
                </div>
            </div>
        <?php
            }
            ?>   
        </div>
        </body>
</html>