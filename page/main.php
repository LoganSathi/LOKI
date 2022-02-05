<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="../config/lottie.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>LOKI</title>
    <link rel="shortcut icon" type="image/png" href="../svg/head-logo.png" />
</head>

<body>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn">&times;</div>
            <h1>Sign In</h1>
            <div id="username-div"><input id='username' type="text" placeholder="Username" required></div>
            <div id="pass-div"><input id='pass' type="password" placeholder="Password" required></div>
            <button id='login' type="submit">Login</button>
            <div id='response'></div>
        </div>
    </div>
    <div class="wrapper-margin">
        <div class="wrapper">
            <div id="login-div">
                <div class="flip">
                    <a id="open" target="_blank">
                        <div class="front">SIGN IN</div>
                        <div class="back">SIGN IN</div>
                    </a>
                </div>
            </div>
            <div id="title-wrapper">
                <div id="title"></div>
            </div>
            <div id="features">
                <div class="qrcode-div" data-aos="fade-right">
                    <?php
                    include_once '../svg/qrcode/loki-qrcode.svg';
                    ?>
                    <div id="wrapper-desc">
                        <div id="description-qrcode">
                            <img src="../svg/qrcode/qrcode-text.png" id="sub-qrcode" data-aos="flip-down">
                            <div data-aos="fade-up-left">Fast and Secure scanning with unique QR Codes for each and every student</div>
                        </div>
                    </div>
                </div>

                <div class="calendar-div" data-aos="fade-left">
                    <div id="wrapper-desc">
                        <div id="description-calendar">
                            <img src="../svg/calendar/calendar-text.png" id="sub-calendar" data-aos="flip-down">
                            <div data-aos="fade-up-right">Manually select between school and non-school days at any time</div>
                        </div>
                    </div>
                    <div id="calendar">
                        <?php
                        include_once '../svg/calendar/loki-calendar.svg';
                        ?>
                    </div>
                    <div id="calendar"></div>
                </div>

                <div class="analysis-div" data-aos="fade-right">
                    <?php
                    include_once '../svg/analysis/loki-analysis.svg';
                    ?>
                    <div id="wrapper-desc">
                        <div id="description-analysis">
                            <img src="../svg/analysis/analysis-text.png" id="sub-analysis" data-aos="flip-down">
                            <div data-aos="fade-up-left">Fully automated and precise analysis on the attendance</div>
                        </div>
                    </div>
                </div>

                <div class="admin-div" data-aos="fade-left">
                    <div id="wrapper-desc">
                        <div id="description-admin">
                            <img src="../svg/admin/admin-text.png" id="sub-admin" data-aos="flip-down">
                            <div data-aos="fade-up-right">Safe and well maintain by only one selected admin in school</div>
                        </div>
                    </div>
                    <?php
                    include_once '../svg/admin/loki-admin.svg';
                    ?>
                    <div id="admin"></div>
                </div>

                <div class="teacher-div" data-aos="fade-right">
                    <?php
                    include_once '../svg/teacher/loki-teacher.svg';
                    ?>
                    <div id="wrapper-desc">
                        <div id="description-teacher">
                            <img src="../svg/teacher/teacher-text.png" id="sub-teacher" data-aos="flip-down">
                            <div data-aos="fade-up-left">Manage attendance and notify parents with just clicks</div>
                        </div>
                    </div>
                </div>

                <div class="warning-div" data-aos="fade-left">
                    <div id="wrapper-desc">
                        <div id="description-warning">
                            <img src="../svg/warning/warning-text.png" id="sub-warning" data-aos="flip-down">
                            <div data-aos="fade-up-right">Automated email warning letter for students who skip school frequently</div>
                        </div>
                    </div>
                    <?php
                    include_once '../svg/warning/loki-warning.svg';
                    ?>
                    <div id="warning"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#login').click(function() {
            var username = $('#username').val();
            var pass = $('#pass').val();

            $.ajax({
                url: '../ajax/loginCheck.php',
                method: 'POST',
                data: {
                    Username: username,
                    Password: pass
                },
                success: function(response) {
                    $("#response").html(response);
                    if (response.indexOf('success') >= 0) {
                        window.location = "dashboard.php";
                    }
                }
            });
        });

        $('#open').click(function() {
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo "window.location = 'dashboard.php';";
            } else {
                echo "$('#popup-1').toggleClass('active');";
            }
            ?>
        });
        $('.close-btn').click(function() {
            $('#popup-1').toggleClass('active');
            $("#response").html('');
            $('#username').val('');
            $('#pass').val('');
        });

        var containerTitle = document.getElementById('title');

        var animationTitle = bodymovin.loadAnimation({
            container: containerTitle,
            path: '../svg/title/data.json',
            renderer: 'svg',
            loop: false,
            autoplay: true
        });

        window.onscroll = function() {
            scrollFunction();
            titleScroll();
            console.log(document.documentElement.scrollTop);
        };

        function scrollFunction() {
            if (document.body.scrollTop > 80 && document.body.scrollTop <= 110 || document.documentElement.scrollTop > 80 && document.documentElement.scrollTop <= 110) {
                document.getElementById("title").style.width = "60%";
                document.getElementById("title").style.top = "15%";
            } else if (document.body.scrollTop > 110 && document.body.scrollTop <= 200 || document.documentElement.scrollTop > 110 && document.documentElement.scrollTop <= 200) {
                document.getElementById("title").style.width = "30%";
                document.getElementById("title").style.top = "5%";
            } else if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                document.getElementById("title").style.width = "7%";
                document.getElementById("title").style.top = "30%";
            } else {
                document.getElementById("title").style.width = "80vw";
                document.getElementById("title").style.top = "20%";
            }
        }

        function titleScroll() {
            if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                $("#title").css("opacity", "0");
            } else {
                $("#title").css("opacity", "1");
            }
        }

        AOS.init();
    });
</script>