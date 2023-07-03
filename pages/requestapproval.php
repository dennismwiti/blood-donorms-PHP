<?php
session_start();
include('../pages/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $requestId = $_POST['request_id'];
    $status = $_POST['status'];

    // Perform database operations
    $con = mysqli_connect("localhost", "root", "", "secyear");
    if (!$con) {
        die('Failed to connect to the database: ' . mysqli_connect_error());
    }

    $query = "UPDATE blood_requests SET status = ? WHERE id = ?";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $status, $requestId);

    if (mysqli_stmt_execute($stmt)) {
        // Data updated successfully
        // Redirect or display a success message
        $successMessage = "Blood request status updated successfully.";
    } else {
        // Error updating data in the database
        $errorMessage = 'Error updating blood request status: ' . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

// Fetch Blood Requests
$con = mysqli_connect("localhost", "root", "", "secyear");
if (!$con) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

$query = "SELECT * FROM blood_requests";
$result = mysqli_query($con, $query);

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Requests</title>

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
    <style>
        .table-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .table-wrapper .table {
            width: 100%;
            max-width: 800px;
        }
        
        h2 {
            overflow-wrap: break-word;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <?php include 'includes/nav.php'?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">blood requests</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Total Records of Available Campaigns
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                        if (isset($successMessage)) {
                                            echo '<div class="alert alert-success">' . $successMessage . '</div>';
                                        }
                                        if (isset($errorMessage)) {
                                            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
                                        }
                                    ?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Hospital Name</th>
                                                <th>Blood Group</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th><i class="fa fa-pencil"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<tr>';
                                                    echo '<td>' . $row['id'] . '</td>';
                                                    echo '<td>' . $row['hospital_name'] . '</td>';
                                                    echo '<td>' . $row['blood_group'] . '</td>';
                                                    echo '<td>' . $row['quantity'] . '</td>';
                                                    echo '<td>' . $row['status'] . '</td>';
                                                    echo '<td>';
                                                    echo '<form method="POST" action="#">';
                                                    echo '<div class="btn-group">';
                                                    echo '<input type="hidden" name="request_id" value="' . $row['id'] . '">';
                                                    echo '<button type="submit" class="btn btn-success" name="status" value="Approved">Approve</button>';
                                                    echo '<button type="submit" class="btn btn-danger" name="status" value="Rejected">Reject</button>';
                                                    echo '</div>';
                                                    echo '</form>';
                                                    echo '</td>';
                                                    echo '</tr>';
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; <?php echo date("Y"); ?>: Developed By Naseeb Bajracharya</p>
            </div>
        </div>
    </div>
</footer>

<style>
    footer {
        background-color: #424558;
        bottom: 0;
        left: 0;
        right: 0;
        height: 35px;
        text-align: center;
        color: #CCC;
        margin-top: 50px;
        padding: 10px 0;
    }

    footer p {
        margin: 0;
        line-height: 100%;
    }
</style>

</html>
