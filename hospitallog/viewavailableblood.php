<?php
session_start();
include('../pages/dbconnect.php');

// Retrieve blood group data from the database
$con = mysqli_connect("localhost", "root", "", "secyear");
if (!$con) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

$query = "SELECT * FROM blood_inventory";
$result = mysqli_query($con, $query);

$blood_groups = array();
while ($row = mysqli_fetch_assoc($result)) {
    $blood_group = $row['blood_group'];
    $availability = $row['availability'];
    $blood_groups[$blood_group] = $availability;
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Blood Availability</title>
   

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
    <div id="wrapper">
        <?php include 'includes/nav.php'?>
        <div id="page-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Blood Availability</h2>
                        <?php
                        if (!empty($blood_group)) {
                            echo '<table class="table">
                                    <thead>
                                        <tr>
                                            <th>Blood Group</th>
                                            <th>Availability</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                            foreach ($blood_groups as $blood_group => $availability) {
                                echo '<tr>
                                        <td>' . $blood_group . '</td>
                                        <td>' . $availability . '</td>
                                    </tr>';
                            }
                            echo '</tbody>
                                </table>';
                        } else {
                            echo '<div class="alert alert-info">No blood groups found.</div>';
                        }
                        ?>
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

</html>
