<?php
include_once '../controller/class.controller.php';
include_once '../view/class.view.php';
$classView = new ClassView();
$classController = new ClassController();

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
                $form = $csv[$i][0];
                $class = $csv[$i][1];
                $teacher_name = $csv[$i][2];
                $teacher_name = preg_replace("/\r|\n/", "", $teacher_name);
                if ($teacher_name == null || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $teacher_name)) {
                    $error = true;
                } elseif ($class == null || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $class)) {
                    $error = true;
                } /* elseif (strcmp($form, "Form 1") && strcmp($form, "Form 2") && strcmp($form, "Form 3") && strcmp($form, "Form 4") && strcmp($form, "Form 5") && strcmp($form, "Form 5")) {
                    $error = true;
                } */
                if (!$error) {
                    $teacherID = $classView->fetchTeacherBulkId($teacher_name);
                    $classController->registerClass($form, $class, $teacherID);
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
                    echo "<tr class='table-row animate__animated animate__fadeInUp' id='$id-row'>";
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