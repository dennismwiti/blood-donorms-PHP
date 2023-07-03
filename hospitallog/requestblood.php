<?php
session_start();
include('../pages/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $hospitalName = $_POST['hospital_name'];
    $bloodGroup = $_POST['blood_group'];
    $quantity = $_POST['quantity'];

    // Perform database operations
    $con = mysqli_connect("localhost", "root", "", "secyear");
    if (!$con) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }

    $query = "INSERT INTO blood_requests (hospital_name, blood_group, quantity, status)
              VALUES (?, ?, ?, 'Pending')";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sss", $hospitalName, $bloodGroup, $quantity);

    if (mysqli_stmt_execute($stmt)) {
        // Data inserted successfully
        // Redirect or display a success message
        $successMessage = "Blood request submitted successfully.";
    } else {
        // Error inserting data into the database
        $errorMessage = 'Error submitting blood request: ' . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Request Form</title>
    <!-- Bootstrap CSS -->
    <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- DataTables CSS -->
 <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 
<!-- DataTables Responsive CSS -->
<link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="../icofont/icofont.min.css">
</head>

<body>
    <?php include 'includes/nav.php'?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>Blood Request Form</h2>
                <form role="form" method="POST" action="#">
                    <div class="form-group">
                        <label for="hospital_name">Hospital Name</label>
                        <input type="text" class="form-control" id="hospital_name" name="hospital_name" required>
                    </div>
                    <div class="form-group">
                        <label for="blood_group">Blood Group</label>
                        <input type="text" class="form-control" id="blood_group" name="blood_group" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
                if (isset($successMessage)) {
                    echo '<div class="alert alert-success">' . $successMessage . '</div>';
                }
                if (isset($errorMessage)) {
                    echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
                }
                ?>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>Blood Request Status</h2>
                <?php
                // Fetch Blood Requests
                $con = mysqli_connect("localhost", "root", "", "secyear");
                if (!$con) {
                    die('Failed to connect to the database: ' . mysqli_connect_error());
                }

                $query = "SELECT * FROM blood_requests";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo '<table class="table">
                            <thead>
                                <tr>
                                    <th>Hospital Name</th>
                                    <th>Blood Group</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <td>' . $row['hospital_name'] . '</td>
                                <td>' . $row['blood_group'] . '</td>
                                <td>' . $row['quantity'] . '</td>
                                <td>' . $row['status'] . '</td>
                            </tr>';
                    }
                    echo '</tbody>
                        </table>';
                } else {
                    echo '<div class="alert alert-info">No blood requests found.</div>';
                }

                mysqli_close($con);
                ?>
            </div>
        </div>
    </div>

   <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

</body>

<footer>
        <p>&copy; <?php echo date("Y"); ?>: Developed By Naseeb Bajracharya</p>
    </footer>
	
	<style>
	footer{
        margin-top: auto;
   background-color: #424558;
    bottom: 0;
    left: 0;
    right: 0;
    height: 80px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
</style>

</html>
