<?php
include_once '../view/class.view.php';
$classView = new ClassView();

$classId = $_POST['id'];
$result = $classView->fetchDetails($classId);
if ($result) {
    foreach ($result as $row) {
        $class = $row['name'];
        $form = $row['form'];
        $amount = $row['student_amount'];
        $teacher = $row['teacher'];
        $teacherId = $row['teacherId'];
    }
}
?>
<div id="edit-div">
    <div class="edit-head-label edit-class-label">Class Details</div>
    <div id="edit-upper-div">
        <div id="edit-form-div">
            <label class="edit-register-label">Form<span class="red">*</span></label>
            <span id="edit-form-error" class="red"></span>
            <div id="edit-select-div">
                <select id="edit-form">
                    <option value='' selected disable hidden>Choose Form</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                    <option value="Form 4">Form 4</option>
                    <option value="Form 5">Form 5</option>
                    <option value="Form 6">Form 6</option>
                </select>
            </div>
        </div>
        <div id="edit-class-div">
            <label class="edit-register-label">Class<span class="red">*</span></label>
            <span id="edit-class-error" class="red"></span>
            <div id="input-div"><input type="text" id="edit-class" placeholder="Format: 1 Name"></div>
        </div>
    </div>
    <div id="edit-line"></div>
    <div class="edit-head-label edit-teacher-label">Teacher Details</div>
    <div id="edit-lower-div">
        <div id="edit-teacher-div">
            <label class="edit-register-label">Class Teacher<span class="red">*</span></label>
            <span id="edit-teacher-error" class="red"></span>
            <div id="edit-select-div">
                <select id="edit-teacher">
                    <option selected disabled hidden>Assign Class Teacher</option>
                    <?php
                    if ($teacherId) {
                        echo "<option value='$teacherId' selected>$teacher</option>";
                    }
                    $result = $classView->fetchTeacherList();
                    if ($result) {
                        foreach ($result as $row) {
                            $id = $row['id'];
                            $name = $row['name'];
                            echo "<option value='$id'>$name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div id="edit-button-div">
        <button id="edit-submit">Save Changes</button>
    </div>
    <div id="edit-success">Successfully Registered</div>
</div>

<script>
    $(document).ready(function() {
        var classId = '<?php echo $classId; ?>';
        var selected_form = '<?php echo $form; ?>';
        var selected_class = '<?php echo $class; ?>';
        $("#edit-form").val(selected_form);
        $("#edit-class").val(selected_class);

        $('#edit-submit').click(function() {
            $("#edit-form-error").html('');
            $("#edit-class-error").html('');
            $("#edit-teacher-error").html('');

            selected_form = $('#edit-form').val();
            selected_class = $('#edit-class').val();
            var class_teacher = $('#edit-teacher').val();
            var error = 0;
            var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

            if (!selected_form) {
                error = 1;
                $("#edit-form-error").html('This field is required to be filled');
            }

            if (!selected_class) {
                error = 1;
                $("#edit-class-error").html('This field is required to be filled');
            } else if (format1.test(selected_class)) {
                error = 1;
                $("#edit-class-error").html('No special characters are allowed');
            }

            if (!class_teacher) {
                error = 1;
                $("#edit-teacher-error").html('No special characters are allowed');
            }

            if (!error) {
                $.ajax({
                    url: "../ajax/classEdit.php",
                    method: "POST",
                    data: {
                        form: selected_form,
                        class: selected_class,
                        teacher: class_teacher,
                        id: classId
                    },
                    success: function(data) {
                        $("#" + classId + "-name").html(selected_class);
                        $("#" + classId + "-form").html(selected_form);
                        $("#" + classId + "-teacher").html(data);
                        $("#edit-form-error").html('');
                        $("#edit-class-error").html('');
                        $("#edit-teacher-error").html('');
                        $('#edit-success').fadeIn(1000).delay(3000).fadeOut(1000);
                        $.ajax({
                            url: "../ajax/classTeacherUpdate.php",
                            success: function(update) {
                                $("#teacher").html(update);
                            }
                        });
                    }
                });
            }
        });
    });
</script>