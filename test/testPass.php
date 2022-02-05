<?php
$servername = "localhost";
$uname = "root";
$password = "";
$dbname = "qr-sas";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$pass = password_hash('password', PASSWORD_DEFAULT);
try {
    $sql = "UPDATE `account` SET `password` = ? WHERE `account`.`id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$pass, 77]);
} catch (PDOException $e) {
}
