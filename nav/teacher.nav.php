<div class="sidebar">
    <div class="logo-details">
        <div id="logo"></div>
        <div class="logo_name">LOKI</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="../page/dashboard.php">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="../page/qrscan.php">
                <i class='uil uil-qrcode-scan'></i>
                <span class="links_name">QR Scan</span>
            </a>
            <span class="tooltip">Qr Scan</span>
        </li>
        <li>
            <a href="../page/attendance.php">
                <i class="las la-check-square"></i>
                <span class="links_name">Manual Attendance</span>
            </a>
            <span class="tooltip">Manual Attendance</span>
        </li>
        <li class="profile">
            <a href="../profile/teacher.profile.php" id="profile-page">
                <div class="profile-details">
                    <?php
                    $accountId = $_SESSION['id'];
                    $profile_url = "../profile_pic/$accountId.jpg";
                    if (file_exists($profile_url)) {
                        echo "<img src='$profile_url' alt='Profile Image'>";
                    } else {
                        echo "<img src='../profile_pic/default.png' alt='Profile Image'>";
                    }
                    ?>
                    <div class="name_job">
                        <div class="name"><?php echo $_SESSION['name']; ?></div>
                        <div class="job">Teacher</div>
                    </div>
                </div>
            </a>
            <a href="../page/logout.php" id="logout_button"><i class='bx bx-log-out' id="log_out"></i></a>
        </li>
    </ul>
</div>