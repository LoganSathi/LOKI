<?php
include_once '../view/coordinator.view.php';
$coordinatorView = new CoordinatorView();

$id = $_POST['id'];
$result = $coordinatorView->fetchUsername($id);
if ($result) {
    foreach ($result as $row) {
        $username = $row['username'];
        $coorId = $row['id'];
    }
}
?>
<div id="edit-div">
    <div id="edit-username-div">
        <div id="edit-label">Username<span class="red">*</span></div>
        <span id="edit-username-error" class="red"></span>
        <div id="input-div"><input type="text" id="edit-username" value="<?php echo $username; ?>"></div>
    </div>
    <div id="edit-pass-div">
        <div id="edit-label">New Password<span class="red">*</span></div>
        <span id="edit-pass-error" class="red"></span>
        <div id="input-div"><input type="password" id="edit-pass"></div>
    </div>
    <div id="edit-confirm-pass-div">
        <div id="edit-label">Confirm New Password<span class="red">*</span></div>
        <span id="edit-confirm-error" class="red"></span>
        <div id="input-div"><input type="password" id="edit-confirm-pass"></div>
    </div>
    <button id="edit-submit">Save Changes</button>
    <div id="edit-success">Successfully Updated</div>
</div>

<script>
    $(document).ready(function() {
        var currentUsername = "<?php echo $username; ?>";
        var accountId = "<?php echo $id; ?>";
        $("#edit-submit").click(function() {
            $("#edit-username-error").html('');
            $("#edit-pass-error").html('');
            $("#edit-confirm-error").html('');
            var username = $('#edit-username').val();
            var pass = $('#edit-pass').val();
            var confirm = $("#edit-confirm-pass").val();

            var username_error = null;
            var pass_error = null;
            var confirm_error = null;

            var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|0-9,.<>\/?]+/;
            var format2 = /[!@#$%^&*()_+\-=\[\]{};':"\\| ,.<>\/?]+/;

            if (!username) {
                $("#edit-username-error").html('This field is required to be filled');
                username_error = 'empty';
            } else if (format2.test(username)) {
                $("#edit-username-error").html('No special characters are allowed');
                username_error = 'special';
            }

            if (!pass) {
                $("#edit-pass-error").html('This field is required to be filled');
                pass_error = 'empty';
            } else if (pass.length < 8) {
                $("#edit-pass-error").html('This field should be at least 8 characters long');
                pass_error = 'length';
            }

            if (!confirm) {
                $("#edit-confirm-error").html('This field is required to be filled');
                confirm_error = 'empty';
            } else if (pass != confirm) {
                $("#edit-confirm-error").html("Confirm Password doesn't match New Password");
                confirm_error = 'no match';
            }

            if (!(username_error || pass_error || confirm_error)) {
                if (currentUsername != username) {
                    $.ajax({
                        url: "../ajax/usernameCheck.php",
                        method: "POST",
                        data: {
                            Username: username
                        },
                        success: function(result) {
                            if (result.includes('okay')) {
                                $.ajax({
                                    url: "../ajax/coordinatorEdit.php",
                                    method: "POST",
                                    data: {
                                        Username: username,
                                        Pass: pass,
                                        accId: accountId
                                    },
                                    success: function(data) {
                                        $("#" + accountId + "-username").html(username);
                                        $("#edit-pass").val('');
                                        $("#edit-confirm-pass").val('');
                                        $("#edit-username-error").html('');
                                        $("#edit-pass-error").html('');
                                        $("#edit-confirm-error").html('');
                                        $('#edit-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    }
                                });
                            } else {
                                $("#edit-username-error").html('Username already exist');
                            }
                        }
                    });
                } else {
                    $.ajax({
                        url: "../ajax/coordinatorEdit.php",
                        method: "POST",
                        data: {
                            Username: username,
                            Pass: pass,
                            accId: accountId
                        },
                        success: function(data) {
                            $("#" + accountId + "-username").html(username);
                            $("#edit-pass").val('');
                            $("#edit-confirm-pass").val('');
                            $("#edit-username-error").html('');
                            $("#edit-pass-error").html('');
                            $("#edit-confirm-error").html('');
                            $('#edit-success').fadeIn(1000).delay(3000).fadeOut(1000);
                        }
                    });
                }
            } else {
                $('#edit-confirm-pass').val('');
            }
        });
    });
</script>