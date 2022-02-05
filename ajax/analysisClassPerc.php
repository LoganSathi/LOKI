<?php
include_once '../view/analysis.view.php';
$analysisView = new AnalysisView();

$selectedPeriod = $_POST['selectedPeriod'];
$form = $_POST['form'];

$result = $analysisView->fetchClasses($form);
$classid_arr = array();
$classname_arr = array();
$amount_arr = array();
if ($result) {
    foreach ($result as $row) {
        array_push($classid_arr, $row['id']);
        array_push($classname_arr, $row['name']);
        array_push($amount_arr, $row['student_amount']);
    }
}
?>

<?php
$total_arr = array();
$statement = $selectedPeriod . '%';
for ($i = 0; $i < sizeof($classid_arr); $i++) {
    $id = $classid_arr[$i];
    $class_name = $classname_arr[$i];
    $amount = $amount_arr[$i];
    $result = $analysisView->classPercentage($id, $statement);
    if ($result) {
        foreach ($result as $row) {
            $total = $row['total'];
            if (!$total) {
                $total = 0;
            }
            array_push($total_arr, $total);
            echo "<button class='class-div' value='$id'>";
            echo "<div class='button-upper'>";
            echo "<canvas id='$id-chart'></canvas>";
            echo "<div class='percentage'>$total%</div>";
            echo "</div>";
            echo "<div class='button-lower'>";
            echo "<div class='class-name'>$class_name</div>";
            echo "<div class='amount'>$amount Students</div>";
            echo "</div>";
            echo "</button>";
        }
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        <?php
        for ($i = 0; $i < sizeof($classid_arr); $i++) {
            $class_id = $classid_arr[$i];
            $total_chart = $total_arr[$i];
            echo "var ctx_$class_id = document.getElementById('$class_id-chart');";
            echo "var myChart_$class_id = new Chart(ctx_$class_id, {";
            echo "type: 'doughnut',";
            echo "data: {";
            echo "labels: ['Present', 'Absent'],";
            echo "datasets: [{";
            echo "data: [$total_chart, (100 - $total_chart)],";
            echo "backgroundColor: ['#c498c2','#dbe0ebb9'],";
            echo "borderWidth: [0]";
            echo "}]},";
            echo "options: {plugins: {legend: {display: false}}}});";
        }
        ?>

        $(".class-div").click(function() {
            var selected_period = $("#periodical-input-type-id").val();
            var selected_class = $(this).val();
            $.ajax({
                url: "../ajax/analysisStudentPerc.php",
                method: "POST",
                data: {
                    selectedPeriod: selected_period,
                    class: selected_class
                },
                success: function(data) {
                    $('#table-margin').html(data);
                }
            });
        });
    });
</script>