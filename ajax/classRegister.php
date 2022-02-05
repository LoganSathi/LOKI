<?php
include_once '../view/class.view.php';
include_once '../controller/class.controller.php';
$classController = new ClassController();
$classView = new ClassView();

$form = $_POST['form'];
$class = $_POST['class'];
$teacher = $_POST['teacher'];

$classId = $classController->registerClass($form, $class, $teacher);
?>

<div class="container" id="table-area">
    <table class="display nowrap stripe" id="table">
        <thead>
            <tr>
                <th>Class Name</th>
                <th>Form</th>
                <th>Class Teacher</th>
                <th>Student Amount</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $result = $classView->fetchAllClass();
            if ($result) {
                foreach ($result as $row) {
                    $id = $row['id'];
                    echo "<tr class='table-row' id='$id-row'>";
                    echo "<td id='$id-name'>" . $row['name'] . "</td>";
                    echo "<td id='$id-form'>" . $row['form'] . "</td>";
                    echo "<td class='teacher-column' id='$id-teacher'>" . $row['teacherName'] . "</td>";
                    echo "<td id='$id-amount'>" . $row['student_amount'] . "</td>";
                    echo "<td id='lastRow'>";
                    echo "<button class='view-button' value='$id'></button>";
                    echo "<button class='edit-button' value='$id'></button>";
                    echo "<button class='delete-button' value='$id'></button>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(".view-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/classView.php",
                method: "POST",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $("#content-body").html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $(".edit-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/classEditForm.php",
                method: "POST",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $("#content-body").html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $(".delete-button").click(function() {
            var selectedId = $(this).val();

            $.ajax({
                url: "../ajax/classDeleteForm.php",
                method: "POST",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $("#content-body").html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $('#table').DataTable();
    });
</script>