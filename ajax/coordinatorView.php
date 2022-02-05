<?php
include_once '../view/coordinator.view.php';
$coordinatorView = new CoordinatorView();

$id = $_POST['id'];
$result = $coordinatorView->fetchDetails($id);
$detailArr = array();
if ($result) {
    foreach ($result as $row) {
        array_push($detailArr, $row['name'], $row['position'], $row['email'], $row['contact'], $row['username'], $row['account_id']);
    }
}
?>

<div id="info">
    <div id="profile-pic-div">
        <?php
        $profile_url = "../profile_pic/$detailArr[5].jpg";
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
            <div class="label">Position</div>
            <div class="label">Username</div>
            <div class="label">Email</div>
            <div class="label">Contact</div>
        </div>
        <div id="info-div">
            <div class="view-div">
                <?php echo $detailArr[0] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[1] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[4] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[2] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[3] ?>
            </div>
        </div>
    </div>
</div>