<?php
session_start();
include_once '../controller/student.controller.php';
$studentController = new StudentController();
include_once '../view/student.view.php';
$studentView = new StudentView();

$name = $_POST['Name'];
$gender = $_POST['Gender'];
$dob = $_POST['DOB'];
$relationship = $_POST['Relationship'];
$pname = $_POST['Pname'];
$pcontact = $_POST['Pcontact'];
$email = $_POST['Email'];
$class = $_POST['class'];

$parentId = $studentController->registerStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $email, $class);
$id = $studentView->fetchId($parentId);
$studentController->addAmount($class);
?>

<div class="container" id="table-area">
    <table class="display nowrap stripe" id="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Parent Name</th>
                <th>Parent Email</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            if (isset($_SESSION['class'])) {
                $result = $studentView->fetchClassStudents($_SESSION['class']);
            } else {
                $result = $studentView->fetchAllStudents();
            }
            if ($result) {
                foreach ($result as $row) {
                    $id = $row['id'];
                    echo "<tr class='table-row' id='$id-row'>";
                    echo "<td id='$id-name'>" . $row['name'] . "</td>";
                    echo "<td id='$id-class'>" . $row['class'] . "</td>";
                    echo "<td id='$id-parent'>" . $row['parent'] . "</td>";
                    echo "<td id='$id-email'>" . $row['email'] . "</td>";
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

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(".view-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/studentView.php",
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
                url: "../ajax/studentEditForm.php",
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
                url: "../ajax/studentDeleteForm.php",
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