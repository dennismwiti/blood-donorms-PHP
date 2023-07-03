<html>

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
                    <div class=".col-lg-12">
                        <h1 class="page-header">registered Donors</h1>
                    </div>
                </div>

                <div class="row">
                    <div class=".col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Total Records of available donors.
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <?php
                                            include "../pages/dbconnect.php";

                                            $qry = "SELECT * FROM register";
                                            $result = mysqli_query($con, $qry);

                                            echo "<thead>
                                                    <tr>
                                                        <th>fullname</th>
                                                        <th>Username</th>
                                                        <th>phonenumber</th>
                                                        <th>Gender</th>
                                                        <th>role</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>";

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tbody>
                                                        <tr>
                                                            <td>" . $row['fullname'] . "</td>
                                                            <td>" . $row['username'] . "</td>
                                                            <td>" . $row['phonenumber'] . "</td>
                                                            <td>" . $row['gender'] . "</td>
                                                            <td>" . $row['role'] . "</td>
                                                            <td>" . $row['email'] . "</td>
                                                            
                                                        </tr>
                                                    </tbody>";
                                            }
                                        ?>
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
    </div>

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
</html>
