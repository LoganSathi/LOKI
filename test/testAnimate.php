<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    #outer-div {
        width: fit-content;
        height: fit-content;
        background-color: red;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #div-sub1 {
        background-color: blue;
        /* width: 30vw;
        height: 80vh; */
        margin: 3vh;
        margin-right: 1.5vh;
    }

    #div-sub2 {
        background-color: blueviolet;
        /* width: 20vw;
        height: 80vh; */
        margin: 3vh;
        margin-left: 1.5vh;
    }

    #div1 {
        background-color: burlywood;
        width: 25vw;
        height: 6vh;
        margin: 2vh;
    }

    #div2 {
        background-color: burlywood;
        width: 25vw;
        height: 70vh;
        margin: 2vh;
    }

    #div3 {
        background-color: burlywood;
        width: 10vw;
        height: 78vh;
        margin: 2vh;
    }

    #div2 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }

    #div3 {
        -webkit-animation-delay: 0.2s;
        animation-delay: 0.2s;
    }
</style>

<body>
    <!-- <h1 class="animate__animated animate__backInUp">An animated element</h1> -->
    <div id="outer-div">
        <div id="div-sub1">
            <div class="animate__animated animate__backInUp" id="div1"></div>
            <div class="animate__animated animate__backInUp" id="div2"></div>
        </div>
        <div id="div-sub2">
            <div class="animate__animated animate__backInRight" id="div3"></div>
        </div>
    </div>
</body>

</html>