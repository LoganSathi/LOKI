<?php
//include('../TCPDF-main/generate-warning.php');
include('../PHPMailer/notifyMail.php');
include_once 'dbh.php';

$class = $_POST["Class"]; //right
$date = $_POST["Date"]; //2022-1-30
// echo $class;
//echo $date;

$sql = "SELECT student.id, student.name, parent.email, attendance.status FROM attendance 
    INNER JOIN student ON student.id = attendance.student_id
    INNER JOIN parent ON parent.id = student.parent_id
    INNER JOIN class ON class.id = student.class_id
    WHERE class.id = $class AND attendance.date = '$date'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row["email"];
        $status = $row["status"];
        $name = $row["name"];
        notify_parent($email, $status, $name, $date);
?>
        <script>
            console.log($email);
        </script> <?php
                }
            }
