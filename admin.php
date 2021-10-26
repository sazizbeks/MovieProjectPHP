<?php
session_start();
if(!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']['username']!='admin')){
    header("Location: index.php");
}
include_once 'database/link.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="styles/style.css">
    <title>Admin Page</title>
</head>

<body class="container p-0 col-12 col-lg-11 col-xl-10">

<?php include_once 'includes/header.php';?>

<main class="mt-3 p-4">

    <button id="addMovie" class="btn btn-secondary btnToggler">Add movie</button>
    <button id="deleteMovie" class="btn btn-secondary btnToggler">Delete movie</button>
    <button id="addActor" class="btn btn-secondary btnToggler">Add actor to movie</button>
    <button id="addMovieGenres" class="btn btn-secondary btnToggler">Add genres to movie</button>

    <form id="addMovieBlock" action="scripts/addMovie.php" method="post" class="col-12">
        <div class="form-group">
            <label for="addMovieTitle">Movie title</label>
            <input type="text" class="form-control" id="addMovieTitle" name="addTitle">
        </div>
        <div class="form-group">
            <label for="releaseDate">Release date</label>
            <input type="date" class="form-control" id="releaseDate" name="addDate">
        </div>
        <div class="form-group">
            <label for="ageRating">Age rating</label>
            <input type="number" class="form-control" id="ageRating" name="addAge">
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="time" class="form-control" id="duration" name="addDuration">
        </div>
        <div class="form-group">
            <label for="duration">Director</label>
            <input type="text" class="form-control" id="director" name="addDirector">
        </div>
        <div class="form-group">
            <label for="duration">Summary</label>
            <input type="text" class="form-control" id="summary" name="addSummary">
        </div>
        <div class="form-group">
            <label for="imgUrl">Image url</label>
            <input type="text" class="form-control" id="imgUrl" name="addImg">
        </div>
        <div class="form-group">
            <label for="player">Player url</label>
            <input type="text" class="form-control" id="player" name="addPlayer">
        </div>
        <button type="submit" class="btn btn-primary">Add movie</button>
    </form>

    <form id="deleteMovieBlock" action="scripts/deleteMovie.php" method="post" class="col-12">
        <div class="form-group">
            <label for="deleteId">Movie id</label>
            <input type="number" class="form-control" id="deleteId" name="deleteId">
        </div>
        <button type="submit" class="btn btn-primary">Delete movie</button>
    </form>

    <form id="addActorBlock" action="scripts/addActor.php" method="post" class="col-12">
        <div class="form-group">
            <label for="fname">First name</label>
            <input type="text" class="form-control" id="fname" name="fname">
        </div>
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" id="lname" name="lname">
        </div>
        <div class="form-group">
            <label for="movieid">Movie id</label>
            <input type="number" class="form-control" id="movieid" name="movieid">
        </div>
        <button type="submit" class="btn btn-primary">Add actor</button>
    </form>

    <form id="addMovieGenresBlock" action="scripts/addMovieGenres.php" method="post" class="col-12">
        <div class="form-group">
            <label for="addGenreMovieId">Movie id</label>
            <input type="number" class="form-control" id="addGenreMovieId" name="mid">
        </div>
        <div class="form-group">
            <label for="addGenreGenreId">
                Genre ids. Write ids, separated by comma (1,4,5).
            </label>
            <ul>
                <?php
                $genresSQL = "SELECT * FROM genres ORDER BY id";
                $genres = $link->query($genresSQL)->fetch_all(MYSQLI_ASSOC);
                foreach ($genres as $genre)
                    echo<<<genres
                        <li>$genre[id] - $genre[genre]</li>
                    genres;

                ?>
            </ul>
            <input type="text" class="form-control" id="addGenreGenreId" name="gid">
        </div>
        <button type="submit" class="btn btn-primary">Add genres to movie</button>
    </form>
</main>


<?php include_once 'includes/bootstrapScripts.php' ?>
<script src="scripts/mainscrip.js"></script>
<script src="scripts/admin.js"></script>
</body>
</html>