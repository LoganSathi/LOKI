<?php
include_once '../view/warning.view.php';
$warningView = new WarningView();
$result = $warningView->fetchListException();
?>
<div id="exception-table-margin">
    <table id="table" class="display nowrap stripe animate__animated animate__fadeInUp">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Class</th>
                <th>From</th>
                <th>Until</th>
                <th>Description</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody id="exception-table-body">
            <?php
            if ($result) {
                foreach ($result as $row) {
                    $exceptionId = $row['id'];
                    $studentName = $row['name'];
                    $class = $row['class'];
                    $from = $row['start_date'];
                    $to = $row['end_date'];
                    $desc = $row['description'];
                    $fileType = $row['file_type'];
                    echo "<tr id='$exceptionId-row' class='table-row animate__animated animate__fadeInUp'>";
                    echo "<td>$studentName</td>";
                    echo "<td>$class</td>";
                    echo "<td>$from</td>";
                    echo "<td>$to</td>";
                    echo "<td id='$exceptionId-desc'>$desc</td>";
                    echo "<td id='lastRow'>";
                    if ($fileType) {
                        echo "<a class='download-button animate__animated animate__bounceIn' href='../upload/$exceptionId.$fileType' download></a>";
                    } else {
                        echo "<a class='download-button animate__animated animate__bounceIn'></a>";
                    }
                    echo "<button class='edit-button animate__animated animate__bounceIn' value='$exceptionId'></button>";
                    echo "<button class='delete-button animate__animated animate__bounceIn' value='$exceptionId'></button>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(".edit-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/warningExceptionEditForm.php",
                method: "GET",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $('#content-body').html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $(".delete-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/warningExceptionDeleteForm.php",
                method: "GET",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $('#content-body').html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $('#table').DataTable();
    });
</script>