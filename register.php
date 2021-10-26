<?php

include_once 'database/link.php';
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "INSERT INTO users(email, username, password) VALUES (?, ?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("sss", $email, $username, $password);
$stmt->execute();

setcookie("registred", "You have successfully registred!", time()+5);
header("Location: index.php");
?>