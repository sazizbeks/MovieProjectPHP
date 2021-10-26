<?php
session_start();
include_once 'database/link.php';
if (isset($_COOKIE['registred'])) {
    echo '<script>alert("You have successfully registred!")</script>';
}
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
    <title>KinoWatch</title>
</head>

<body class="container p-0 col-12 col-lg-11 col-xl-10">

<?php include_once 'includes/header.php';?>

<main class="mt-3">
    <?php $pid = getmypid(); $output = shell_exec(sprintf('tasklist /nh /fo csv /fi "PID eq %d"', $pid)); $processInfo = explode(',', $output);
    echo PHP_BINDIR . DIRECTORY_SEPARATOR . trim($processInfo[0], '"');?>

    <?php
    $movie = $link->query("SELECT id, name, release_date, duration, age_rating,
                                    image_url FROM movies")->fetch_all(MYSQLI_ASSOC);

    $rowend = false;
    foreach ($movie as $movieValue):
        if (!$rowend) echo '<div class="row p-0 m-0">';
        ?>

    <div class="card movieCard m-0 p-1 col-md-6">
        <div class="row no-gutters">

            <div class="col-12 col-md-4 col-lg-5 imgMovieBlock">
                <img src="<?= $movieValue['image_url'] ?>" alt="" class="card-img imgMovie">
                <?php
                if (isset($_SESSION['user'])) {
                    $watchColor = "";
                    $watchText = "";
                    $watchSql = "SELECT*FROM user_will_watch WHERE user_id = ?
                         AND movie_id = (SELECT id FROM movies WHERE name = ?)";
                    $stmt = $link->prepare($watchSql);
                    $stmt->bind_param("is", $_SESSION['user']['id'], $movieValue['name']);
                    $stmt->execute();
                    if ($stmt->get_result()->fetch_assoc() != null) {
                        $watchColor = "btn-success";
                        $watchText = "Already in list";
                    } else {
                        $watchColor = "btn-secondary";
                        $watchText = "Will watch";
                    }
                    echo '
                            <div class="row mt-1 mx-0">
                                <form action="willWatch.php" method="post" class="container-fluid p-0 willWatchForm">
                                    <input type="hidden" name="movie" value="' . $movieValue['name'] . '">
                                    <button type="submit" class="btn ' . $watchColor . ' container-fluid willWatch">' . $watchText . '</button>
                                </form>
                            </div>';
                } ?>
            </div>

            <div class="col-12 col-md-8 col-lg-7">
                <a href="moviePage.php?movie=<?= $movieValue['name'] ?>" class="card-link">
                    <div class="card-header"><?= $movieValue['name'] ?></div>
                </a>
                <div class="card-body py-2">

                    <ul class="list-group list-group-flush row">
                        <li class="list-group-item py-1">
                            <dl class="row m-0">
                                <dt class="text-dark mr-4">Release date:</dt>
                                <dd><?= $movieValue['release_date'] ?></dd>
                            </dl>
                        </li>
                        <li class="list-group-item py-1">
                            <dl class="row m-0">
                                <dt class="text-dark mr-4">Duration</dt>
                                <dd><?= $movieValue['duration'] ?></dd>
                            </dl>
                        </li>
                        <li class="list-group-item py-1">
                            <dl class="row m-0">
                                <dt class="text-dark mr-4">Genres</dt>
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
                                <dt class="text-dark mr-4">Age rating</dt>
                                <dd><?= $movieValue['age_rating'] ?>+</dd>
                            </dl>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <?php
    if ($rowend) {
        echo '</div>';
    }
    $rowend = $rowend ? false : true;
    ?>
    <?php endforeach; ?>

</main>


<?php include_once 'includes/bootstrapScripts.php' ?>
<script src="scripts/mainscrip.js"></script>
</body>
</html>