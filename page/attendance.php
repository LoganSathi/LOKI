<?php
include_once 'nav.php';
include_once '../access/attendance.access.php';
include_once '../view/attendance.view.php';
include_once '../controller/attendance.controller.php';
$attendanceView = new AttendanceView();
$attendanceController = new AttendanceController();
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="../css/font-awesome.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
<link rel="stylesheet" href="../css/attendance.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../config/lottie.js"></script>

<title>Attendance</title>

<div class="box-margin">
    <div id="attendance-box">
        <div id="input-row">
            <div id="form-div" class="animate__animated animate__fadeInUp">
                <select name="form" id="form">
                    <option value="" selected disabled hidden>Choose Form</option>
                    <option value="Form 1">Form 1</option>
                    <option value="Form 2">Form 2</option>
                    <option value="Form 3">Form 3</option>
                    <option value="Form 4">Form 4</option>
                    <option value="Form 5">Form 5</option>
                    <option value="Form 6">Form 6</option>
                </select>
            </div>
            <div id="class-div" class="animate__animated animate__fadeInUp">
                <select name="class" id="class" disabled>
                    <option value='' selected disable hidden>Choose Class</option>
                </select>
            </div>
            <div id="date-div" class="animate__animated animate__fadeInUp">
                <input type="datetime-local" placeholder="Choose Date" id="date" disabled>
            </div>
        </div>
        <div id="selected-div">
            <div id='class-teacher-div' class="animate__animated animate__fadeInUp"></div>
            <div id="student-box">
                <div id='empty'>Choose a class and date</div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var selected_date;
        $("#date").flatpickr({
            maxDate: 'today',
            dateFormat: "d M Y",
            onChange: function(selectedDates, dateStr, instance) {
                selected_date = selectedDates[0].getFullYear() + "-" + (selectedDates[0].getMonth() + 1) + "-" + selectedDates[0].getDate();
            }
        });

        var box = "<div id='empty'>Choose a class and date</div>";

        $("#form").change(function() {
            var selected_form = $("#form").val();
            $.get("../ajax/attendanceSearch.php", {
                form: selected_form
            }).done(function(data) {
                $("#class").html(data);
            });
            $("#date").val('');
            $("#date").prop("disabled", "disabled");
            $("#class").prop("disabled", false);
            $("#student-box").html(box);
            $("#class-teacher-div").html('');
        });

        $("#class").change(function() {
            var selected_class = $("#class").val();
            $.get("../ajax/attendanceSearch.php", {
                class: selected_class
            }).done(function(data) {
                $("#class-teacher-div").html(data);
            });
            $("#date").val('');
            $("#date").prop("disabled", false);
            $("#student-box").html(box);
        });

        $("#date").change(function() {
            var selected_class = $("#class").val();
            $("#student-box").load('../ajax/attendanceStudents.php', {
                date: selected_date,
                class: selected_class
            });
        });
    });
</script>

</html>