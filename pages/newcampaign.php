

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    <h1 class="page-header">Set New Camp</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please fill up the form below:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="addedcampaign.php" method="post">
                                        <?php
                                            // Include the database connection file
                                            $con = mysqli_connect("localhost", "root", "", "secyear");

                                            // Check connection
                                            if (mysqli_connect_errno()) {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }

                                            if (isset($_POST['submit'])) {
                                                $camp_name = $_POST["camp_name"];
                                                $organizers_name = $_POST["organizers_name"];
                                                $city = $_POST["city"];
                                                $contact = $_POST["contact"];
                                                $cdate = $_POST["cdate"];
                                                $descp = $_POST["descp"];

                                                // Prepare the query
                                                $qry = "INSERT INTO camps (camp_name, organizers_name, city, contact, cdate, descp) 
                                                        VALUES ('$camp_name', '$organizers_name', '$city', '$contact', '$cdate', '$descp')";

                                                // Execute the query
                                                if (mysqli_query($con, $qry)) {
                                                    echo "<div style='text-align: center'><h1>SUBMITTED SUCCESSFULLY</h1>";
                                                    echo "<a href='index.php' style='text-align: center'><h3>Go Back</h3></a>";
                                                } else {
                                                    echo "ERROR: " . mysqli_error($con);
                                                }
                                            }
                                        ?>
                                        <div class="form-group">
                                            <label>Camp's Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Camp's Name" name="camp_name" required>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Organizer Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Organizer's Name" name="organizers_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" type="text" placeholder="Enter City" name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" placeholder="9876543210" type="number" name="contact" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Camp Date</label>
                                            <input class="form-control" type="date" name="cdate" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" type="text" rows="4" name="descp" required></textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success" style="border-radius:0%">Post</button>
                
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
