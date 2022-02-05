<?php
include '../page/nav.php';
include_once '../view/profile.view.php';

$profileView = new ProfileView();
$result = $profileView->fetchUserDetails($_SESSION['type'], $_SESSION['id']);
if ($result) {
    foreach ($result as $row) {
        $name = $row['name'];
        $position = $row['position'];
        $email = $row['email'];
        $contact = $row['contact'];
    }
}
?>
<title>Profile</title>
<link rel="stylesheet" href="../css/profile.css">

<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn">&times;</div>
        <div id="cp-title">Change Password</div>
        <div id="pass-info">
            <div class="cp-label">Current password</div>
            <div class="cp-div"><input type="password" id="old-pass"></div>
            <div class="cp-label">New password</div>
            <div class="cp-div"><input type="password" id="new-pass"></div>
            <div class="cp-label">Confirm New Password</div>
            <div class="cp-div"><input type="password" id="confirm-pass"></div>
            <div><button id="pass-save">Update Password</button></div>
            <div id="pass-error"></div>
        </div>
    </div>
</div>

<div id="outer">
    <div id="profile-box">
        <div id="profile-margin">
            <div id="profile-pic-div">
                <?php
                $accountId = $_SESSION['id'];
                $profile_url = "../profile_pic/$accountId.jpg";
                if (file_exists($profile_url)) {
                    echo "<img src='$profile_url' alt='Profile Image' id='profile-pic'>";
                } else {
                    echo "<img src='../profile_pic/default.png' alt='Profile Image' id='profile-pic'>";
                }
                ?>
                <button id="change-pic"><i class="las la-edit" id="edit-icon"></i></button>
                <input id="file" type="file" name="name" accept="image/jpeg" style="display: none;" />
            </div>
            <div id="info">
                <div id="label-div">
                    <div class="label">Name</div>
                    <div class="label">Position</div>
                    <div class="label">Email</div>
                    <div class="label">Contact</div>
                    <div class="label">Username</div>
                    <div class="label">Password</div>
                </div>
                <div id="info-div">
                    <div class="input-div">
                        <input type="text" id="name" value="<?php echo $name ?>">
                    </div>

                    <div class="input-div">
                        <input type="text" id="position" value="<?php echo $position ?>">
                    </div>

                    <div class="input-div">
                        <input type="email" id="email" value="<?php echo $email ?>">
                    </div>

                    <div class="input-div">
                        <input type="text" id="contact" value="<?php echo $contact ?>">
                    </div>

                    <div class="input-div">
                        <input type="text" id="username" value="<?php echo $_SESSION['username'] ?>">
                    </div>

                    <div class="input-pass-div">
                        <button id="change-pass">Change Password</button>
                    </div>
                </div>
            </div>
            <div id="submit-div">
                <button id="submit">Save Changes</button>
            </div>
            <div id="error-div"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#change-pass').click(function() {
            $('#popup-1').toggleClass('active');
        });
        $('.close-btn').click(function() {
            $('#popup-1').toggleClass('active');
            $("#pass-error").html('');
        });

        $("#change-pic").hover(function() {
            $("#change-pic").css("opacity", "1");
        }, function() {
            $("#change-pic").css("opacity", "0");
        });

        $("#change-pic").click(function() {
            $('#file').trigger('click');
        });

        $("#file").change(function() {
            var fd = new FormData();
            var file = $('#file')[0].files[0];
            fd.append('file', file);
            fd.append('id', '<?php echo $_SESSION['id'] ?>');
            $.ajax({
                url: "../ajax/profilePicture.php",
                method: "POST",
                data: fd,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var timestamp = new Date().getTime();
                    profile_url = "<?php echo $profile_url ?>?t=" + timestamp;
                    console.log(profile_url);
                    $("#profile-pic").attr('src', profile_url);
                }
            });
        });

        $("#submit").click(function() {
            $("#error-div").html('');
            var name = $('#name').val();
            var position = $('#position').val();
            var email = $('#email').val();
            var contact = $('#contact').val();
            var username = $('#username').val();
            var error = 0;

            var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|0-9,.<>\/?]+/;
            var format2 = /[!@#$%^&*()_+\-=\[\]{};':"\\| ,.<>\/?]+/;
            var emailFormat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var phoneFormat = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

            if (!name) {
                $("<div id='error'>Please fill in 'Name' field</div>").hide().appendTo("#error-div").fadeIn(1000);
                error = 1;
            } else if (format1.test(name)) {
                $("<div id='error'>Specials characters/numbers aren't allowed for 'Name' field</div>").hide().appendTo("#error-div").fadeIn(1000);
                error = 1;
            }
            if (!email.match(emailFormat) && email) {
                $("<div id='error'>Enter a valid email</div>").hide().appendTo("#error-div").fadeIn(1000);
                error = 1;
            }
            if (!contact.match(phoneFormat) && contact) {
                $("<div id='error'>Enter a valid phone number</div>").hide().appendTo("#error-div").fadeIn(1000);
                error = 1;
            }
            if (!username) {
                $("<div id='error'>Please fill in 'Username' field</div>").hide().appendTo("#error-div").fadeIn(1000);
                error = 1;
            } else if (format2.test(username)) {
                $("<div id='error'>Specials characters aren't allowed for 'Userame' field</div>").hide().appendTo("#error-div").fadeIn(1000);
                error = 1;
            }

            if (!error) {
                $.ajax({
                    url: "../ajax/profileUpdate.php",
                    method: "POST",
                    data: {
                        id: <?php echo $_SESSION['id']; ?>,
                        type: "<?php echo $_SESSION['type']; ?>",
                        newName: name,
                        newPosition: position,
                        newEmail: email,
                        newContact: contact,
                        newUsername: username
                    },
                    success: function(data) {
                        $(data).hide().appendTo("#error-div").fadeIn(1000).delay(3000).fadeOut(1000);
                    }
                });
            }
        });

        $("#pass-save").click(function() {
            $("#pass-error").html('');
            var curr_pass = $("#old-pass").val();
            var new_pass = $("#new-pass").val();
            var confirm_pass = $("#confirm-pass").val();
            if (!(curr_pass && new_pass && confirm_pass)) {
                $("<div class='red'>Please fill in all the fields</div>").hide().appendTo("#pass-error").fadeIn(1000);
            } else {
                $.ajax({
                    url: "../ajax/profilePassword.php",
                    method: "POST",
                    data: {
                        id: <?php echo $_SESSION['id']; ?>,
                        oldPass: curr_pass,
                        newPass: new_pass,
                        confirmPass: confirm_pass
                    },
                    success: function(result) {
                        if (result == 'wrong') {
                            $("<div class='red'>Current password is incorrect</div>").hide().appendTo("#pass-error").fadeIn(1000);
                        } else if (result == 'short') {
                            $("<div class='red'>New password should be atleast 8 characters long</div>").hide().appendTo("#pass-error").fadeIn(1000);
                        } else if (result == 'match') {
                            $("<div class='red'>Confirm Password doesn't match New Password</div>").hide().appendTo("#pass-error").fadeIn(1000);
                        } else if (result == 'success') {
                            $('#popup-1').toggleClass('active');
                            $("<div id='success'>Password Successfully Updated</div>").hide().appendTo("#error-div").fadeIn(1000).delay(3000).fadeOut(1000);
                        }
                    }
                });
            }
        });
    });
</script>