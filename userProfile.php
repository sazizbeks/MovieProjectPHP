<?php
session_start();
if(!isset($_SESSION['user'])) {
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
    <title>User profile</title>
</head>

<body class="container p-0 col-12 col-lg-11 col-xl-10">
<?php include_once 'includes/header.php';?>

<main class="mt-3">

    <h3 class="px-3">Will watch list</h3>
    <ul class="list-group list-group-flush">
        <?php
            $sqlMyWatchList = "SELECT name FROM user_will_watch 
                            INNER JOIN movies ON movies.id = user_will_watch.movie_id 
                            WHERE user_id = ?";
            $stmt = $link->prepare($sqlMyWatchList);
            $stmt->bind_param("i", $_SESSION['user']['id']);
            $stmt->execute();
            $movies = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            foreach ($movies as $k=>$v):
        ?>
            <a href="moviePage.php?movie=<?=$v['name']?>" class="movie list-group-item btn btn-light text-left"><?= ($k+1).". ".$v['name'] ?></a>
        <?php endforeach;?>
    </ul>

</main>


<?php include_once 'includes/bootstrapScripts.php' ?>
<script src="scripts/mainscrip.js"></script>
</body>
</html>
</body>
