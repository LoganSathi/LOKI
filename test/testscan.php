<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    #outer {
        width: 70%;
        height: 90vh;
        margin: auto;
        background-color: palegoldenrod;
        display: flex;
        flex: 1;
    }

    #box-1 {
        height: 300px;
        width: 300px;
        background-color: palegreen;
    }

    #box-2 {
        background-color: greenyellow;
        height: 300px;
        margin-left: auto;
    }

    #period {
        display: flex;
        border: 1px solid;
        width: fit-content;
        height: fit-content;

    }

    #type,
    #date {
        height: 50px;
        width: 200px;
        background-color: blue;
        margin: 5px;

    }

    #submit {
        height: 50px;
        width: 200px;
        background-color: palevioletred;
        margin: 5px;
    }

    #submit-div {
        display: flex;
        background-color: pink;
        justify-content: right;
    }
</style>

<body>
    <div id="outer">
        <div id="box-1"></div>
        <div id="box-2">
            <div id="selection">
                <div id="period">
                    <div id="type"></div>
                    <div id="date"></div>
                </div>
                <div id="submit-div">
                    <div id="submit"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>