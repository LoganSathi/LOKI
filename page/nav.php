<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../page/main.php');
    exit();
}
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.1/dist/ionicons.js"></script>
    <link rel="stylesheet" href="../css/nav.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.5/css/unicons.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="../config/lottie.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="shortcut icon" type="image/png" href="../svg/head-logo.png" />
</head>

<body>
    <?php
    if ($_SESSION['type'] == 'Admin') {
        include '../nav/admin.nav.php';
    } elseif ($_SESSION['type'] == 'Coordinator') {
        include '../nav/coordinator.nav.php';
    } elseif ($_SESSION['type'] == 'Class Teacher') {
        include '../nav/cteacher.nav.php';
    } elseif ($_SESSION['type'] == 'Teacher') {
        include '../nav/teacher.nav.php';
    }
    ?>
    <!-- <section class="home-section">
        <div class="text">Dashboard</div>
    </section> -->
    <script>
        $(document).ready(function() {
            var container = document.getElementById('logo');

            var animation = bodymovin.loadAnimation({
                container: container,
                path: '../svg/logo/data.json',
                renderer: 'svg',
                loop: true,
                autoplay: true
            });

            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".bx-search");

            closeBtn.addEventListener("click", () => {
                sidebar.classList.toggle("open");
                menuBtnChange(); //calling the function(optional)
            });

            searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
                sidebar.classList.toggle("open");
                menuBtnChange(); //calling the function(optional)
            });

            // following are the code to change sidebar button(optional)
            function menuBtnChange() {
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
                }
            }
        });
    </script>