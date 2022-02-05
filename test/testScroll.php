<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animation On Scroll</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<style>
    #div1 {
        background-color: green;
        width: 20vw;
        height: 90vh;
    }

    #div2 {
        background-color: red;
        width: 20vw;
        height: 50vh;
        margin-top: 50vh;
        margin-bottom: 20vh;
    }
</style>

<body>
    <div id="div1" data-aos="fade-right"></div>
    <div id="div2" data-aos="fade-left"></div>
</body>

<script>
    AOS.init();
</script>

</html>