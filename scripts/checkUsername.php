<?php
header('Content-Type: application/json');
include_once '../database/link.php';
$res=['reserved'=>'','message'=>''];
$sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $_POST["username"]);
$stmt->execute();
if ($stmt->get_result()->fetch_assoc()) {
    $res['reserved'] = true;
    $res['message'] = "Username is already taken.";
}
else {
    $res['reserved'] = false;
    $res['message'] = "Username is free.";
}

echo json_encode($res);
?>