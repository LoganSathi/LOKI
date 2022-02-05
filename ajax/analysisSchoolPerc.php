<?php
include_once '../view/analysis.view.php';
$analysisView = new AnalysisView();

$selectedPeriod = $_POST["selectedPeriod"];
$periodType = $_POST["periodType"];

$statement = $selectedPeriod . '%';
$schoolTotal = 0;
$result = $analysisView->schoolPercentage($statement);
if ($result) {
    foreach ($result as $row) {
        if ($row['total']) {
            $schoolTotal = $row['total'];
        }
    }
}
?>

<div class='skill'>
    <button class="chart-container">
        <canvas id="myChart"></canvas>
        <div id="percentage"><?php echo $schoolTotal; ?>%</div>
    </button>
</div>

<script>
    $(document).ready(function() {
        var total = '<?php echo $schoolTotal; ?>';
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Present', 'Absent'],
                datasets: [{
                    data: [total, (100 - total)],
                    backgroundColor: ['rgb(137, 15, 102, 0.4)', '#dbe0ebb9'],
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
    });
</script>