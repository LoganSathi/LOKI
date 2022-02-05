<?php
$v = false;
if ($_SESSION['type'] == 'Teacher' || $_SESSION['type'] == 'Class Teacher' || $_SESSION['type'] == 'Coordinator') {
    $v = true;
}
?>

<script>
    var value = '<?php echo $v; ?>';
    if (value) {
        window.location.href = "../page/404.php";
    }
</script>