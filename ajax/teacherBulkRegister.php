<?php
include_once '../controller/teacher.controller.php';
include_once '../view/teacher.view.php';
$teacherView = new TeacherView();
$teacherController = new TeacherController();

if ($_FILES['file']['name'] != '') {
    foreach ($_FILES['file']['name'] as $keys => $values) {
        $allowed_extension = array('csv');
        $file_array = explode(".", $_FILES["file"]["name"][$keys]);
        $extension = end($file_array);
        $extension_error = false;
        if (in_array($extension, $allowed_extension)) {
            $path = $_FILES['file']['tmp_name'][$keys];
            $file = file($path);
            foreach ($file as $k) {
                $csv[] = explode(',', $k);
            }
            $error = false;
            for ($i = 0; $i < count($csv); $i++) {
                $name = $csv[$i][0];
                $username = $csv[$i][1];
                $password = $csv[$i][2];

                if ($name == null || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)) {
                    $error = true;
                } elseif ($username == null || preg_match('/[\'^£$%&*()}{@#~?><>, |=_+¬-]/', $username)) {
                    $error = true;
                } elseif ($password == null || strlen($password < 8)) {
                    $error = true;
                }
                if (!$error) {
                    $password = preg_replace("/\r|\n/", "", $password);
                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    $teacherController->registerTeacher($username, $pass, $name);
                }
            }
        } else {
            $extension_error = true;
        }
    }
}
?>

<div class="container" id="table-area">
    <table class="display nowrap stripe" id="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $result = $teacherView->fetchAllAccounts();
            $coorid_arr = array();
            $accountid_arr = array();
            if ($result) {
                foreach ($result as $row) {
                    $accId = $row['account_id'];
                    array_push($coorid_arr, $row['id']);
                    array_push($accountid_arr, $accId);
                    $id = $row['id'];
                    echo "<tr class='table-row' id='$id-row'>";
                    echo "<td>" . $row['name'] . "</td>";
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
        console.log('Hello');
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

        //Message Display
        <?php
        if ($extension_error) {
            echo "$('#csv-error').fadeIn(1000).delay(3000).fadeOut(1000);";
        } elseif (!$error) {
            echo "$('#bulk-register-success').fadeIn(1000).delay(3000).fadeOut(1000);";
        }
        ?>

        $('#table').DataTable();
    });
</script>