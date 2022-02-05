<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        font-family: Montserrat, sans-serif;
        font-weight: 400;
    }

    .flip {
        position: absolute;
        width: 160px;
        height: 48px;
        perspective: 500px;
        top: 50%;
        left: 50%;
    }

    .flip a {
        font-weight: 400;
        text-transform: uppercase;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        transform-style: preserve-3d;
        transform: translateZ(-25px);
        transition: transform 0.3s;
        cursor: pointer;
    }

    .flip a .front,
    .flip a .back {
        margin: 0;
        width: 160px;
        height: 48px;
        line-height: 48px;
        position: absolute;
        text-align: center;
        letter-spacing: 0.4em;
    }

    .flip a .front {
        background-color: #fff;
        color: #c498c2;
        transform: rotateY(0) translateZ(24px);
    }

    .flip a .back {
        background-color: #8fa2d9;
        color: rgba(34, 34, 34, 0);
        transform: rotateX(90deg) translateZ(24px);
        overflow: hidden;
    }

    .flip a .back:after {
        content: '';
        position: absolute;
        top: -32%;
        left: -10%;
        width: 120%;
        height: 50%;
        background: #fff;
        transform: rotate(8deg);
        transition: all 0.5s ease;
        transition-delay: 0.15s;
    }

    .flip a:hover {
        transform: translateZ(-24px) rotateX(-90deg);
    }

    .flip a:hover .front {
        background: #000;
        transition: all 0.8s ease;
    }

    .flip a:hover .back {
        color: #fff;
        transition: color 0.4s linear;
        background: linear-gradient(180deg, #c498c2, #8fa2d9);
    }

    .flip a:hover .back:after {
        transform: rotate(6deg) translate(100px, -18px);
    }
</style>

<body>
    <div>
        <div class="flip">
            <a target="_blank">
                <div class="front">FLIP</div>
                <div class="back">FLIP</div>
            </a>
        </div>
    </div>
</body>

</html>