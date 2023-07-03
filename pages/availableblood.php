<?php
session_start();
include('../pages/dbconnect.php');

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $blood_group = $_POST['blood_group'];
    $availability = $_POST['availability'];

    // Perform database operations
    $con = mysqli_connect("localhost", "root", "", "secyear");
    if (!$con) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }

    $query = "INSERT INTO blood_inventory (blood_group, availability) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $blood_group, $availability);

    if (mysqli_stmt_execute($stmt)) {
        // Data inserted successfully
        $successMessage = "Blood availability inserted successfully.";
    } else {
        // Error inserting data into the database
        $errorMessage = 'Error inserting blood availability: ' . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Blood Group Availability</title>

    
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include 'includes/nav.php'?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2>Blood Group Availability</h2>
                <form role="form" method="POST" action="#">
                    <div class="form-group">
                        <label for="blood_group">Blood Group</label>
                        <input type="text" class="form-control" id="blood_group" name="blood_group" required>
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select class="form-control" id="availability" name="availability" required>
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Availability</button>
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
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
