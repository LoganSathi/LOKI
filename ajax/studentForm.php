<?php

$form = $_POST['form'];
$class = $_POST['class'];
$className = $_POST['className'];
?>


<div class="head-label">Class Details <span class="red">*</span><span id="class-error" class="red"></span></div>
<div id="class-details">
    <div id="form-div">
        <label class="register-label">Form</label>
        <div class="select-div">
            <select id="form">
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
    <div id="class-div">
        <label class="register-label">Class</label>
        <div class="select-div">
            <select id="class" disabled>
                <option value="" selected disabled hidden>Choose Class</option>
            </select>
        </div>
    </div>
</div>
<div class="line"></div>
<div class="head-label">Student Details</div>
<div id="student-details">
    <div id="student-upper-div">
        <div id="student-name-div">
            <label class="register-label">Student Name <span class="red">*</span></label>
            <span id="name-error" class="red"></span>
            <div id="input-div"><input type="text" id="student-name"></div>
        </div>
    </div>
    <div id="student-lower-div">
        <div id="gender-div">
            <label class="register-label">Gender <span class="red">*</span></label>
            <span id="gender-error" class="red"></span>
            <div class="select-div">
                <select id="gender">
                    <option value="" selected disabled hidden>Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <div id="dob-div">
            <label class="register-label">Date of Birth <span class="red">*</span></label>
            <span id="dob-error" class="red"></span>
            <div class="select-div"><input type="datetime-local" placeholder="Choose Date" id="dob" style="display: block;"></div>
        </div>
    </div>
</div>
<div class="line"></div>
<div class="head-label">Parent Details</div>
<div id="parent-details">
    <div id="parent-upper-div">
        <div id="parent-name-div">
            <label class="register-label">Parent Name <span class="red">*</span></label>
            <span id="parent-name-error" class="red"></span>
            <div id="input-div"><input type="text" id="pname"></div>
        </div>
        <div id="relationship-div">
            <label class="register-label">Relationship <span class="red">*</span></label>
            <span id="relationship-error" class="red"></span>
            <div class="select-div">
                <select id="relationship">
                    <option value="" selected disabled hidden>Choose relationship</option>
                    <option value="Mother">Mother</option>
                    <option value="Father">Father</option>
                    <option value="Guardian">Guardian</option>
                </select>
            </div>
        </div>
    </div>
    <div id="parent-lower-div">
        <div id="contact-div" onsubmit="process(event)">
            <label class="register-label">Parent Contact <span class="red">*</span></label>
            <span id="contact-error" class="red"></span>
            <div id="input-div"><input id="phone" type="tel" name="phone" /></div>
        </div>
        <div id="email-div">
            <label class="register-label">Parent Email</label>
            <span id="email-error" class="red"></span>
            <div id="input-div"><input type="email" id="email"></div>
        </div>
    </div>
</div>
<div id="register-button-div">
    <button id="register">Register</button>
</div>
<div id="success">Successfully Registered</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<link rel="stylesheet" type="text/css" href="../css/datepicker.css">

<script>
    $(document).ready(function() {
        var selected_form = '<?php echo $form; ?>';
        var selected_class = '<?php echo $class; ?>';
        var class_name = '<?php echo $className; ?>';
        var dob;

        if (selected_form && selected_class) {
            $("#form").val(selected_form);
            $("#class").append('<option value="' + selected_class + '">' + class_name + '</option>');
            $("#class").val(selected_class);
            $("#form").attr('disabled', true)
        }

        $("#form").change(function() {
            var selected_form = $("#form").val();
            $.ajax({
                url: "../ajax/studentClassSearch.php",
                method: "POST",
                data: {
                    form: selected_form
                },
                success: function(data) {
                    $('#class').html(data);
                    $('#class').attr('disabled', false)
                }
            });
        });

        $("#dob").flatpickr({
            dateFormat: "d M Y",
            onChange: function(selectedDates, dateStr, instance) {
                dob = selectedDates[0].getFullYear() + "-" + (selectedDates[0].getMonth() + 1) + "-" + selectedDates[0].getDate();
            }
        });

        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["my"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        function process(event) {
            event.preventDefault();

            const phoneNumber = phoneInput.getNumber();

            info.style.display = "";
            info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
        }

        $("#register").click(function() {
            $("#class-error").html('');
            $("#name-error").html('');
            $("#gender-error").html('');
            $("#dob-error").html('');
            $("#parent-name-error").html('');
            $("#relationship-error").html('');
            $("#contact-error").html('');
            $("#email-error").html('');

            var name = $('#student-name').val();
            var pname = $('#pname').val();
            var pcontact = phoneInput.getNumber();
            var email = $('#email').val();
            var relationship = $('#relationship').val();
            var gender = $('#gender').val();
            var selected_class = $('#class').val();

            /* Error initialization */
            var error = 0;
            var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|0-9,.<>\/?]+/;
            var format2 = /[!@#$%^&*()_+\-=\[\]{};':"\\| ,.<>\/?]+/;
            var emailFormat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var phoneFormat = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;


            if (!selected_class) {
                error = 1;
                $("#class-error").html('Choose a valid class');
            }

            if (!name) {
                error = 1;
                $("#name-error").html('This field is required to be filled');
            } else if (format1.test(name)) {
                error = 1;
                $("#name-error").html('No special characters are allowed');
            }

            if (!gender) {
                error = 1;
                $("#gender-error").html('This field is required to be filled');
            }

            if (!dob) {
                error = 1;
                $("#dob-error").html('This field is required to be filled');
            }

            if (!pname) {
                error = 1;
                $("#parent-name-error").html('This field is required to be filled');
            } else if (format1.test(pname)) {
                error = 1;
                $("#parent-name-error").html('No special characters are allowed');
            }

            if (!relationship) {
                error = 1;
                $("#relationship-error").html('This field is required to be filled');
            }

            if (!pcontact) {
                error = 1;
                $("#contact-error").html('This field is required to be filled');
            } else if (!pcontact.match(phoneFormat) && pcontact) {
                error = 1;
                $("#contact-error").html('Enter a valid phone number');
            }

            if (!email.match(emailFormat) && email) {
                error = 1;
                $("#email-error").html('Enter a valid email');
            }

            if (!error) {
                $.ajax({
                    url: "../ajax/studentRegister.php",
                    method: "POST",
                    data: {
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
                        $("#table-margin").html(data);
                        $('#student-name').val('');
                        $('#gender').val('');
                        $('#dob').val('');
                        $('#relationship').val('');
                        $('#pname').val('');
                        $('#phone').val('');
                        $('#email').val('');
                        $('#class').val('');
                        $('#form').val('');
                        $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
                    }
                });
            }
        });
    });
</script>