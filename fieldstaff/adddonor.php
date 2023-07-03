<?php
session_start();
include('../pages/dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "INSERT INTO register (fullname, username, phonenumber, email, gender, role, password)
              VALUES ('$fullname', '$username', '$phonenumber', '$email', '$gender', '$role', '$password')";

    if (mysqli_query($con, $query)) {
        $_SESSION['user_id'] = mysqli_insert_id($con);
        header('Location: staffdashboard.php');
        exit();
    } else {
        $errorMessage = 'Error inserting data into the table: ' . mysqli_error($con);
    }
}
?>



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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

    <?php include 'includes/fieldnav.php'?>

        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Donor's Detail</h1>
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
                                    <form role="form" action="#" method="post">
                                     
                                        <div class="form-group">
                                            <label>Enter Full Name</label>
                                            <input class="form-control" name="fullname" type="text" placeholder="Example:Harry Den" required>
                                        </div>
                                        <div class="form-group">
                                            <label>username</label>
                                            <input class="form-control" placeholder="username" name="username" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>phone number</label>
                                            <input class="form-control" type="number" placeholder="phonenumber" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter D.O.B</label>
                                            <input class="form-control" type="date" name="dob" required>
                                        </div>

                                        <div class="form-group">
                                            <label>gender</label> 
                                            <input class="form-control" type="text" placeholder="gender" name="gender" required>
                                        </div>

                                        <div class="form-group">
                                            <label>role</label>
                                            <input class="form-control" type="text" placeholder="example:donor" name="role" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Email Id</label>
                                            <input class="form-control" type="email" placeholder="Enter Email Id" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter password</label>
                                            <input class="form-control" type="password" placeholder="password" name="password" required>
                                        </div>

                                        <button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%";>Submit Form</button>

                
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
            <!-- /.containerfluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>

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
