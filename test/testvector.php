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
    #cloud {
        background-image: url('svg/cloud.jpg');
        height: 433px;
        width: 1000px;
        background-repeat: no-repeat;
    }

    #qrcode {
        background: linear-gradient(180deg,
                rgba(137, 15, 102, 0.4) 0%,
                rgba(5, 39, 160, 0.4) 100%);
        height: 950px;
    }

    #analysis {
        height: 1000px;
        background: linear-gradient(0deg,
                rgba(137, 15, 102, 0.4) 0%,
                rgba(5, 39, 160, 0.4) 100%);
    }

    #calendar {
        background: linear-gradient(180deg,
                rgba(137, 15, 102, 0.4) 0%,
                rgba(5, 39, 160, 0.4) 100%);
        height: 900px;
    }

    #teacher {
        background: linear-gradient(180deg,
                rgba(137, 15, 102, 0.4) 0%,
                rgba(5, 39, 160, 0.4) 100%);
        height: 800px;
    }

    #admin {
        background: linear-gradient(0deg,
                rgba(137, 15, 102, 0.4) 0%,
                rgba(5, 39, 160, 0.4) 100%);
        height: 900px;
    }

    #warning {
        background: linear-gradient(0deg,
                rgba(137, 15, 102, 0.4) 0%,
                rgba(5, 39, 160, 0.4) 100%);
        height: 900px;
    }
</style>

<body>
    <div id="margin">
        <div id="cloud"></div>
        <div id="qrcode"></div>
        <div id="analysis"></div>
        <div id="calendar"></div>
        <div id="admin"></div>
        <div id="teacher"></div>
        <div id="warning"></div>
    </div>
</body>
<script>
    $(document).ready(function() {
        var container1 = document.getElementById('teacher');

        var animation1 = bodymovin.loadAnimation({
            container: container1,
            path: 'svg/teacher/data.json',
            renderer: 'svg',
            loop: true,
            autoplay: true
        });

        var container2 = document.getElementById('admin');

        var animation2 = bodymovin.loadAnimation({
            container: container2,
            path: 'svg/admin/data.json',
            renderer: 'svg',
            loop: true,
            autoplay: true
        });

        var container3 = document.getElementById('calendar');

        var animation3 = bodymovin.loadAnimation({
            container: container3,
            path: 'svg/calendar/data.json',
            renderer: 'svg',
            loop: true,
            autoplay: true
        });

        var container4 = document.getElementById('analysis');

        var animation4 = bodymovin.loadAnimation({
            container: container4,
            path: 'svg/analysis/data.json',
            renderer: 'svg',
            loop: true,
            autoplay: true
        });

        var container5 = document.getElementById('qrcode');

        var animation5 = bodymovin.loadAnimation({
            container: container5,
            path: 'svg/qrcode/data.json',
            renderer: 'svg',
            loop: true,
            autoplay: true
        });

        var container6 = document.getElementById('warning');

        var animation6 = bodymovin.loadAnimation({
            container: container6,
            path: 'svg/warning/data.json',
            renderer: 'svg',
            loop: true,
            autoplay: true
        });
    });
</script>

</html>