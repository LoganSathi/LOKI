<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../page/main.php');
    exit();
}
include_once '../access/qrscan.access.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/qrscan.css">
    <link rel="shortcut icon" type="image/png" href="../svg/head-logo.png" />
</head>


<body>
    <div id="video-div">
        <div id="video-margin">
            <video id="preview"></video>
            <div id="scanned-div"></div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        var dt = new Date();
        var currentDate = dt.getFullYear() + "-" + (dt.getMonth() + 1) + "-" + dt.getDate();
        console.log(currentDate);

        var scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            scanPeriod: 1,
            mirror: false
        });
        scanner.addListener('scan', function(content) {
            $.ajax({
                url: "../ajax/qrscanUpdate.php",
                method: "POST",
                data: {
                    id: content,
                    date: currentDate
                },
                success: function(data) {
                    $('#scanned-div').prepend(data);
                }
            });
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
                $('[name="options"]').on('change', function() {
                    if ($(this).val() == 1) {
                        if (cameras[0] != "") {
                            scanner.start(cameras[0]);
                        } else {
                            alert('No Front camera found!');
                        }
                    } else if ($(this).val() == 2) {
                        if (cameras[1] != "") {
                            scanner.start(cameras[1]);
                        } else {
                            alert('No Back camera found!');
                        }
                    }
                });
            } else {
                console.error('No cameras found.');
                alert('No cameras found.');
            }
        }).catch(function(e) {});
    });
</script>

</html>