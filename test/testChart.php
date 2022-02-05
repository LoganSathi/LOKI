<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<style>
    .chart-container {
        height: 22vh;
        width: 22vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #percentage {
        position: absolute;
        font-weight: bold;
        margin-top: 1vh;
    }

    #bar-div {
        width: 35vw;
    }
</style>

<body>
    <button class="chart-container" value='hello'>
        <canvas id="myChart"></canvas>
        <div id="percentage">90%</div>
    </button>
    <div id="bar-div">
        <canvas id="bar"></canvas>
    </div>
    <?php
    $arr = array(2000, 1500, 3000, 1527, 3779);
    ?>
</body>

<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Red',
                'Blue',
                'Yellow'
            ],
            datasets: [{
                data: [0, (100 - 0)],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ],
                borderWidth: [0]
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    <?php
    $jsArr = json_encode($arr);
    echo "var arr = " . $jsArr . ";";
    ?>
    var ctx2 = document.getElementById('bar');
    var bar = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge'],
            datasets: [{
                label: 'Attendance percentage',
                data: arr,
                borderColor: 'blue',
                backgroundColor: [
                    'green'
                ]
            }, {
                label: 'Attendance percentage',
                data: [1573, 1736, 4093, 2776, 3000],
                borderColor: 'red',
                backgroundColor: [
                    'orange'
                ]
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

</html>