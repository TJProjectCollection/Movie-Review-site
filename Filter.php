<?php
session_start();
include "dbFunctions.php"; 
$queryM = "SELECT movieGenre FROM movies";
$resultM = mysqli_query($link, $queryM) or die(mysqli_error($link));

$allGenres = "";
while ($rowM = mysqli_fetch_array($resultM)) {
    $genres = explode("/", $rowM['movieGenre']);
    foreach ($genres as $genre) {
        if (!empty($allGenres)) {
            $allGenres .= ",";
        }
        $allGenres .= $genre;
    }
}

$genresArray = explode(",", $allGenres);
$genresArray = array_map('trim', $genresArray);
$genresArray = array_unique($genresArray);
sort($genresArray);
$counter=count($genresArray);
mysqli_close($link);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Filter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/Movies.css"/>
        <link rel="stylesheet" type="text/css" href="stylesheets/Main.css"/>
    </head>
    <body class="background">
        <?php include "navbar.php" ?>
        <h3 class="header">Filter Selection</h3>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card-body bg-secondary d-flex justify-content-center">
                            <form method="post" action="doFilter.php">
                                <table>
                                    <br/>
                                    <tr>
                                        <td><label for="Title">Title:</label></td>
                                        <td><input name="Title" type="text" id="Title" placeholder="Search by title" autofocus/></td>
                                    </tr>
                                    <tr>
                                        <td><br/></td>
                                    </tr>
                                    <tr>
                                        <td>Genre:</td>
                                        <input type="hidden" name="genrecount" value="<?php echo $counter; ?>">
                                         <?php
                                        $count = 0;
                                        for ($i = 1; $i <= $counter; $i++) {
                                            if ($count % 3 == 0) {
                                                echo "<tr><td></td><td class='genre-container'>";
                                            }
                                            $genre = $genresArray[$i - 1];
                                            echo "<label><input name='Genre$i' value='$genre' type='checkbox'>$genre</label>";
                                            $count++;
                                            if ($count % 3 == 0) {
                                                echo "</td></tr>";
                                            }
                                        }

                                        // If there are remaining genres that do not fill a complete row of three, close the last row
                                        if ($count % 3 != 0) {
                                            echo "</td></tr>";
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td><br/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="Rating">Minimum Rating(0-10):</label></td>
                                        <td><input name="Rating" type="number" id="Rating" step="0.1" required min="0" max="10" value=0></td>
                                    </tr>
                                    <tr>
                                        <td><br/></td>
                                    </tr>
                                    <tr>
                                        <td ><label for="runTime">Minimum Movie Length(Mins):</label></td>
                                        <td><input name="runTime" type="number" id="runTime" required value=0></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6"><hr/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="sort">Sort By:</label></td>
                                        <td>
                                            <select name="sortby" id="sort1" required>
                                            <option value="movieTitle" selected value >Title</option>
                                            <option value="movieGenre" >Genre</option>
                                            <option value="runningTime" >Movie Length</option>
                                            <option value="movieRating" >Rating</option></select>

                                            <select name="AscOrDesc" id="sort2" required>
                                            <option value="ASC" selected value >Ascending</option>
                                            <option value="DESC" >Descending</option></select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="Apply filters"/>
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
