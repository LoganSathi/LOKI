<?php
include_once '../view/coordinator.view.php';
include_once '../controller/coordinator.controller.php';
$coordinatorController = new CoordinatorController();
$coordinatorView = new CoordinatorView();

$name = $_POST['Name'];
$position = $_POST['Position'];
$username = $_POST['Username'];
$pass = password_hash($_POST['Pass'], PASSWORD_DEFAULT);

$accId = $coordinatorController->registerCoordinator($username, $pass, $name, $position);
$id = $coordinatorView->fetchId($accId);
?>

<div class="container" id="table-area">
    <table class="display nowrap stripe" id="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Username</th>
                <th>Action(s)</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $result = $coordinatorView->fetchAllAccounts();
            $coorid_arr = array();
            $accountid_arr = array();
            if ($result) {
                foreach ($result as $row) {
                    $accId = $row['account_id'];
                    array_push($coorid_arr, $row['id']);
                    array_push($accountid_arr, $accId);
                    $id = $row['id'];
                    echo "<tr class='table-row' id='$id-row'>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td id='$accId-username'>" . $row['username'] . "</td>";
                    echo "<td id='lastRow'>";
                    echo "<button class='view-button' value='$id'></button>";
                    echo "<button class='edit-button' value='$accId'></button>";
                    echo "<button class='delete-button' value='$id-$accId'></button>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $(".view-button").click(function() {
            var selectedId = $(this).val();
            $.ajax({
                url: "../ajax/coordinatorView.php",
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
                url: "../ajax/coordinatorEditForm.php",
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
            var idArr = $(this).val().split("-");
            var coordinatorId = idArr[0];
            var accountId = idArr[1];

            $.ajax({
                url: "../ajax/coordinatorDeleteForm.php",
                method: "POST",
                data: {
                    id: coordinatorId,
                    accId: accountId
                },
                success: function(data) {
                    $("#content-body").html(data);
                }
            });
            $('#popup-1').toggleClass('active');
        });

        $('#table').DataTable();
    });
</script>