<?php
include_once '../view/warning.view.php';
$warningView = new WarningView();

$id = $_GET['id'];

$result = $warningView->fetchException($id);
if ($result) {
    foreach ($result as $row) {
        $className = $row['class'];
        $form = $row['form'];
        $studentName = $row['name'];
        $desc = $row['description'];
        $from = $row['start_date'];
        $until = $row['end_date'];
    }
}
?>

<div class="edit-box">
    <div id="edit-wrapper">
        <div class="edit-student-box">
            <div id="edit-student-box-upper">
                <label for="name" id="edit-name-label">Student Details</label>
            </div>
            <div id="edit-student-box-lower">
                <div id="edit-form-div">
                    <select name="form" id="form-edit" disabled>
                        <option value='' selected disable hidden><?php echo $form ?></option>
                    </select>
                </div>
                <div id="edit-class-div">
                    <select name="class" id="class-edit" disabled>
                        <option value='' selected disable hidden><?php echo $className ?></option>
                    </select>
                </div>
                <div id="edit-student-div">
                    <select name="student" id="student-edit" disabled>
                        <option value='' selected disable hidden><?php echo $studentName ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div id="edit-line"></div>
        <div id="edit-exception-info-box">
            <div id="edit-exception-details-label">Exception Details</div>
            <div id="edit-exception-info-box-upper">
                <div class="edit-date-box">
                    <label for="date-range" id="edit-date-label">Date range <span class="red">*</span></label>
                    <span id="date-error-edit" class="red"></span>
                    <div id="edit-date-range-div"><input type="datetime-local" id="date-range-edit" style="display: block;cursor: auto;" disabled></div>
                </div>
                <div class="edit-file-box">
                    <label for="file" id="edit-file-label">Supporting document</label>
                    <div id="edit-file-div"><input type="file" id="file-edit"></div>
                </div>
            </div>
            <div id="edit-exception-info-box-lower">
                <div class="edit-desc-box">
                    <label for="desc" id="edit-desc-label">Description</label>
                    <div id="edit-desc-div"><input type="text" id="desc-edit" <?php echo "value='$desc'"; ?>></div>
                </div>
            </div>
        </div>
        <div class="edit-submit-box">
            <button id="edit-submit">Save Changes</button>
        </div>
        <div id="edit-success">Successfully Updated</div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function() {
        var selectedId = '<?php echo $id; ?>';
        var from = '<?php echo $from; ?>';
        var until = '<?php echo $until; ?>';

        $("#date-range-edit").flatpickr({
            mode: 'range',
            dateFormat: "d M Y",
            defaultDate: [from, until]
        });

        $("#edit-submit").click(function() {
            var description = $("#desc-edit").val();
            var fd = new FormData();
            var file = $('#file-edit')[0].files[0];
            fd.append('file', file);
            fd.append('id', selectedId);
            fd.append('desc', description);
            $.ajax({
                url: "../ajax/warningExceptionEdit.php",
                method: "POST",
                data: fd,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    $('#edit-success').fadeIn(1000).delay(3000).fadeOut(1000);
                    $("#" + selectedId + "-desc").html(description);
                }
            });
        });
    });
</script>