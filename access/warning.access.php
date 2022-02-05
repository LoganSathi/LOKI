<?php
$v = false;
if ($_SESSION['type'] == 'Teacher' || $_SESSION['type'] == 'Admin') {
    $v = true;
}
?>

<script>
    var value = '<?php echo $v; ?>';
    if (value) {
        window.location.href = "../page/404.php";
    }
</script>