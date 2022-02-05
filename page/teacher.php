<?php
include_once 'nav.php';
include_once '../access/teacher.access.php';
include_once '../view/teacher.view.php';
$teacherView = new TeacherView();
?>

<link rel="stylesheet" href="../css/table.css">
<link rel="stylesheet" href="../css/teacher.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<title>Teacher Accounts</title>

<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn">&times;</div>
        <div id="content-body">
        </div>
    </div>
</div>

<div id="outer">
    <div class='register-margin animate__animated animate__fadeInUp'>
        <select name="" id="register-type">
            <option value="individual">Register Individual</option>
            <option value="bulk">Register Multiple</option>
        </select>
        <div class="register-box">
            <div class="teacher-detail-div animate__animated animate__fadeInLeft">
                <div class="head-label user-label">Teacher Details</div>
                <div id="upper-div">
                    <div id="name-div">
                        <label for="name" class="register-label">Name<span class="red">*</span></label>
                        <span id="name-error" class="red"></span>
                        <div id="input-name-div"><input type="text" id="name"></div>
                    </div>
                </div>
            </div>
            <div id="line"></div>
            <div class="account-detail-div animate__animated animate__fadeInRight">
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
            </div>
            <div id="register-button-div">
                <button id="register">Register</button>
            </div>
            <div id="success">Successfully Registered</div>
        </div>
    </div>

    <div class="table-margin animate__animated animate__fadeInUp">
        <div class="container" id="table-area">
            <table class="display nowrap stripe" id="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Contact</th>
                        <th>Username</th>
                        <th>Action(s)</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $result = $teacherView->fetchAllAccounts();
                    $teachid_arr = array();
                    $accountid_arr = array();
                    if ($result) {
                        foreach ($result as $row) {
                            $accId = $row['account_id'];
                            array_push($teachid_arr, $row['id']);
                            array_push($accountid_arr, $accId);
                            $id = $row['id'];
                            echo "<tr class='table-row animate__animated animate__fadeInUp' id='$id-row'>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['contact'] . "</td>";
                            echo "<td id='$accId-username'>" . $row['username'] . "</td>";
                            echo "<td id='lastRow'>";
                            echo "<button class='view-button' value='$id'></button>";
                            echo "<button class='edit-button' value='$accId'></button>";
                            echo "<button class='delete-button' value='$id-$accId'></button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

<script>
    $(document).ready(function() {
        $('#register-type').change(function() {
            var reg_type = $('#register-type').val();
            if (reg_type == 'bulk') {
                $('#register').hide();
                $('.register-box').load('../ajax/teacherBulkForm.php');
            } else {
                $('#register').show();
                $('.register-box').load('../ajax/teacherForm.php');
            }
        });

        $('#register').click(function() {
            var name = $('#name').val();
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

            $('#name-error').load('../ajax/teacherError.php', {
                Err: name_error
            });
            $('#username-error').load('../ajax/teacherError.php', {
                Err: username_error
            });
            $('#pass-error').load('../ajax/teacherError.php', {
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
                                url: "../ajax/teacherRegister.php",
                                method: "POST",
                                data: {
                                    Name: name,
                                    Username: username,
                                    Pass: pass
                                },
                                success: function(data) {
                                    $(".table-margin").html(data);
                                    $("#name").val('');
                                    $("#username").val('');
                                    $("#pass").val('');
                                    $("#name-error").html('');
                                    $("#username-error").html('');
                                    $("#pass-error").html('');
                                    $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
                                }
                            });
                        } else {
                            $("#username-error").html('Username already exists');
                        }
                    }
                });
            }
        });

        $(".view-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/teacherView.php",
                method: "POST",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $("#content-body").html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $(".edit-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/teacherEditForm.php",
                method: "POST",
                data: {
                    id: selectedId
                },
                success: function(data) {
                    $("#content-body").html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $(".delete-button").click(function() {
            var idArr = $(this).val().split("-");
            var teacherId = idArr[0];
            var accountId = idArr[1];

            $.ajax({
                url: "../ajax/teacherDeleteForm.php",
                method: "POST",
                data: {
                    id: teacherId,
                    accId: accountId
                },
                success: function(data) {
                    $("#content-body").html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $('.close-btn').click(function() {
            $('#popup-1').toggleClass('active');
        });

        $('#table').DataTable();
    });
</script>

</html>