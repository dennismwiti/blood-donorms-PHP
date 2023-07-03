<!DOCTYPE html>
<html lang="en">

<head>
    <title>BDMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">
</head>

<body>
    <div id="wrapper">
        <?php include 'includes/nav.php'?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Camp Details</h1>
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
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Camp_Name</th>
                                                <th>Organizers_Name</th>
                                                <th>Contact</th>
                                                <th>City</th>
                                                <th>Date of Camp</th>
                                                <th>Description</th>
                                                <th><i class="fa fa-pencil"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											include "./dbconnect.php";

											$qry = "SELECT * FROM camps";
											$result = mysqli_query($con, $qry);

											// Check if the query executed successfully
											if ($result) {
												// Fetch and display the data
												while ($row = mysqli_fetch_array($result)) {
													echo "
													<tr>
														<td>".$row['camp_name']."</td>
														<td>".$row['organizers_name']."</td>
														<td>".$row['contact']."</td>
														<td>".$row['city']."</td>
														<td>".$row['cdate']."</td>
														<td>".$row['descp']."</td>
													</tr>";
												}
											} else {
												echo "Error: " . mysqli_error($con);
											}

											// Close the connection
											mysqli_close($con);
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

        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

        <footer>
            <p>&copy; <?php echo date("Y"); ?>: Developed By Naseeb Bajracharya</p>
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
            }

            footer p {
                padding: 10.5px;
                margin: 0px;
                line-height: 100%;
            }
        </style>
    </div>
</body>

</html>
