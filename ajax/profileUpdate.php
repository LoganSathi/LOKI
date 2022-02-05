<?php
session_start();
include_once '../controller/profile.controller.php';

$id = $_POST['id'];
$type = $_POST['type'];

if ($type == 'Coordinator') {
    $name = $_POST['newName'];
    $position = $_POST['newPosition'];
    $email = $_POST['newEmail'];
    $contact = $_POST['newContact'];
    $username = $_POST['newUsername'];


    $profileController = new profileController();
    $profileController->editProfileCoordinator($id, $name, $position, $email, $contact, $username);
    $_SESSION['name'] = $name;
    $_SESSION['username'] = $username;

    echo "<div id='success'>Successfully updated</div>";
} elseif ($type == 'Class Teacher' || $type == 'Teacher') {
    $name = $_POST['newName'];
    $contact = $_POST['newContact'];
    $username = $_POST['newUsername'];

    $profileController = new profileController();
    $profileController->editProfileTeacher($id, $name, $contact, $username);
    $_SESSION['name'] = $name;
    $_SESSION['username'] = $username;

    echo "<div id='success'>Successfully updated</div>";
} elseif ($type == 'Admin') {
    $name = $_POST['newName'];
    $address = $_POST['newAddress'];
    $username = $_POST['newUsername'];

    $profileController = new profileController();
    $profileController->editProfileAdmin($id, $name, $address, $username);
    $_SESSION['name'] = $name;
    $_SESSION['username'] = $username;

    echo "<div id='success'>Successfully updated</div>";
}
