<?php
include_once '../view/analysis.view.php';
$analysisView = new AnalysisView();

$selectedPeriod =  $_POST['selectedPeriod'];
$selectedClass = $_POST['class'];

$result = $analysisView->fetchStudents($selectedClass);
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

<table class="table table-fluid stripe animate__animated animate__fadeInUp" id="table-view">
    <thead>
        <tr>
            <th>Name</th>
            <th>Student ID</th>
            <th>Attendance Percentage</th>
        </tr>
    </thead>
    <tbody>
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

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table-view').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'print'
            ]
        });
    });
</script>