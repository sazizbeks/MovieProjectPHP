<?php
header('Content-Type: application/json');
include_once '../database/link.php';
$res=['reserved'=>'','message'=>''];
$sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $_POST["email"]);
$stmt->execute();
if ($stmt->get_result()->fetch_assoc()) {
    $res['reserved'] = true;
    $res['message'] = "Email is already taken.";
}
else {
    $res['reserved'] = false;
    $res['message'] = "Email is free.";
}

echo json_encode($res);
?>