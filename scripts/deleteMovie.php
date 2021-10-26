<?php
include_once '../database/link.php';
$sql = "DELETE FROM user_will_watch WHERE movie_id = ".$_POST['deleteId'];
$link->query($sql);

$sql = "DELETE FROM movie_genres WHERE movie_id = ".$_POST['deleteId'];
$link->query($sql);

$sql = "DELETE FROM movie_actors WHERE movie_id = ".$_POST['deleteId'];
$link->query($sql);

$sql = "DELETE FROM movies WHERE id = ".$_POST['deleteId'];
$link->query($sql);
header("Location: ../admin.php");
?>