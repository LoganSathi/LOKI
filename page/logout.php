<?php
session_start();

if ($_SESSION['loggedin']) {
    unset($_SESSION['loggedin']);
    unset($_SESSION['id']);
    session_destroy();
    header('Location: main.php');
}
