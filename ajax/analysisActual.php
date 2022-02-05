<?php
include_once '../view/analysis.view.php';
$analysisView = new AnalysisView();

date_default_timezone_set("Asia/Kuala_Lumpur");
$currentDate = date("Y-m-d");
?>
<div id="school-period-div">
    <div class="school-percentage-class animate__animated animate__fadeInUpBig">
        <span id="school-percentage-id">
            <?php
            $schoolTotal = 0;
            $result = $analysisView->schoolPercentage($currentDate . '%');
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
        </span>
        <?php $date = date_create($currentDate); ?>
        <p id="school-perc">Percentage of Attendance<br>on <span id="selected-period-id"><?php echo date_format($date, "d F Y"); ?></span></p>
    </div>

    <div id="period-box" class="animate__animated animate__fadeInUpBig">
        <div id="period-box-type-date">
            <div class="periodical-class">
                <select name="periodical-name" id="periodical-id">
                    <option value="daily" selected="selected">DAILY</option>
                    <option value="monthly">MONTHLY</option>
                    <option value="yearly">YEARLY</option>
                </select>
            </div>

            <div class="periodical-input-type-class">
                <?php
                echo "<input type=\"date\" name=\"\" id=\"periodical-input-type-id\" value=$currentDate>";
                ?>
            </div>
        </div>
        <div id="submit-div">
            <button type="submit" id="submit-id">SUBMIT</button>
        </div>
    </div>
</div>

<div class="form-percentage-class animate__animated animate__fadeInUpBig">
    <div id="form-percentage-id">
        <?php
        $result = $analysisView->fetchGroups();
        $forms_arr = array();
        if ($result) {
            foreach ($result as $row) {
                array_push($forms_arr, $row['form']);
            }
        }

        for ($i = 0; $i < sizeof($forms_arr); $i++) {
            $curr_form = $forms_arr[$i];
            $result = $analysisView->groupPercentage($currentDate . '%', $forms_arr[$i]);
            if ($result) {
                foreach ($result as $row) {
                    $total = $row['total'];
                    if ($total) {
                        echo "<a href=\"analysis-class.php?selectedPeriod=$currentDate&periodType=daily&form=$curr_form\" class='bar animate__animated animate__flipInX'><div id='space' style='width:$total%'><div id='progress-bar'></div></div><div id='form'>$curr_form</div><div id='total'>$total%</div></a>";
                    } else {
                        echo "<a href=\"analysis-class.php?selectedPeriod=$currentDate&periodType=daily&form=$curr_form\" class='bar animate__animated animate__flipInX'><div id='space' style='width:0%'></div><div id='form'>$curr_form</div><div id='total'>0%</div></a>";
                    }
                    /* echo "<div id='view-div'><a href=\"analysis-class.php?selectedPeriod=$currentDate&periodType=daily&form=$curr_form\" class='view-button' id='view-$i'>VIEW CLASSES</a></div>"; */
                }
            }
        }
        ?>
    </div>
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

        $("#periodical-id").change(function() {
            var periodical_type = $("#periodical-id").val();

            $(".periodical-input-type-class").load("../ajax/analysisPeriodType.php", {
                periodType: periodical_type
            });
        });

        $("#submit-id").click(function() {
            var selected_period = $("#periodical-input-type-id").val();
            var periodical_type = $("#periodical-id").val()

            $("#selected-period-id").load("../ajax/analysisSelectedPeriod.php", {
                selectedPeriod: selected_period,
                periodType: periodical_type
            });

            $("#school-percentage-id").load("../ajax/analysisSchoolPerc.php", {
                selectedPeriod: selected_period,
                periodType: periodical_type
            });

            $(".form-percentage-class").load("../ajax/analysisFormPerc.php", {
                selectedPeriod: selected_period,
                periodType: periodical_type
            });
        });

        $("#forcast-button").click(function() {
            $.ajax({
                url: "../ajax/analysisForcast.php",
                method: "POST",
                success: function(data) {
                    $(".inner-margin").html(data);
                }
            });
        });

    });
</script>