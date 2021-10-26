<?php
session_start();
include_once 'database/link.php';

$sql = "SELECT*FROM user_will_watch WHERE user_id=? AND movie_id=(SELECT id FROM movies WHERE name = ?)";

$stmt = $link->prepare($sql);
$stmt->bind_param("ss", $_SESSION['user']['id'], $_POST['movie']);
$stmt->execute();

if ($stmt->get_result()->fetch_assoc()) $existed = true;
else $existed = false;

if ($existed) {
    $sql = "DELETE FROM user_will_watch WHERE user_id=? AND movie_id=(SELECT id FROM movies WHERE name = ?)";
    $res = 'deleted';
} else {
    $sql = "INSERT INTO user_will_watch(user_id, movie_id) VALUES (?, (SELECT id FROM movies WHERE name = ?))";
    $res = 'added';
}

$stmt = $link->prepare($sql);
$stmt->bind_param("ss", $_SESSION['user']['id'], $_POST['movie']);
$stmt->execute();
echo $res;
?>