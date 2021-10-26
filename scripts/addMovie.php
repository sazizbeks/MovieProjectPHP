<?php
include_once '../database/link.php';
$sql = "INSERT INTO movies(name, release_date, age_rating, duration, director, summary, image_url, player) 
VALUES (?,?,?,?,?,?,?,?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("ssssssss", $_POST['addTitle'], $_POST['addDate'], $_POST['addAge'],
    $_POST['addDuration'], $_POST['addDirector'], $_POST['addSummary'], $_POST['addImg'], $_POST['addPlayer']);
$stmt->execute();
header("Location: ../admin.php");
?>