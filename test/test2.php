<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<style>
    .popup .overlay {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 1;
        display: none;
    }

    .popup .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        background: #fff;
        width: 450px;
        height: 220px;
        z-index: 2;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    }

    .popup .close-btn {
        cursor: pointer;
        position: absolute;
        right: 20px;
        top: 20px;
        width: 30px;
        height: 30px;
        background: #222;
        color: #fff;
        font-size: 25px;
        font-weight: 600;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
    }

    .popup.active .overlay {
        display: block;
    }

    .popup.active .content {
        transition: all 300ms ease-in-out;
        transform: translate(-50%, -50%) scale(1);
    }
</style>

<body>
    <div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn">&times;</div>
            <h1>Title</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type.</p>
        </div>
    </div>
    <button id='open'>Show Popup</button>
</body>

</html>
<script>
    /* function togglePopup() {
        document.getElementById("popup-1").classList.toggle("active");
    } */
    $(document).ready(function() {
        $('#open').click(function() {
            $('#popup-1').toggleClass('active');
        });
        $('.close-btn').click(function() {
            $('#popup-1').toggleClass('active');
        });
    });
</script>