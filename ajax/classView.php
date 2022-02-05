<?php
include_once '../view/class.view.php';
$classView = new ClassView();

$id = $_POST['id'];
$result = $classView->fetchDetails($id);
$detailArr = array();
if ($result) {
    foreach ($result as $row) {
        array_push($detailArr, $row['name'], $row['form'], $row['teacher'], $row['student_amount']);
    }
}
?>

<div id="info">
    <div id="view-wrapper">
        <div id="label-div">
            <div class="label">Class Name</div>
            <div class="label">Form</div>
            <div class="label">Class Teacher</div>
            <div class="label">Student Amount</div>
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
        </div>
    </div>
</div>