<?php
include_once 'nav.php';
include_once '../access/class.access.php';
include_once '../view/class.view.php';
$classView = new ClassView();
?>

<link rel="stylesheet" href="../css/table.css">
<link rel="stylesheet" href="../css/class.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<title>Class</title>

<div class="popup" id="popup-1">
  <div class="overlay"></div>
  <div class="content">
    <div class="close-btn">&times;</div>
    <div id="content-body">
    </div>
  </div>
</div>

<div id="outer">
  <div class='register-margin animate__animated animate__fadeInUp'>
    <select name="" id="register-type">
      <option value="individual">Register Individual</option>
      <option value="bulk">Register Multiple</option>
    </select>
    <div class="register-box">
      <div class="animate__animated animate__fadeInLeft">
        <div class="head-label class-label">Class Details</div>
        <div id="upper-div">
          <div id="form-div">
            <label class="register-label">Form<span class="red">*</span></label>
            <span id="form-error" class="red"></span>
            <div id="select-div">
              <select name="form" id="form">
                <option value='' selected disable hidden>Choose Form</option>
                <option value="Form 1">Form 1</option>
                <option value="Form 2">Form 2</option>
                <option value="Form 3">Form 3</option>
                <option value="Form 4">Form 4</option>
                <option value="Form 5">Form 5</option>
                <option value="Form 6">Form 6</option>
              </select>
            </div>
          </div>
          <div id="class-div">
            <label class="register-label">Class<span class="red">*</span></label>
            <span id="class-error" class="red"></span>
            <div id="input-div"><input type="text" id="class" placeholder="Format: 1 Name"></div>
          </div>
        </div>
      </div>
      <div id="line"></div>
      <div class="animate__animated animate__fadeInRight">
        <div class="head-label teacher-label">Teacher Details</div>
        <div id="lower-div">
          <div id="teacher-div">
            <label class="register-label">Class Teacher<span class="red">*</span></label>
            <span id="teacher-error" class="red"></span>
            <div id="select-div">
              <select id="teacher">
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
              </select>
            </div>
          </div>
        </div>
      </div>
      <div id="register-button-div">
        <button id="register">Register</button>
      </div>
      <div id="success">Successfully Registered</div>
    </div>
  </div>

  <div class="table-margin animate__animated animate__fadeInUp">
    <div class="container" id="table-area">
      <table class="display nowrap stripe" id="table">
        <thead>
          <tr>
            <th>Class Name</th>
            <th>Form</th>
            <th>Class Teacher</th>
            <th>Student Amount</th>
            <th>Action(s)</th>
          </tr>
        </thead>
        <tbody id="table-body">
          <?php
          $result = $classView->fetchAllClass();
          if ($result) {
            foreach ($result as $row) {
              $id = $row['id'];
              echo "<tr class='table-row animate__animated animate__fadeInUp' id='$id-row'>";
              echo "<td id='$id-name'>" . $row['name'] . "</td>";
              echo "<td id='$id-form'>" . $row['form'] . "</td>";
              echo "<td class='teacher-column' id='$id-teacher'>" . $row['teacherName'] . "</td>";
              echo "<td id='$id-amount'>" . $row['student_amount'] . "</td>";
              echo "<td id='lastRow'>";
              echo "<button class='view-button' value='$id'></button>";
              echo "<button class='edit-button' value='$id'></button>";
              echo "<button class='delete-button' value='$id'></button>";
              echo "</td>";
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>

<script>
  $(document).ready(function() {
    $('#register-type').change(function() {
      var reg_type = $('#register-type').val();
      if (reg_type == 'bulk') {
        $('.register-box').load('../ajax/classBulkForm.php');
      } else {
        $('.register-box').load('../ajax/classForm.php');
      }
    });

    $('#register').click(function() {
      $("#form-error").html('');
      $("#class-error").html('');
      $("#teacher-error").html('');

      var selected_form = $('#form').val();
      var selected_class = $('#class').val();
      var class_teacher = $('#teacher').val();
      var error = 0;
      var format1 = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

      if (!selected_form) {
        error = 1;
        $("#form-error").html('This field is required to be filled');
      }

      if (!selected_class) {
        error = 1;
        $("#class-error").html('This field is required to be filled');
      } else if (format1.test(selected_class)) {
        error = 1;
        $("#class-error").html('No special characters are allowed');
      }

      if (!class_teacher) {
        error = 1;
        $("#teacher-error").html('No special characters are allowed');
      }

      if (!error) {
        $.ajax({
          url: "../ajax/classRegister.php",
          method: "POST",
          data: {
            form: selected_form,
            class: selected_class,
            teacher: class_teacher
          },
          success: function(data) {
            $(".table-margin").html(data);
            $("#form").val('');
            $("#class").val('');
            $("#teacher").val('');
            $("#form-error").html('');
            $("#class-error").html('');
            $("#teacher-error").html('');
            $.ajax({
              url: "../ajax/classTeacherUpdate.php",
              success: function(update) {
                $("#teacher").html(update);
              }
            });
            $('#success').fadeIn(1000).delay(3000).fadeOut(1000);
          }
        });
      }
    });

    $(".view-button").click(function() {
      var selectedId = $(this).val();
      $.ajax({
        url: "../ajax/classView.php",
        method: "POST",
        data: {
          id: selectedId
        },
        success: function(data) {
          $("#content-body").html(data);
        }
      });
      $('#popup-1').toggleClass('active');
    });

    $(".edit-button").click(function() {
      var selectedId = $(this).val();
      $.ajax({
        url: "../ajax/classEditForm.php",
        method: "POST",
        data: {
          id: selectedId
        },
        success: function(data) {
          $("#content-body").html(data);
        }
      });
      $('#popup-1').toggleClass('active');
    });

    $(".delete-button").click(function() {
      var selectedId = $(this).val();

      $.ajax({
        url: "../ajax/classDeleteForm.php",
        method: "POST",
        data: {
          id: selectedId
        },
        success: function(data) {
          $("#content-body").html(data);
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