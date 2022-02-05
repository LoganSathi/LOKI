<?php
include_once '../view/teacher.view.php';
$teacherView = new TeacherView();

$id = $_POST['id'];
$result = $teacherView->fetchDetails($id);
$detailArr = array();
if ($result) {
    foreach ($result as $row) {
        array_push($detailArr, $row['name'], $row['contact'], $row['username'], $row['type'], $row['account_id']);
    }
}
?>

<div id="info">
    <div id="profile-pic-div">
        <?php
        $profile_url = "../profile_pic/$detailArr[4].jpg";
        if (file_exists($profile_url)) {
            echo "<img src='$profile_url' alt='Profile Image' id='profile-pic'>";
        } else {
            echo "<img src='../profile_pic/default.png' alt='Profile Image' id='profile-pic'>";
        }
        ?>
    </div>
    <div id="view-wrapper">
        <div id="label-div">
            <div class="label">Name</div>
            <div class="label">Username</div>
            <div class="label">Type</div>
            <div class="label">Contact</div>
        </div>
        <div id="info-div">
            <div class="view-div">
                <?php echo $detailArr[0] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[2] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[3] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[1] ?>
            </div>
        </div>
    </div>
</div>