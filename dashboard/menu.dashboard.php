<?php
if ($_SESSION['type'] == 'Admin') {
    echo '<a href="../page/calendar.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-calendar-check"></i></a>';
    echo '<a href="../page/class.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-door-open"></i></a>';
    echo '<a href="../page/student.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-user-graduate"></i> </a>';
    echo '<a href="../page/teacher.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-user-edit"></i></a>';
    echo '<a href="../page/coordinator.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-user-tie"></i></a>';
    echo '<a href="../page/scheduler.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-database"></i></a>';
    echo '<a href="../page/reset.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-undo-alt"></i></a>';
} elseif ($_SESSION['type'] == 'Coordinator') {
    echo "<a href='../page/qrscan.php' class='dash-menu-button animate__animated animate__bounceIn'><i class='uil uil-qrcode-scan'></i></a>";
    echo "<a href='../page/attendance.php' class='dash-menu-button animate__animated animate__bounceIn'><i class='las la-check-square'></i></a>";
    echo "<a href='../page/analysis-group.php' class='dash-menu-button animate__animated animate__bounceIn'><i class='bx bx-pie-chart-alt-2'></i></a>";
    echo "<a href='../page/warning.php' class='dash-menu-button animate__animated animate__bounceIn'><i class='las la-envelope-open'></i></a>";
} elseif ($_SESSION['type'] == 'Class Teacher') {
    echo '<a href="../page/qrscan.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="uil uil-qrcode-scan"></i></a>';
    echo '<a href="../page/attendance.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-check-square"></i></a>';
    echo '<a href="../page/student.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-user-graduate"></i></a>';
    echo '<a href="../page/analysis-group.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="bx bx-pie-chart-alt-2"></i></a>';
    echo '<a href="../page/warning.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-envelope-open"></i></a>';
} elseif ($_SESSION['type'] == 'Teacher') {
    echo '<a href="../page/qrscan.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="uil uil-qrcode-scan"></i></a>';
    echo '<a href="../page/attendance.php" class="dash-menu-button animate__animated animate__bounceIn"><i class="las la-check-square"></i></a>';
}
