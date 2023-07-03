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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">BBMS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MESSAGE BOX
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="finaladdedcampaign.php" method="post">
                                        <?php
                                            $con = mysqli_connect("localhost", "root", "", "secyear");

                                            // Check connection
                                            if (mysqli_connect_errno()) {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }

                                            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                                $camp_name = $_POST["camp_name"];
                                                $organizers_name = $_POST["organizers_name"];
                                                $contact = $_POST["contact"];
                                                $city = $_POST["city"];
                                                $cdate = $_POST["cdate"];
                                                $descp = $_POST["descp"];
                                                $id = $_POST['id'];

                                                // Update query
                                                $qry = "UPDATE camps SET camp_name='$camp_name', organizers_name='$organizers_name', contact='$contact', city='$city', cdate='$cdate', descp='$descp' WHERE id='$id'";
                                                $result = mysqli_query($con, $qry); // Query execution

                                                if (!$result) {
                                                    echo "ERROR: " . mysqli_error($con);
                                                } else {
                                                    echo "CAMPAIGN UPDATED";
                                                }
                                            }
                                        ?>

                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
        <p>&copy; <?php echo date("Y"); ?>: Developed By Naseeb Bajracharya</p>
    </footer>
	
	<style>
	footer{
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
