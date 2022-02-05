<?php

$error = $_POST['Err'];

if ($error == 'empty') {
    echo 'This field is required to be filled!';
} elseif ($error == 'special') {
    echo 'No special characters are allowed!';
} elseif ($error == 'length') {
    echo 'This field should be at least 8 characters long!';
} elseif ($error == 'notsame') {
    echo 'Passwords do not match!';
}
