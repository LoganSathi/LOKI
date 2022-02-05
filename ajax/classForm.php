<?php
include_once '../view/class.view.php';
$classView = new ClassView();
?>

<div class="head-label class-label">Class Details</div>
<div id="upper-div">
    <div id="form-div">
        <label class="register-label">Form<span class="red">*</span></label>
        <span id="form-error" class="red"></span>
        <div id="select-div">
            <select name="form" id="form">
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
    <div id="class-div">
        <label class="register-label">Class<span class="red">*</span></label>
        <span id="class-error" class="red"></span>
        <div id="input-div"><input type="text" id="class" placeholder="Format: 1 Name"></div>
    </div>
</div>
<div id="line"></div>
<div class="head-label teacher-label">Teacher Details</div>
<div id="lower-div">
    <div id="teacher-div">
        <label class="register-label">Class Teacher<span class="red">*</span></label>
        <span id="teacher-error" class="red"></span>
        <div id="select-div">
            <select id="teacher">
                <option selected disabled hidden>Assign Class Teacher</option>
                <?php
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
<div id="register-button-div">
    <button id="register">Register</button>
</div>
<div id="success">Successfully Registered</div>

<script>
    $('#register').click(function() {
        $("#form-error").html('');
        $("#class-error").html('');
        $("#teacher-error").html('');

        var selected_form = $('#form').val();
        var selected_class = $('#class').val();
        var class_teacher = $('#teacher').val();
        var error = 0;
        var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

        if (!selected_form) {
            error = 1;
            $("#form-error").html('This field is required to be filled');
        }

        if (!selected_class) {
            error = 1;
            $("#class-error").html('This field is required to be filled');
        } else if (format1.test(selected_class)) {
            error = 1;
            $("#class-error").html('No special characters are allowed');
        }

        if (!class_teacher) {
            error = 1;
            $("#teacher-error").html('No special characters are allowed');
        }

        if (!error) {
            $.ajax({
                url: "../ajax/classRegister.php",
                method: "POST",
                data: {
                    form: selected_form,
                    class: selected_class,
                    teacher: class_teacher
                },
                success: function(data) {
                    $(".table-margin").html(data);
                    $("#form").val('');
                    $("#class").val('');
                    $("#teacher").val('');
                    $("#form-error").html('');
                    $("#class-error").html('');
                    $("#teacher-error").html('');
                    $.ajax({
                        url: "../ajax/classTeacherUpdate.php",
                        success: function(update) {
                            $("#teacher").html(update);
                        }
                    });
                    $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
                }
            });
        }
    });
</script>