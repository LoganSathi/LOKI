<?php
session_start();
include_once '../view/student.view.php';
$studentView = new StudentView();
$session_class = '';

if ((isset($_SESSION['class']))) {
    $session_class = $_SESSION['class'];
}

$id = $_POST['id'];
$result = $studentView->fetchDetails($id);
if ($result) {
    foreach ($result as $row) {
        $name = $row['name'];
        $dobFormat = $row['dob_format'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $parentId = $row['parentId'];
        $parent = $row['parent'];
        $relationship = $row['relationship'];
        $email = $row['email'];
        $contact = $row['contact'];
        $form = $row['form'];
        $className = $row['class'];
        $class = $row['classId'];
    }
}
?>

<div id="edit-div">
    <div class="edit-head-label">Class Details <span class="red">*</span><span id="edit-class-error" class="red"></span></div>
    <div id="edit-class-details">
        <div id="edit-form-div">
            <label class="edit-register-label">Form</label>
            <div class="select-div">
                <select id="edit-form">
                    <option value="" selected disabled hidden>Choose Form</option>
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
            <label class="edit-register-label">Class</label>
            <div class="select-div">
                <select id="edit-class" disabled>
                    <option value="" selected disabled hidden>Choose Class</option>
                </select>
            </div>
        </div>
    </div>
    <div class="edit-line"></div>
    <div class="edit-head-label">Student Details</div>
    <div id="edit-student-details">
        <div id="edit-student-upper-div">
            <div id="edit-student-name-div">
                <label class="edit-register-label">Student Name <span class="red">*</span></label>
                <span id="edit-name-error" class="red"></span>
                <div id="input-div"><input type="text" id="edit-student-name"></div>
            </div>
        </div>
        <div id="edit-student-lower-div">
            <div id="edit-gender-div">
                <label class="edit-register-label">Gender <span class="red">*</span></label>
                <span id="edit-gender-error" class="red"></span>
                <div class="select-div">
                    <select id="edit-gender">
                        <option value="" selected disabled hidden>Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div id="edit-dob-div">
                <label class="edit-register-label">Date of Birth <span class="red">*</span></label>
                <span id="edit-dob-error" class="red"></span>
                <div class="select-div"><input type="datetime-local" placeholder="Choose Date" id="edit-dob" style="display: block;"></div>
            </div>
        </div>
    </div>
    <div class="edit-line"></div>
    <div class="edit-head-label">Parent Details</div>
    <div id="edit-parent-details">
        <div id="edit-parent-upper-div">
            <div id="edit-parent-name-div">
                <label class="edit-register-label">Parent Name <span class="red">*</span></label>
                <span id="edit-parent-name-error" class="red"></span>
                <div id="input-div"><input type="text" id="edit-pname"></div>
            </div>
            <div id="edit-relationship-div">
                <label class="edit-register-label">Relationship <span class="red">*</span></label>
                <span id="edit-relationship-error" class="red"></span>
                <div class="select-div">
                    <select id="edit-relationship">
                        <option value="" selected disabled hidden>Choose relationship</option>
                        <option value="Mother">Mother</option>
                        <option value="Father">Father</option>
                        <option value="Guardian">Guardian</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="edit-parent-lower-div">
            <div id="edit-contact-div" onsubmit="process(event)">
                <label class="edit-register-label">Parent Contact <span class="red">*</span></label>
                <span id="edit-contact-error" class="red"></span>
                <div id="input-div"><input id="edit-phone" type="tel" name="phone" /></div>
            </div>
            <div id="edit-email-div">
                <label class="edit-register-label">Parent Email</label>
                <span id="edit-email-error" class="red"></span>
                <div id="input-div"><input type="email" id="edit-email"></div>
            </div>
        </div>
    </div>
    <button id="edit-submit">Save Changes</button>
    <div id="edit-success">Successfully Updated</div>
</div>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script>
    $(document).ready(function() {
        var id = '<?php echo $id; ?>';
        var dob = '<?php echo $dob; ?>';

        $.ajax({
            url: "../ajax/studentClassSearch.php",
            method: "POST",
            data: {
                form: '<?php echo $form; ?>',
                class: '<?php echo $class; ?>'
            },
            success: function(data) {
                $('#edit-class').html(data);
                var classSession = '<?php echo $session_class; ?>';
                if (classSession) {
                    $('#edit-class').attr('disabled', true);
                    $('#edit-form').attr('disabled', true);
                } else {
                    $('#edit-class').attr('disabled', false)
                }
            }
        });

        $("#edit-dob").flatpickr({
            dateFormat: "d M Y",
            defaultDate: "<?php echo $dobFormat; ?>",
            onChange: function(selectedDates, dateStr, instance) {
                dob = selectedDates[0].getFullYear() + "-" + (selectedDates[0].getMonth() + 1) + "-" + selectedDates[0].getDate();
            }
        });

        $('#edit-student-name').val('<?php echo $name; ?>');
        $('#edit-pname').val('<?php echo $parent; ?>');
        $('#edit-phone').val('<?php echo $contact; ?>');
        $('#edit-email').val('<?php echo $email; ?>');
        $('#edit-relationship').val('<?php echo $relationship; ?>');
        $('#edit-gender').val('<?php echo $gender; ?>');
        $('#edit-form').val('<?php echo $form; ?>');
        $('#edit-class').val('<?php echo $class; ?>');

        $("#edit-form").change(function() {
            var selected_form = $("#edit-form").val();
            $.ajax({
                url: "../ajax/studentClassSearch.php",
                method: "POST",
                data: {
                    form: selected_form
                },
                success: function(data) {
                    $('#edit-class').html(data);
                    $('#edit-class').attr('disabled', false)
                }
            });
        });

        /* function process(event) {
            event.preventDefault();

            const phoneNumber = phoneInput.getNumber();

            info.style.display = "";
            info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
        } */

        $("#edit-submit").click(function() {
            $("#edit-class-error").html('');
            $("#edit-name-error").html('');
            $("#edit-gender-error").html('');
            $("#edit-dob-error").html('');
            $("#edit-parent-name-error").html('');
            $("#edit-relationship-error").html('');
            $("#edit-contact-error").html('');
            $("#edit-email-error").html('');

            var name = $('#edit-student-name').val();
            var pname = $('#edit-pname').val();
            var pcontact = $('#edit-phone').val();
            var email = $('#edit-email').val();
            var relationship = $('#edit-relationship').val();
            var gender = $('#edit-gender').val();
            var selected_class = $('#edit-class').val();


            /* Error initialization */
            var error = 0;
            var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|0-9,.<>\/?]+/;
            var format2 = /[!@#$%^&*()_+\-=\[\]{};':"\\| ,.<>\/?]+/;
            var emailFormat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var phoneFormat = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;


            if (!selected_class) {
                error = 1;
                $("#edit-class-error").html('Choose a valid class');
            }

            if (!name) {
                error = 1;
                $("#edit-name-error").html('This field is required to be filled');
            } else if (format1.test(name)) {
                error = 'special';
                $("#edit-name-error").html('No special characters are allowed');
            }

            if (!gender) {
                error = 1;
                $("#edit-gender-error").html('This field is required to be filled');
            }

            if (!dob) {
                error = 1;
                $("#edit-dob-error").html('This field is required to be filled');
            }

            if (!pname) {
                error = 1;
                $("#edit-parent-name-error").html('This field is required to be filled');
            } else if (format1.test(pname)) {
                error = 1;
                $("#edit-parent-name-error").html('No special characters are allowed');
            }

            if (!relationship) {
                error = 1;
                $("#edit-relationship-error").html('This field is required to be filled');
            }

            if (!pcontact) {
                error = 1;
                $("#edit-contact-error").html('This field is required to be filled');
            } else if (!pcontact.match(phoneFormat) && pcontact) {
                error = 1;
                $("#edit-contact-error").html('Enter a valid phone number');
            }

            if (!email.match(emailFormat) && email) {
                error = 1;
                $("#edit-email-error").html('Enter a valid email');
            }

            if (!error) {
                $.ajax({
                    url: "../ajax/studentEdit.php",
                    method: "POST",
                    data: {
                        Id: id,
                        Name: name,
                        Gender: gender,
                        DOB: dob,
                        Relationship: relationship,
                        Pname: pname,
                        Pcontact: pcontact,
                        Email: email,
                        class: selected_class,
                    },
                    success: function(data) {
                        $("#" + id + "-name").html(name);
                        $("#" + id + "-class").html(data);
                        $("#" + id + "-parent").html(pname);
                        $("#" + id + "-email").html(email);
                        $('#edit-success').fadeIn(1000).delay(3000).fadeOut(1000);
                    }
                });
            }
        });
    });
</script>