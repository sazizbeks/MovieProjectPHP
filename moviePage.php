<?php
session_start();
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
    <link rel="stylesheet" href="styles/moviePage.css">
    <title><?=$_GET['movie']?></title>
</head>

<body class="container p-0 col-12 col-lg-11 col-xl-10">

<?php include_once 'includes/header.php';

$sqlMovie = "SELECT * FROM movies WHERE name = ?";
$stmt = $link->prepare($sqlMovie);
$stmt->bind_param("s", $_GET['movie']);
$stmt->execute();
$movie = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$movieValue = $movie[0];
?>

<main class="mt-3">

    <div class="card movieCard col-12 p-0">
        <div class="row no-gutters">

            <div class="col-12 col-md-1 col-lg-2 imgMovieBlock">
                <img src="<?= $movieValue['image_url'] ?>" alt="" class="card-img imgMovie">
                <?php
                if (isset($_SESSION['user'])) {
                    $watchColor="";
                    $watchText="";
                    $watchSql = "SELECT*FROM user_will_watch WHERE user_id = ?
                         AND movie_id = (SELECT id FROM movies WHERE name = ?)";
                    $stmt=$link->prepare($watchSql);
                    $stmt->bind_param("is", $_SESSION['user']['id'], $movieValue['name']);
                    $stmt->execute();
                    if($stmt->get_result()->fetch_assoc() != null) {
                        $watchColor = "btn-success";
                        $watchText="Already in list";
                    }
                    else {
                        $watchColor = "btn-secondary";
                        $watchText="Will watch";
                    }
                    echo '
                            <div class="row mt-1 mx-0">
                                <form action="willWatch.php" method="post" class="container-fluid p-0 willWatchForm">
                                    <input type="hidden" name="movie" value="'.$movieValue['name'].'">
                                    <button type="submit" class="btn '.$watchColor.' container-fluid willWatch">'.$watchText.'</button>
                                </form>
                            </div>';
                }?>
            </div>

            <div class="col-12 col-md-11 col-lg-10">
                <a href="" class="card-link">
                    <div class="card-header"><?= $movieValue['name'] ?></div>
                </a>
                <div class="card-body py-2">

                    <ul class="list-group list-group-flush row">
                        <?php
                        if(isset($_SESSION['user']) && $_SESSION['user']['username']=='admin'){
                            echo<<<idblock
                            <li class="list-group-item py-1">
                                <dl class="row m-0">
                                    <dt class="mr-4">ID</dt>
                                    <dd>$movieValue[id]</dd>
                                </dl>
                            </li>
                            idblock;

                        }
                        ?>
                        <li class="list-group-item py-1">
                            <dl class="row m-0">
                                <dt class="mr-4">Release date</dt>
                                <dd><?= $movieValue['release_date'] ?></dd>
                            </dl>
                        </li>
                        <li class="list-group-item py-0">
                            <dl class="row m-0">
                                <dt class="mr-4">Duration</dt>
                                <dd><?=$movieValue['duration']?></dd>
                            </dl>
                        </li>
                        <li class="list-group-item py-1">
                            <dl class="row m-0">
                                <dt class="mr-4">Genres</dt>
                                <dd><?php
                                    $genre = "";
                                    $genresql = "SELECT g.genre FROM movie_genres m
                                                INNER JOIN genres g ON g.id = m.genre_id 
                                                WHERE movie_id = " . $movieValue['id'];
                                    $genres = $link->query($genresql)->fetch_all(MYSQLI_ASSOC);
                                    foreach ($genres as $genreKey => $genreValue) {
                                        $genre .= $genreValue['genre'];
                                        if ($genreKey != count($genres) - 1)
                                            $genre .= ", ";
                                    }
                                    echo $genre;
                                    ?></dd>
                            </dl>
                        </li>
                        <li class="list-group-item py-1">
                            <dl class="row m-0">
                                <dt class="mr-4">Age rating</dt>
                                <dd><?=$movieValue['age_rating']?>+</dd>
                            </dl>
                        </li>
                        <li class="list-group-item py-0">
                            <dl class="row m-0">
                                <dt class="mr-4">Director</dt>
                                <dd><?=$movieValue['director']?></dd>
                            </dl>
                        </li>
                        <li class="list-group-item py-0">
                            <dl class="row m-0">
                                <dt class="mr-4">Actors</dt>
                                <dd>
                                    <?php
                                    $actors = "";
                                    $sql = "SELECT a.fname, a.lname FROM `movie_actors` m 
                                            INNER JOIN actors a ON a.id=m.actors_id 
                                            WHERE movie_id=" . $movieValue['id'];
                                    $acts = $link->query($sql)->fetch_all(MYSQLI_ASSOC);
                                    foreach ($acts as $k => $v) {
                                        $actors .= $v['fname'] . " " . $v['lname'];
                                        if ($k != count($acts) - 1) {
                                            $actors .= ", ";
                                        }
                                    }
                                    echo $actors;
                                    ?>
                                </dd>
                            </dl>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="p-3">
        <div class="font-weight-bold">Summary</div>
        <p><?=$movieValue['summary']?></p>
    </div>

    <div class="player">
        <iframe data-src="<?=$movieValue['player']?>" width="100%" height="385" frameborder="0"
                allowfullscreen="" class="lazy-loaded" src="<?=$movieValue['player']?>">
        </iframe>
    </div>


</main>


<?php include_once 'includes/bootstrapScripts.php' ?>
<script src="scripts/mainscrip.js"></script>
</body>
</html>
