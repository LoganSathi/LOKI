<?php
include_once '../view/student.view.php';
$studentView = new StudentView();
if (empty($_POST['selectedQR'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    $idArr = $_POST['selectedQR'];
}
/* $idArr = array();
for ($i = 0; $i < 20; $i++) {
    array_push($idArr, $i);
} */
$nameArr = array();
$classArr = array();
foreach ($idArr as $id) {
    $result = $studentView->fetchName($id);
    foreach ($result as $row) {
        array_push($nameArr, $row['name']);
        array_push($classArr, $row['class']);
    }
}
?>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="../css/qr-print.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../svg/head-logo.png" />
<title>QR Codes</title>

<div id="outer">
    <div id="inner">
        <?php
        $i = 0;
        foreach ($idArr as $selected) {
            echo "<div id='card'><div id='card-header'><div id='label'>Name:</div><div id='info'>$nameArr[$i]</div><div id='label'>Class:</div><div id='info'>$classArr[$i]</div></div><div id='$selected' class='qr'></div></div>";
            if (($i + 1) % 9 == 0) {
                echo "<div class='pagebreak'>LOKI-QRCode</div>";
            }
            $i++;
        }
        ?>
    </div>
</div>

<!-- div id="qrcode-2">
    </div> -->
<script>
    $(document).ready(function() {
        <?php
        for ($i = 0; $i < sizeof($idArr); $i++) {
            echo "var qrcode = new QRCode(document.getElementById('$idArr[$i]'), {";
            echo "text: '$idArr[$i]',";
            echo "width: 70,";
            echo "height: 70,";
            echo "colorDark: '#800080',";
            echo "colorLight: '#ffffff',";
            echo "correctLevel: QRCode.CorrectLevel.H});";
        }
        ?>
        /* var qrcode = new QRCode(document.getElementById("qrcode-2"), {
            text: "1",
            width: 128,
            height: 128,
            colorDark: "#800080",
            colorLight: '#ffffff',
            correctLevel: QRCode.CorrectLevel.H
        }); */

        window.print();
    });
</script>