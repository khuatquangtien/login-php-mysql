<?php
include "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Đăng ký thành công!";
    header("refresh:2; url=login.php");
} else {
    echo "Lỗi: " . $conn->error;
}
?>