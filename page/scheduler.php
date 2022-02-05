<?php
include_once 'nav.php';
include_once '../access/backup.access.php';
include_once '../view/backup.view.php';
$backupView = new BackupView();
?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="../css/table.css">
<link rel="stylesheet" href="../css/backup.css">

<title>Backup</title>

<div class="popup" id="popup-1">
  <div class="overlay"></div>
  <div class="content">
    <div class="close-btn">&times;</div>
    <div id="content-body">
    </div>
  </div>
</div>

<!-- <div>
  <div>
    <button id="backup">BACKUP</button>
  </div>
</div> -->

<div id="outer">
  <div id="backup-box" class="animate__animated animate__fadeInUp">
    <div id="wrapper">
      <div id="upper-div">
        <div id="backup-div" class="animate__animated animate__fadeInUp">
          <button id="backup" class="animate__animated animate__bounceIn">Backup</button>
        </div>
        <div id="desc-div" class="animate__animated animate__fadeInUp">
          <ul id="desc">
            <li><span class="purple">Backup</span> will copy all the records and store it to be restored later</li>
            <li>You may create as many backup files as you wish, and any of it can be used to <span class="purple">restore</span> the system's data at any time</li>
            <li>You may <span class="purple">delete</span> redundant backup files. It is recommended to remove older version of backup files when creating a new one.</li>
          </ul>
        </div>
      </div>
      <div id="success">
        Successfully created new Backup
      </div>
    </div>
  </div>


  <div id="table-margin" class="animate__animated animate__fadeInUp">
    <table class="table table-fluid stripe" id="table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Year</th>
          <th>Time</th>
          <th>Action(s)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $backupView->fetchAllBackups();
        $backupid_arr = array();
        if ($result > 0) {
          $i = 1;
          foreach ($result as $row) {
            $id = $row['id'];
            $name = $row['name'];
            echo "<tr id='$id-row'>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td id='lastRow'>";
            echo "<button class='restore-button' value='$id|$name'></button>";
            echo "<button class='delete-button' value='$id|$name'></button>";
            echo "</td>";
            echo "</tr>";
            $i++;
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#backup').click(function() {
      window.location = 'backup.php';
      $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
    });

    $(".restore-button").click(function() {
      var idName = $(this).val().split("|");
      var id = idName[0];
      var name = idName[1];
      $.ajax({
        url: "../ajax/backupRestoreForm.php",
        method: "POST",
        data: {
          id: id,
          name: name
        },
        success: function(data) {
          $('#content-body').html(data);
        }
      });
      $('#popup-1').toggleClass('active');
    });

    $(".delete-button").click(function() {
      var idName = $(this).val().split("|");
      var id = idName[0];
      var name = idName[1];
      $.ajax({
        url: "../ajax/backupDeleteForm.php",
        method: "POST",
        data: {
          id: id,
          name: name
        },
        success: function(data) {
          $('#content-body').html(data);
        }
      });
      $('#popup-1').toggleClass('active');
    });

    $('.close-btn').click(function() {
      $('#popup-1').toggleClass('active');
    });

    $('#table').DataTable();
  });
</script>

</html>