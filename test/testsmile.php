<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="config/lottie.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
    .bt {
        height: 150px;
        width: 150px;
        margin: 10px;
        background: none;
        border: none;
    }
</style>

<body>
    <button class='bt' id="container" value="1"></button>
    <button class='bt' id="container2" value="0"></button>
</body>

<?php
$arr = array();
array_push($arr, 'container');
array_push($arr, 'container2');


$val_arr = array();
array_push($val_arr, '1');
array_push($val_arr, '0');
?>

<script>
    $(document).ready(function() {
        <?php
        /* for ($i = 0; $i < sizeof($arr); $i++) {
            echo "var container$arr[$i] = document.getElementById('$arr[$i]');";
            echo "if ($('#$arr[$i]').val() == 1) {var state$arr[$i] = 'present'} else {var state$arr[$i] = 'absent'}";
            echo "var animation$arr[$i] = bodymovin.loadAnimation({container: container$arr[$i],path: 'svg/student/data.json',renderer: 'svg',loop: false,autoplay: false});";
            echo "if (state$arr[$i] == 'present') {animation$arr[$i].goToAndStop(180, true);} else {animation$arr[$i].goToAndStop(350, true);}";
            echo "container$arr[$i].addEventListener('click', () => {if (state$arr[$i] === 'present') {animation$arr[$i].playSegments([180, 350], true);state$arr[$i] = 'absent';} else {animation$arr[$i].playSegments([0, 180], true);state$arr[$i] = 'present';}});";
        } */
        ?>

        var container = document.getElementById('container');
        if ($('#container').val() == 1) {
            var state = 'play';
        } else {
            var state = 'pause';
        }

        var animation = bodymovin.loadAnimation({
            container: container,
            path: 'svg/student/data.json',
            renderer: 'svg',
            loop: false,
            autoplay: false
        });

        if (state == 'play') {
            animation.goToAndStop(180, true);
        } else {
            animation.goToAndStop(350, true);
        }

        container.addEventListener('click', () => {
            if (state === 'play') {
                animation.playSegments([180, 350], true);

                state = 'pause';

            } else {
                animation.playSegments([0, 180], true);
                state = 'play';
            }
        });

        var container2 = document.getElementById('container2');
        if ($('#container2').val() == 1) {
            var state2 = 'play';
        } else {
            var state2 = 'pause';
        }

        var animation2 = bodymovin.loadAnimation({
            container: container2,
            path: 'svg/student/data.json',
            renderer: 'svg',
            loop: false,
            autoplay: false
        });

        if (state2 == 'play') {
            animation2.goToAndStop(180, true);
        } else {
            animation2.goToAndStop(350, true);
        }

        container2.addEventListener('click', () => {
            if (state2 === 'play') {
                animation2.playSegments([180, 350], true);
                state2 = 'pause';
            } else {
                animation2.playSegments([0, 180], true);
                state2 = 'play';
            }
        });
    });
</script>

</html>