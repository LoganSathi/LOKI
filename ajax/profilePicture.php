<?php

$id = $_POST['id'];

if (isset($_FILES['file']['name'])) {
    unlink("../profile_pic/$id.jpg");
    $file_array = explode(".", $_FILES["file"]["name"]);
    $extension = end($file_array);

    $filename =  $_FILES['file']['name'];
    $location = "../profile_pic/" . $id . "." . $extension;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    }
}
