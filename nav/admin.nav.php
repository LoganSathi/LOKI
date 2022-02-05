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
            <a href="../page/calendar.php">
                <i class="las la-calendar-check"></i>
                <span class="links_name">Calendar</span>
            </a>
            <span class="tooltip">Calendar</span>
        </li>
        <li>
            <a href="../page/class.php">
                <i class="las la-door-open"></i>
                <span class="links_name">Class</span>
            </a>
            <span class="tooltip">Class</span>
        </li>
        <li>
            <a href="../page/student.php">
                <i class="las la-user-graduate"></i>
                <span class="links_name">Students</span>
            </a>
            <span class="tooltip">Students</span>
        </li>
        <li>
            <a href="../page/teacher.php">
                <i class="las la-user-edit"></i>
                <span class="links_name">Teachers</span>
            </a>
            <span class="tooltip">Teachers</span>
        </li>
        <li>
            <a href="../page/coordinator.php">
                <i class="las la-user-tie"></i>
                <span class="links_name">Coordinators</span>
            </a>
            <span class="tooltip">Coordinators</span>
        </li>
        <li>
            <a href="../page/scheduler.php">
                <i class="las la-database"></i>
                <span class="links_name">Backup</span>
            </a>
            <span class="tooltip">Backup</span>
        </li>
        <li>
            <a href="../page/reset.php">
                <i class="las la-undo-alt"></i>
                <span class="links_name">Reset</span>
            </a>
            <span class="tooltip">Reset</span>
        </li>
        <li class="profile">
            <a href="../profile/admin.profile.php" id="profile-page">
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
                        <div class="job">Admin</div>
                    </div>
                </div>
            </a>
            <a href="../page/logout.php" id="logout_button"><i class='bx bx-log-out' id="log_out"></i></a>
        </li>
    </ul>
</div>