<?php
include_once '../controller/profile.controller.php';
include_once '../view/profile.view.php';
$profileView = new profileView();
$profileController = new profileController();

$id = $_POST['id'];
$old_pass = $_POST['oldPass'];
$new_pass = $_POST['newPass'];
$confirm_pass = $_POST['confirmPass'];

$checkPass = $profileView->checkPass($id, $old_pass);

if ($checkPass == 'true') {
    if (strlen($new_pass) < 8) {
        echo "short";
    } else {
        if ($new_pass == $confirm_pass) {
            $new_pass = password_hash($confirm_pass, PASSWORD_DEFAULT);
            $profileController->editPass($id, $new_pass);
            echo "success";
        } else {
            echo "match";
        }
    }
} else {
    echo "wrong";
}
