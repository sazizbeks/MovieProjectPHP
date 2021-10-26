<?php

include_once 'database/link.php';
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if ($res != null && $res[0]['email'] != null) {
    if ($res[0]['password'] == $password) {
        session_start();
        $_SESSION['user'] = array(
            'id' => $res[0]['id'],
            'email' =>$res[0]['email'],
            'username' => $res[0]['username'],
            'password' => $res[0]['password']);
        echo 'success';
    } else {
        echo "Incorrect password!";
    }
} else {
    echo 'User with such username doesn\'t exist!';
}
?>