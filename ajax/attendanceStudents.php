<script src="../config/lottie.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
session_start();
include_once '../view/attendance.view.php';
$attendanceView = new AttendanceView();

$date = $_POST['date'];
$class  = $_POST['class'];

$result = $attendanceView->fetchAttendance($class, $date);
$attid_arr = array();
$val_arr = array();
$absent_arr = array();
if ($result) {
    echo "<div id='button-div'><div id='pr-ab-div'><button id='all-pr'>All Present</button><button id='all-ab'>All Absent</button></div></div>";
    echo "<div id='student-margin'>";
    $i = 0;
    foreach ($result as $row) {
        $att_id = $row['id'];
        array_push($attid_arr, $att_id);
        $status = $row['status'];
        array_push($val_arr, $status);
        $student_name = $row['name'];
        echo "<div id='student-div' class='animate__animated animate__bounceIn'><div id='face'><button class='student' id='$i' value='$status' style='outline: none;'></button></div><div id='name-div'>$student_name</div>";
        if ($status == 0) {
            $reason = $attendanceView->fetchAbsent($att_id);
            if ($reason) {
                array_push($absent_arr, $reason);
                echo "<div class='reason-div'><button class='reason provided' id='reason-$att_id' value='$att_id'>$reason</button></div></div>";
            } else {
                array_push($absent_arr, '');
                echo "<div class='reason-div'><button class='reason unprovided' id='reason-$att_id' value='$att_id'>$reason</button></div></div>";
            }
        } else {
            array_push($absent_arr, '');
            echo "<div class='reason-div'><button class='reason noneed' id='reason-$att_id' value='$att_id' disabled></button></div></div>";
        }
        $i++;
    }
    echo "</div><div id='submit-div'><button id='submit'>Submit</button></div><div id='update-message'>Successfully Updated</div><br>";
    if ($_SESSION['type'] == "Class Teacher") {
        if ($_SESSION['class'] == $class) {
            echo "<div id='submit-div'><button id='notify'>Send Notification</button></div><div id='update-message1'>Successfully Sent</div></div>";
        }
    }
} else {
    echo "<div id='empty'>Attendance unavailable</div></div>";
}
?>

<div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn">&times;</div>
        <div id="content-body">
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var attid_arr = <?php echo json_encode($attid_arr); ?>;
        var val_arr = <?php echo json_encode($val_arr); ?>;
        <?php
        for ($i = 0; $i < sizeof($attid_arr); $i++) {
            $att_id = $attid_arr[$i];
            echo "var container$i = document.getElementById('$i');";
            echo "if ($('#$i').val() == 1) {var state$i = 'present'} else {var state$i = 'absent'}";
            echo "var animation$i = bodymovin.loadAnimation({container: container$i,path: '../svg/student/data.json',renderer: 'svg',loop: false,autoplay: false});";
            echo "if (state$i == 'present') {animation$i.goToAndStop(180, true);} else {animation$i.goToAndStop(350, true);}";
            echo "container$i.addEventListener('click', () => {if (state$i === 'present') {animation$i.playSegments([180, 350], true);state$i = 'absent';val_arr[$i]=0;$('#reason-$att_id').attr('disabled',false);getReason('$att_id');} else {animation$i.playSegments([0, 180], true);state$i = 'present';val_arr[$i]=1;$('#reason-$att_id').attr('disabled',true);$('#reason-$att_id').css('background','#dbe0ebb9');}});";
        }
        ?>

        function getReason(attendanceId) {
            var color = '';
            $.ajax({
                url: "../ajax/attendanceColor.php",
                method: "POST",
                data: {
                    id: attendanceId
                },
                success: function(data) {
                    $('#reason-' + attendanceId).css('background', data);
                }
            });
        }

        $("#all-pr").click(function() {
            <?php
            for ($i = 0; $i < sizeof($attid_arr); $i++) {
                $att_id = $attid_arr[$i];
                echo "animation$i.playSegments([0, 180], true);state$i = 'present';val_arr[$i]=1;$('#reason-$att_id').attr('disabled',true);$('#reason-$att_id').css('background','#dbe0ebb9');";
            }
            ?>
        });

        $("#all-ab").click(function() {
            <?php
            for ($i = 0; $i < sizeof($attid_arr); $i++) {
                $att_id = $attid_arr[$i];
                $reason = $absent_arr[$i];
                echo "animation$i.playSegments([180, 350], true);state$i = 'absent';val_arr[$i]=0;$('#reason-$att_id').attr('disabled',false);getReason('$att_id');";
            }
            ?>
        });

        $('#submit').click(function() {
            $.ajax({
                url: "../ajax/attendanceUpdate.php",
                method: "POST",
                data: {
                    idArr: attid_arr,
                    valArr: val_arr
                },
                success: function(data) {
                    $('#result').html(data);
                    $('#update-message').fadeIn(1000).delay(3000).fadeOut(1000);
                    for (let i = 0; i < attid_arr.length; i++) {
                        if (val_arr[i] == 1) {
                            $('#reason-' + attid_arr[i]).html('');
                        }
                    }
                }
            });
        });

        $('#notify').click(function() {
            $.ajax({
                async: true,
                url: "../attendance_notification/notification.php",
                method: "POST",
                data: {
                    Date: "<?php echo $date; ?>",
                    Class: "<?php echo $class; ?>"
                },
                success: function(data) {
                    $('#result').html(data);
                    $('#update-message1').fadeIn(1000).delay(3000).fadeOut(1000);
                }
            });
        });

        $(".reason").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/attendanceAbsentForm.php",
                method: "POST",
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
    });
</script>