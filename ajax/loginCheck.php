<?php
include_once '../view/login.view.php';
include_once '../model/login.model.php';

$loginView = new LoginView();
$loginModel = new LoginModel();

$username = $_POST['Username'];
$pass = $_POST['Password'];
session_start();
if (isset($_SESSION['loggedin'])) {
    exit('success');
} else {
    if ($username && $pass) {
        $result = $loginView->checkAccount($username, $pass);
        if ($result == 'unregistered') {
            exit("The username doesn't exist");
        } elseif ($result == 'wrong') {
            exit("The password you entered is incorrect");
        } elseif (!$result) {
            $_SESSION['loggedin'] = '1';
            exit("<div id='success'>Success</div>");
        }
    } else {
        exit('Both fields are required');
    }
}
