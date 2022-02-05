<?php
include_once 'nav.php';
include_once '../view/dashboard.view.php';
$dashboardView = new dashboardView();

$today_date = date("Y-m-d");
/* $today_date = "2021-12-19"; */
$dateObj = date_create($today_date);
$school_perc = $dashboardView->schoolPercentage($today_date);
if (!$school_perc) {
    $school_perc = 0;
}
?>
<link rel="stylesheet" href="../css/dashboard.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<title>Welcome to LOKI</title>

<div id="outer">
    <div id="info-column">
        <div id="welcome-row" class="animate__animated animate__fadeInUpBig">Hello, <span id="welcome-name"><?php echo $_SESSION['name']; ?></span></div>
        <div id="account-row" class="animate__animated animate__fadeInUpBig">
            <div>
                <div id="acc-type"><?php echo $_SESSION['type']; ?></div>
                <div id="dashboard-menu">
                    <?php include_once '../dashboard/menu.dashboard.php'; ?>
                </div>
            </div>
            <div id="profile-pic-div" class="animate__animated animate__fadeInDown">
                <?php
                $accountId = $_SESSION['id'];
                $profile_url = "../profile_pic/$accountId.jpg";
                if (file_exists($profile_url)) {
                    echo "<img src='$profile_url' alt='Profile Image' id='profile-pic'>";
                } else {
                    echo "<img src='../profile_pic/default.png' alt='Profile Image' id='profile-pic'>";
                }
                ?>
            </div>
        </div>
        <div id="graph-row" class="animate__animated animate__fadeInUpBig">
            <div id="school-perc-div" class="animate__animated  animate__fadeInLeft">
                <div id="doughnut-wrapper">
                    <canvas id="myChart"></canvas>
                    <div id="percentage" class="animate__animated  animate__fadeIn"><?php echo $school_perc; ?>%</div>
                </div>
                <p id="school-perc-label">Percentage of Attendance<br>on <span id="selected-period-id"><?php echo date_format($dateObj, "d F Y"); ?></span></p>
            </div>
            <div id="form-div" class="animate__animated  animate__fadeInLeft">
                <div id="bar-title">Attendance percentage for <span id="current-month"><?php echo date("F Y"); ?></span></div>
                <?php
                include_once '../dashboard/barGraph.dashboard.php';
                ?>
            </div>
        </div>
    </div>
    <div id="calendar-column" class="animate__animated animate__fadeInRightBig">
        <?php
        include_once '../dashboard/calendar.dashboard.php';
        ?>
    </div>
</div>

</body>

<script>
    $(document).ready(function() {
        var school_perc = '<?php echo $school_perc; ?>';
        console.log(school_perc);

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Present', 'Absent'],
                datasets: [{
                    data: [school_perc, (100 - school_perc)],
                    backgroundColor: ['rgb(137, 15, 102, 0.4)', '#dbe0ebb9'],
                    borderWidth: [0]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                animation: {
                    delay: 1500
                }
            }
        });
    });
</script>

</html>