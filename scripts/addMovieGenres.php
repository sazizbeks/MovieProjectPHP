<?php
include_once '../database/link.php';
$genresId = explode(",", $_POST['gid']);
$sql = "INSERT INTO movie_genres(movie_id, genre_id) VALUES (?,?)";

foreach ($genresId as $v){
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ss", $_POST['mid'], $v);
    $stmt->execute();
}

header("Location: ../admin.php");
?>