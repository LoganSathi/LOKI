<div class="head-label user-label">Coordinator Details</div>
<div id="upper-div">
    <div id="name-div">
        <label for="name" class="register-label">Name<span class="red">*</span></label>
        <span id="name-error" class="red"></span>
        <div id="input-name-div"><input type="text" id="name"></div>
    </div>
    <div id="position-div">
        <label for="position" class="register-label">Position</label>
        <div id="input-div"><input type="text" id="position"></div>
    </div>
</div>
<div id="line"></div>
<div class="head-label acc-label">Account Details</div>
<div id="lower-div">
    <div id="username-div">
        <label for="username" class="register-label">Username<span class="red">*</span></label>
        <span id="username-error" class="red"></span>
        <div id="input-username-div"><input type="text" id="username"></div>
    </div>
    <div id="pass-div">
        <label for="pass" class="register-label">Password<span class="red">*</span></label>
        <span id="pass-error" class="red"></span>
        <div id="input-div"><input type="password" id="pass"></div>
    </div>
</div>
<div id="register-button-div">
    <button id="register">Register</button>
</div>
<div id="success">Successfully Registered</div>

<script>
    $(document).ready(function() {
        $('#register-type').change(function() {
            var reg_type = $('#register-type').val();
            if (reg_type == 'bulk') {
                $('.register-box').load('../ajax/coordinatorBulkForm.php');
            } else {
                $('.register-box').load('../ajax/coordinatorForm.php');
            }
        });

        $('#register').click(function() {
            var name = $('#name').val();
            var position = $('#position').val();
            var username = $('#username').val();
            var pass = $('#pass').val();
            var name_error = null;
            var username_error = null;
            var pass_error = null;
            var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|0-9,.<>\/?]+/;
            var format2 = /[!@#$%^&*()_+\-=\[\]{};':"\\| ,.<>\/?]+/;
            if (!name) {
                name_error = 'empty';
            } else if (format1.test(name)) {
                name_error = 'special';
            }

            if (!username) {
                username_error = 'empty';
            } else if (format2.test(username)) {
                username_error = 'special';
            }

            if (!pass) {
                pass_error = 'empty';
            } else if (pass.length < 8) {
                pass_error = 'length';
            }

            $('#name-error').load('../ajax/coordinatorError.php', {
                Err: name_error
            });
            $('#username-error').load('../ajax/coordinatorError.php', {
                Err: username_error
            });
            $('#pass-error').load('../ajax/coordinatorError.php', {
                Err: pass_error
            });

            if (!(name_error || username_error || pass_error)) {
                $.ajax({
                    url: "../ajax/usernameCheck.php",
                    method: "POST",
                    data: {
                        Username: username
                    },
                    success: function(result) {
                        if (result.includes('okay')) {
                            $.ajax({
                                url: "../ajax/coordinatorRegister.php",
                                method: "POST",
                                data: {
                                    Name: name,
                                    Position: position,
                                    Username: username,
                                    Pass: pass
                                },
                                success: function(data) {
                                    $("#table-body").prepend(data);
                                    $("#name").val('');
                                    $("#position").val('');
                                    $("#username").val('');
                                    $("#pass").val('');
                                    $("#name-error").html('');
                                    $("#username-error").html('');
                                    $("#pass-error").html('');
                                    $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
                                }
                            });
                        } else {
                            $("#username-error").html('Username already exist');
                        }
                    }
                });
            }
        });
    });
</script>