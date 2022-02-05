 <?php
    include_once '../view/class.view.php';
    $classView = new ClassView();
    ?>
 <option selected disabled hidden>Assign Class Teacher</option>
 <?php
    $result = $classView->fetchTeacherList();
    if ($result) {
        foreach ($result as $row) {
            $id = $row['id'];
            $name = $row['name'];
            echo "<option value='$id'>$name</option>";
        }
    }
    ?>