<?php
include_once '../view/analysis.view.php';
$analysisView = new AnalysisView();

$y = array();
$x = array();
$dateArr = array();
$data = $analysisView->fetchData();
if ($data) {
    foreach ($data as $row) {
        array_push($y, $row['attendance']);
        if ($row['day'] == 'Mon') {
            array_push($x, 0.7);
        } elseif ($row['day'] == 'Tue') {
            array_push($x, 0.9);
        } elseif ($row['day'] == 'Wed') {
            array_push($x, 0.8);
        } elseif ($row['day'] == 'Thu') {
            array_push($x, 0.9);
        } elseif ($row['day'] == 'Fri') {
            array_push($x, 0.7);
        } elseif ($row['day'] == 'Sat') {
            array_push($x, 0.3);
        } elseif ($row['day'] == 'Sun') {
            array_push($x, 0.1);
        }
    }
}

$days = $analysisView->fetchDay();
$probabilityArr = array();
if ($days) {
    foreach ($days as $row) {
        array_push($dateArr, $row['date']);
        if ($row['day'] == 'Mon') {
            array_push($probabilityArr, 0.7);
        } elseif ($row['day'] == 'Tue') {
            array_push($probabilityArr, 0.9);
        } elseif ($row['day'] == 'Wed') {
            array_push($probabilityArr, 0.8);
        } elseif ($row['day'] == 'Thu') {
            array_push($probabilityArr, 0.9);
        } elseif ($row['day'] == 'Fri') {
            array_push($probabilityArr, 0.7);
        } elseif ($row['day'] == 'Sat') {
            array_push($probabilityArr, 0.3);
        } elseif ($row['day'] == 'Sun') {
            array_push($probabilityArr, 0.1);
        }
    }
}

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

if (!empty($x) || !empty($y)) {
    $array = linear_regression($x, $y);
    $trend = array();

    for ($i = 0; $i < sizeof($probabilityArr); $i++) {
        $number = ($array['slope'] * $probabilityArr[$i]) + $array['intercept'];
        $number = ($number <= 0) ? 0 : $number;
        array_push($trend, $number);
    }
}
?>

<div id="graph-div" class="animate__animated animate__fadeInUp">
    <canvas id="myChart"></canvas>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        $("#analysis-button").click(function() {
            $.ajax({
                url: "../ajax/analysisActual.php",
                method: "POST",
                success: function(data) {
                    $(".inner-margin").html(data);
                }
            });
            $(this).css('background', '#c498c2');
            $(this).css('color', '#fff');
            $("#forcast-button").css('background', 'none');
            $("#forcast-button").css('color', '#c498c2');
        });

        <?php
        if (!empty($x) || !empty($y)) {
            $y_js_arr = json_encode($y);
            echo  'var yArr = ' . $y_js_arr . ';';
            $trend_js_arr = json_encode($trend);
            echo  'var trendArr = ' . $trend_js_arr . ';';
            $date_js_arr = json_encode($dateArr);
            echo  'var dateArr = ' . $date_js_arr . ';';
        }
        ?>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dateArr,
                datasets: [{
                        label: 'Actual',
                        data: yArr,
                        borderColor: '#8fa2d9',
                        backgroundColor: '#8fa2d9'
                    },
                    {
                        label: 'Forcast',
                        data: trendArr,
                        borderColor: '#c498c2',
                        backgroundColor: '#c498c2'
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
    });
</script>