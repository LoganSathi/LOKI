<?php
$currentDate = date('Y-m');
$result = $dashboardView->fetchGroups();
$formPercArr = array();
if ($result) {
    foreach ($result as $row) {
        $formPerc = $dashboardView->groupPercentage($currentDate . '%', $row['form']);
        array_push($formPercArr, $formPerc);
    }
}
?>

<div id="bar-div">
    <canvas id="bar"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    <?php
    $jsArr = json_encode($formPercArr);
    echo "var arr = " . $jsArr . ";";
    ?>
    var ctx2 = document.getElementById('bar');
    var bar = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Form 1', 'Form 2', 'Form 3', 'Form 4', 'Form 5', 'Form 6'],
            datasets: [{
                label: 'Attendance percentage',
                data: arr,
                backgroundColor: [
                    '#f72585', '#7209b7', '#480ca8', '#3f37c9', '#4895ef', '#4cc9f0'
                ]
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            animation: {
                delay: 1500
            }
        }
    });
</script>