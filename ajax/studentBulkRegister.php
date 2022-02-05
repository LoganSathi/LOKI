<?php
include_once '../controller/student.controller.php';
include_once '../view/student.view.php';
$studentView = new StudentView();
$studentController = new StudentController();

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
                $dob = $csv[$i][1];
                $gender = $csv[$i][2];
                $class = $csv[$i][3];
                $pname = $csv[$i][4];
                $relationship = $csv[$i][5];
                $pcontact = $csv[$i][6];
                $pemail = $csv[$i][7];

                /* 
                if ($name == null || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)) {
                    $error = true;
                } elseif ($dob == null) {
                    $error = true;
                } elseif ($gender != "Male" && $gender != "Female") {
                    $error = true;
                } elseif ($pname == null || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pname)) {
                    $error = true;
                } elseif ($relationship != "Father" && $relationship != "Mother" && $relationship != "Guardian") {
                    $error = true;
                } elseif ($pemail == null || filter_var($pemail, FILTER_VALIDATE_EMAIL)) {
                    $error = true;
                } elseif ($pcontact == null || preg_match('/\+[0-9]{2}+[0-9]{10}/s', $pcontact)) {
                    $error = true;
                } elseif ($class == null) {
                    $error = true;
                }*/

                if (!$error) {
                    $pemail = preg_replace("/\r|\n/", "", $pemail);
                    $classID = $studentView->fetchClassId($class);
                    $studentController->registerStudent($name, $gender, $dob, $relationship, $pname, $pcontact, $pemail, $classID);
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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