<?php
$v = false;
if ($_SESSION['type'] == 'Teacher' || $_SESSION['type'] == 'Coordinator' || $_SESSION['type'] == 'Class Teacher') {
    $v = true;
}
?>

<script>
    var value = '<?php echo $v; ?>';
    if (value) {
        window.location.href = "../page/404.php";
    }
</script>