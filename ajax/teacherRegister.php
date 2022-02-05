<?php
include_once '../view/teacher.view.php';
include_once '../controller/teacher.controller.php';
$teacherController = new TeacherController();
$teacherView = new TeacherView();

$name = $_POST['Name'];
$username = $_POST['Username'];
$pass = password_hash($_POST['Pass'], PASSWORD_DEFAULT);

$accId = $teacherController->registerTeacher($username, $pass, $name);
$id = $teacherView->fetchId($accId);
?>

<div class="container" id="table-area">
    <table class="display nowrap stripe" id="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $result = $teacherView->fetchAllAccounts();
            $teachid_arr = array();
            $accountid_arr = array();
            if ($result) {
                foreach ($result as $row) {
                    $accId = $row['account_id'];
                    array_push($teachid_arr, $row['id']);
                    array_push($accountid_arr, $accId);
                    $id = $row['id'];
                    echo "<tr class='table-row' id='$id-row'>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td id='$accId-username'>" . $row['username'] . "</td>";
                    echo "<td id='lastRow'>";
                    echo "<button class='view-button' value='$id'></button>";
                    echo "<button class='edit-button' value='$accId'></button>";
                    echo "<button class='delete-button' value='$id-$accId'></button>";
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
                url: "../ajax/teacherView.php",
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
                url: "../ajax/teacherEditForm.php",
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
            var idArr = $(this).val().split("-");
            var teacherId = idArr[0];
            var accountId = idArr[1];

            $.ajax({
                url: "../ajax/teacherDeleteForm.php",
                method: "POST",
                data: {
                    id: teacherId,
                    accId: accountId
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