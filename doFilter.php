<?php
session_start();
include "dbFunctions.php"; 

$title = "";
$title = $_POST['Title'];
$counter = $_POST['genrecount'];
for ($i = 1; $i <=$counter; $i++) {
    $genreVarName = "Genre" . $i;
    if (isset($_POST[$genreVarName])) {
        $genreValues[$i] = $_POST[$genreVarName];
    } else {
        $genreValues[$i] = "";
    }
}

$rating = $_POST['Rating'];
$runTime = $_POST['runTime'];

if (isset($_POST['sortby'])){
$sortby = $_POST['sortby'];
$AscOrDesc = $_POST['AscOrDesc'];
}else{
$sortby = "movieTitle";
$AscOrDesc = "ASC";
}

$genreFilter = "";
for ($i = 1; $i <=$counter; $i++) {
    if (!empty($genreValues[$i])) {
        $genre = mysqli_real_escape_string($link, $genreValues[$i]);
        $genreFilter .= "movieGenre LIKE '%$genre%' AND ";
    }
}

$genreFilter = rtrim($genreFilter, " AND "); // Remove the last "AND" from the filter

// Build the SQL query with the dynamic genre filter
$query = "SELECT * FROM movies
          WHERE (movieTitle LIKE '%$title%')";

// Check if $genreFilter is not empty before including it in the query
if (!empty($genreFilter)) {
    $query .= " AND ($genreFilter)";
}

$query .= " AND (movieRating >= $rating) AND (runningTime >= $runTime)
          ORDER BY $sortby $AscOrDesc;";
//Ratings is a self added row to database. source is imdb
$result = mysqli_query($link, $query) or die(mysqli_error($link));

$arrContent = array();

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
            [<a href="Filter.php">Change Filters</a>]
        </div>
        <div class="row">
        <?php
        if (!count($arrContent)==0){
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
                    <div class="card-body bg-dark text-white d-flex flex-column">
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
        <?php }}else{ ?>   
            <h4 class="center">There are no movies that match your filters/search</h4>
            <?php }?>
        </div>
        </body>
</html>