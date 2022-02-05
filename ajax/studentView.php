<?php
include_once '../view/student.view.php';
$studentView = new StudentView();

$id = $_POST['id'];
$result = $studentView->fetchDetails($id);
$detailArr = array();
if ($result) {
    foreach ($result as $row) {
        array_push($detailArr, $row['name'], $row['dob_format'], $row['gender'], $row['parent'], $row['relationship'], $row['email'], $row['contact'], $row['class']);
    }
}
?>

<div id="info">
    <div id="view-wrapper">
        <div id="label-div">
            <div class="label">Name</div>
            <div class="label">Date of Birth</div>
            <div class="label">Gender</div>
            <div class="label">Parent Name</div>
            <div class="label">Relationship</div>
            <div class="label">Email</div>
            <div class="label">Contact</div>
            <div class="label">Class</div>
        </div>
        <div id="info-div">
            <div class="view-div">
                <?php echo $detailArr[0] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[1] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[2] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[3] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[4] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[5] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[6] ?>
            </div>

            <div class="view-div">
                <?php echo $detailArr[7] ?>
            </div>
        </div>
    </div>
</div>