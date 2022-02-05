<?php
include_once '../view/warning.view.php';
$warningView = new WarningView();
$result = $warningView->fetchList();
?>
<table id="table" class="display nowrap stripe animate__animated animate__fadeInUp">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Class</th>
            <th>Case</th>
            <th>Action(s)</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php
        if ($result) {
            $count = 0;
            foreach ($result as $row) {
                $warningId = $row['id'];
                $studentName = $row['name'];
                $class = $row['class'];
                $case = $row['case'];
                echo "<tr id='$warningId-row' class='table-row animate__animated animate__fadeInUp'>";
                echo "<td>$studentName</td>";
                echo "<td>$class</td>";
                echo "<td>$case</td>";
                echo "<td id='lastRow'>";
                echo "<button class='view-button animate__animated animate__bounceIn' value='$warningId'></button>";
                echo "<a class='download-button animate__animated animate__bounceIn' href='../TCPDF-main/generated-warning/$warningId.pdf' download></a>";
                echo "<button class='delete-button animate__animated animate__bounceIn' value='$warningId'></button>";
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(".view-button").click(function() {
            var id = $(this).val();
            $("#content-body").html('<embed id="pdf-view" src="../TCPDF-main/generated-warning/' + id + '.pdf" />')
            $('#popup-1').toggleClass('active');
        });

        $(".delete-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/warningDeleteForm.php",
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