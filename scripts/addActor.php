<?php
include_once '../database/link.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$movieid = $_POST['movieid'];

function getActorId($link, $fname, $lname)
{
    $actorSql = "SELECT id FROM actors WHERE fname = ? AND lname = ?";
    $stmt = $link->prepare($actorSql);
    $stmt->bind_param("ss", $fname, $lname);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$actor = getActorId($link, $fname, $lname);

if($actor == null){
    $sql = "INSERT INTO `actors`(`fname`, `lname`) VALUES (?,?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("ss", $fname, $lname);
    $stmt->execute();
    $actor = getActorId($link, $fname, $lname);
}
$sql = "INSERT INTO `movie_actors`(`movie_id`, `actors_id`)
            VALUES ('".$movieid."','".$actor[0]['id']."')";
$link->query($sql);
header("Location: ../admin.php");
?>