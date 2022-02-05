<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="stylesheet" href="../css/404.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <?php
    include_once '../svg/404/index.html';
    ?>
    <div id="lower-div">
        <div id="message">Oops...Something went wrong</div>
        <i class="las la-angle-right" id="arrow"></i>
        <a href="../page/dashboard.php" id="redirect">
            Dashboard
        </a>
    </div>
</body>

</html>