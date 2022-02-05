<?php


$servername = "localhost";
$uname = "root";
$password = "";
$dbname = "qr-sas";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $uname, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

try {
    $sql = "SELECT `date` FROM `calendar`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if ($result) {
        foreach ($result as $row) {
            $date = $row['date'];
            $sql = "INSERT INTO `forcast` (`date`) VALUES ('$date')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
}
