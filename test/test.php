<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            height: 2000px;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        #header {
            background-color: #f1f1f1;
            padding: 0px 10px;
            color: black;
            text-align: center;
            font-size: 200px;
            font-weight: bold;
            position: fixed;
            top: 30%;
            width: 100%;
            transition: 0.2s;
        }
    </style>
</head>

<body>
    <img src="loki-font.jpg" alt="" id="header">
</body>

</html>
<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 80 && document.body.scrollTop <= 110 || document.documentElement.scrollTop > 80 && document.documentElement.scrollTop <= 110) {
            document.getElementById("header").style.fontSize = "100px";
            document.getElementById("header").style.color = "orange";
            document.getElementById("header").style.width = "60%";
            document.getElementById("header").style.top = "15%";
        } else if (document.body.scrollTop > 110 && document.body.scrollTop <= 200 || document.documentElement.scrollTop > 110 && document.documentElement.scrollTop <= 200) {
            document.getElementById("header").style.fontSize = "60px";
            document.getElementById("header").style.color = "blue";
            document.getElementById("header").style.width = "30%";
            document.getElementById("header").style.top = "5%";
        } else if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            document.getElementById("header").style.fontSize = "30px";
            document.getElementById("header").style.color = "red";
            document.getElementById("header").style.width = "10%";
            document.getElementById("header").style.top = "5%";
        } else {
            document.getElementById("header").style.fontSize = "200px";
            document.getElementById("header").style.width = "100%";
            document.getElementById("header").style.top = "30%";
        }
    }
</script>