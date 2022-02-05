<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linear Regression</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="bar-div">
        <canvas id="myChart"></canvas>
    </div>
    <?php
    $x = array(1, 2, 3, 4, 5);
    $y = array(70, 75, 73.4, 78, 69);

    function linear_regression($x, $y)
    {

        $n     = count($x);     // number of items in the array
        $x_sum = array_sum($x); // sum of all X values
        $y_sum = array_sum($y); // sum of all Y values

        $xx_sum = 0;
        $xy_sum = 0;

        for ($i = 0; $i < $n; $i++) {
            $xy_sum += ($x[$i] * $y[$i]);
            $xx_sum += ($x[$i] * $x[$i]);
        }

        // Slope
        $slope = (($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum));

        // calculate intercept
        $intercept = ($y_sum - ($slope * $x_sum)) / $n;

        return array(
            'slope'     => $slope,
            'intercept' => $intercept,
        );
    }

    $array = linear_regression($x, $y);
    $trend = array();

    for ($i = 0; $i < sizeof($x); $i++) {
        $number = ($array['slope'] * $x[$i]) + $array['intercept'];
        $number = ($number <= 0) ? 0 : $number;
        echo '"' . $number . '", ';
        array_push($trend, $number);
    }
    ?>
</body>

<script>
    var dateArr = ['2022-02-01', '2022-02-02', '2022-02-03', '2022-02-04', '2022-02-05', '2022-02-06', '2022-02-07', '2022-02-08', '2022-02-09', '2022-02-10'];
    <?php
    $y_js_arr = json_encode($y);
    echo  'var yArr = ' . $y_js_arr . ';';
    $trend_js_arr = json_encode($trend);
    echo  'var trendArr = ' . $trend_js_arr . ';';
    ?>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [{
                    label: 'Actual',
                    data: yArr,
                    borderColor: 'blue',
                    backgroundColor: 'blue'
                },
                {
                    label: 'Forcast',
                    data: trendArr,
                    borderColor: 'red',
                    backgroundColor: 'red'
                }
            ]
        },
        options: {
            scales: {
                y: {
                    suggestedMin: 0,
                    suggestedMax: 100,
                }
            }
        }
    });
</script>

</html>