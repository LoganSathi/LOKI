<?php
include 'nav.php';
include_once '../access/warning.access.php';
include_once '../view/warning.view.php';
$warningView = new WarningView();
?>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
<link rel="stylesheet" href="../css/table.css">
<link rel="stylesheet" href="../css/warning.css">

<title>Warning Letter Panel</title>

<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn">&times;</div>
        <div id="content-body">
            <!-- <embed id="pdf-view" src="../TCPDF-main/generated-warning/101.pdf" /> -->
        </div>
    </div>
</div>

<div class="outer">
    <div class="exception-box animate__animated animate__fadeInUp">
        <div id="wrapper-div">
            <div id="title">Warning Letter Exception</div>
            <div class="student-box animate__animated animate__fadeInLeft">
                <div id="student-box-upper">
                    <label for="name" id="name-label">Student Details <span class="red">*</span></label>
                    <span id="name-error" class="red"></span>
                </div>
                <div id="student-box-lower">
                    <div id="form-div">
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
                    <div id="class-div">
                        <select name="class" id="class" disabled>
                            <option value='' selected disable hidden>Choose Class</option>
                        </select>
                    </div>
                    <div id="student-div">
                        <select name="student" id="student" disabled>
                            <option value='' selected disable hidden>Choose Student</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="line"></div>
            <div id="exception-info-box" class="animate__animated animate__fadeInRight">
                <div id="exception-details-label">Exception Details</div>
                <div id="exception-info-box-upper">
                    <div class="date-box">
                        <label for="date-range" id="date-label">Date range <span class="red">*</span></label>
                        <span id="date-error" class="red"></span>
                        <div id="date-range-div"><input type="datetime-local" placeholder="Choose Dates" id="date-range" style="display: block;"></div>
                    </div>
                    <div class="file-box">
                        <label for="file" id="file-label">Supporting document</label>
                        <div id="file-div"><input type="file" id="file"></div>
                    </div>
                </div>
                <div id="exception-info-box-lower">
                    <div class="desc-box">
                        <label for="desc" id="desc-label">Description</label>
                        <div id="desc-div"><input type="text" id="desc"></div>
                    </div>
                </div>
            </div>
            <div class="submit-box">
                <button id="submit">Submit</button>
            </div>
            <div id="success">Successfully Submitted</div>
        </div>
    </div>
    <div id="tab-margin" class="animate__animated animate__flipInX">
        <button id="warning-tab">Warning Letters</button>
        <button id="exception-tab">Warning Exception</button>
    </div>
    <?php
    $result = $warningView->fetchList();
    ?>
    <div id="table-margin" class="animate__animated animate__fadeInUp">
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
    </div>
</div>

</body>

<script>
    $(document).ready(function() {
        $("#warning-tab").css('color', '#fff');
        $("#warning-tab").css('background', 'linear-gradient(180deg,rgba(137, 15, 102, 0.4) 0% ,rgba(5, 39, 160, 0.4) 100%)');
        $("#warning-tab").css('border', 'none');

        var student_id;
        var start_date;
        var end_date;
        var name_error;
        var date_error;
        $("#date-range").flatpickr({
            mode: 'range',
            minDate: 'today',
            dateFormat: "d M Y",
            altFormat: "DD-MM-YYYY",
            altFormat: true,
            onChange: function(selectedDates, dateStr, instance) {
                start_date = selectedDates[0].getFullYear() + "-" + (selectedDates[0].getMonth() + 1) + "-" + selectedDates[0].getDate();
                if (selectedDates[1]) {
                    end_date = selectedDates[1].getFullYear() + "-" + (selectedDates[1].getMonth() + 1) + "-" + selectedDates[1].getDate();
                }
            }
        });

        $("#form").change(function() {
            var selected_form = $("#form").val();
            $.get("../ajax/warningSearch.php", {
                form: selected_form
            }).done(function(data) {
                $("#class").html(data);
            });
            $("#student").html("<option value='' selected disable hidden>Choose Student</option>");
            $("#student").prop("disabled", "disabled");
            $("#class").prop("disabled", false);
        });

        $("#class").change(function() {
            var selected_class = $("#class").val();
            $("#student").prop('disabled', false);
            $.get("../ajax/warningSearch.php", {
                class: selected_class
            }).done(function(data) {
                $("#student").html(data);
            });
        });

        $("#submit").click(function() {
            var description = $("#desc").val();
            student_id = $("#student").val();
            if (student_id) {
                $("#name-error").html('');
                name_error = 0;
            } else {
                $("#name-error").html('Choose a valid student');
                name_error = 1;
            }

            if (!(start_date && end_date)) {
                $("#date-error").html('Choose a valid date range');
                date_error = 1;
            } else {
                $("#date-error").html('');
                date_error = 0;
            }

            if (!(name_error || date_error)) {
                var fd = new FormData();
                var file = $('#file')[0].files[0];
                fd.append('file', file);
                fd.append('id', student_id);
                fd.append('start', start_date);
                fd.append('end', end_date);
                fd.append('desc', description);
                $.ajax({
                    url: "../ajax/warningException.php",
                    method: "POST",
                    data: fd,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(result) {
                        $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
                        $("#form").val('');
                        $("#class").val('');
                        $("#student").val('');
                        $("#date-range").val('');
                        $("#desc").val('');
                        $("#file").val('');
                        $("#class").prop('disabled', true);
                        $("#student").prop('disabled', true);
                        $("#exception-table-margin").html(result);
                    }
                });
            }
        });

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

        $('.close-btn').click(function() {
            $('#popup-1').toggleClass('active');
        });

        $('#warning-tab').click(function() {
            $("#warning-tab").css('color', '#fff');
            $("#warning-tab").css('background', 'linear-gradient(180deg,rgba(137, 15, 102, 0.4) 0% ,rgba(5, 39, 160, 0.4) 100%)');
            $("#warning-tab").css('border', 'none');
            $("#exception-tab").css('color', 'rgba(5, 39, 160, 1)');
            $("#exception-tab").css('background', 'none');
            $("#exception-tab").css('border', '0.5vh solid #c498c2');
            $("#exception-tab").css('border-bottom', 'none');
            $.ajax({
                url: "../ajax/warningLetterTable.php",
                success: function(data) {
                    $('#table-margin').html(data);
                }
            });
        });

        $("#exception-tab").click(function() {
            $("#exception-tab").css('color', '#fff');
            $("#exception-tab").css('background', 'linear-gradient(180deg,rgba(137, 15, 102, 0.4) 0% ,rgba(5, 39, 160, 0.4) 100%)');
            $("#exception-tab").css('border', 'none');
            $("#warning-tab").css('color', 'rgba(5, 39, 160, 1)');
            $("#warning-tab").css('background', 'none');
            $("#warning-tab").css('border', '0.5vh solid #c498c2');
            $("#warning-tab").css('border-bottom', 'none');
            $.ajax({
                url: "../ajax/warningExceptionTable.php",
                success: function(data) {
                    $('#table-margin').html(data);
                }
            });
        });

        $('#table').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [
                [1, 'asc']
            ]
        });
    });
</script>

</html>