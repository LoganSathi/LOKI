<?php
include 'nav.php';
include_once '../access/analysis.access.php';
include_once '../view/analysis.view.php';
$analysisView = new AnalysisView();

if (isset($_GET['selectedPeriod'])) {
    $selectedPeriod = $_GET['selectedPeriod'];
    $periodType = $_GET['periodType'];
} else {
    $selectedPeriod = date("Y-m-d");
    $periodType = "daily";
}

if (isset($_GET['form'])) {
    $form = $_GET['form'];
} else {
    if (isset($_SESSION['form'])) {
        $form = $_SESSION['form'];
    } else {
        $form = 'Form 1';
    }
}

?>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="../css/table.css">
<link rel="stylesheet" href="../css/analysis-class.css">


<title>SAR Analysis - Class</title>
<div class="outer-margin">
    <div class="inner-margin">
        <div id="upper-margin" class="animate__animated animate__fadeInUp">
            <div id="period-wrapper" class="animate__animated animate__fadeInUp">
                <div class="periodical-class">
                    <select name="periodical-name" id="periodical-id">
                        <option value="daily" <?php if ($periodType == 'daily') {
                                                    echo "selected='selected'";
                                                } ?>>DAILY</option>
                        <option value="monthly" <?php if ($periodType == 'monthly') {
                                                    echo "selected='selected'";
                                                } ?>>MONTHLY</option>
                        <option value="yearly" <?php if ($periodType == 'yearly') {
                                                    echo "selected='selected'";
                                                } ?>>YEARLY</option>
                    </select>
                </div>

                <div class="periodical-input-type-class">
                    <?php
                    if ($periodType == "daily") {

                        echo "<input type=\"date\" name=\"\" id=\"periodical-input-type-id\" value=\"$selectedPeriod\">";
                    } elseif ($periodType == "monthly") {

                        echo "<input type=\"month\" name\"\" id=\"periodical-input-type-id\" value=\"$selectedPeriod\">";
                    } elseif ($periodType == "yearly") {

                        echo "<select name=\"year_name\" id=\"periodical-input-type-id\">";

                        $yearCurr = date("Y");
                        $yearArr = array($yearCurr - 1, $yearCurr, $yearCurr + 1, $yearCurr + 2);

                        for ($i = 0; $i < 4; $i++) {
                            if ($selectedPeriod == $yearArr[$i]) {
                                echo "<option value\" $yearArr[$i]\" selected=\"selected\"> $yearArr[$i]</option>";
                            } else {
                                echo "<option value\" $yearArr[$i]\"> $yearArr[$i]</option>";
                            }
                        }

                        echo "</select>";
                    }
                    ?>
                </div>

                <button type="submit" id="submit-id">Submit</button>
            </div>
            <?php
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

            <div id="classbox" class="animate__animated animate__fadeInUp">
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
                            echo "<button class='class-div animate__animated animate__bounceIn' value='$id'>";
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
            </div>
            <?php
            if (isset($_SESSION['class'])) {
                $default_class = $_SESSION['class'];
            } else {
                $default_class = $classid_arr[0];
            }
            $result = $analysisView->fetchStudents($default_class);
            $studname_arr = array();
            $studid_arr = array();
            if ($result) {
                foreach ($result as $row) {
                    array_push($studid_arr, $row['id']);
                    array_push($studname_arr, $row['name']);
                }
            }

            $statement = $selectedPeriod . '%';
            $att_arr = array();
            for ($i = 0; $i < sizeof($studid_arr); $i++) {
                $result = $analysisView->studentPercentage($studid_arr[$i], $statement);
                if ($result) {
                    foreach ($result as $row) {
                        if ($row['total']) {
                            array_push($att_arr, $row['total']);
                        } else {
                            array_push($att_arr, 0);
                        }
                    }
                }
            }

            ?>
        </div>
        <div id="table-margin" class="animate__animated animate__fadeInUp">
            <table id="table" class="display nowrap stripe animate__animated animate__fadeInUp">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Student ID</th>
                        <th>Attendance Percentage</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    for ($i = 0; $i < sizeof($studid_arr); $i++) {
                        echo "<tr class='align-center animate__animated animate__fadeInUp'>";
                        echo "<td class='align-left'>" . $studname_arr[$i] . "</td>";
                        echo "<td>" . $studid_arr[$i] . "</td>";
                        echo "<td>" . $att_arr[$i] . "%</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $("#periodical-id").change(function() {
            var periodical_type = $("#periodical-id").val();

            $(".periodical-input-type-class").load("../ajax/analysisPeriodType.php", {
                periodType: periodical_type
            });
        });

        $("#submit-id").click(function() {
            var selected_period = $("#periodical-input-type-id").val();
            var periodical_type = $("#periodical-id").val();
            var selected_form = "<?php echo $form; ?>";
            var selected_class = "<?php echo $default_class; ?>";
            $.ajax({
                url: "../ajax/analysisClassPerc.php",
                method: "POST",
                data: {
                    selectedPeriod: selected_period,
                    form: selected_form
                },
                success: function(data) {
                    $('#classbox').html(data);
                }
            });

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
            echo "backgroundColor: ['rgb(137, 15, 102, 0.4)','#dbe0ebb9'],";
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

        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'print'
            ]
        });
    });
</script>

</html>