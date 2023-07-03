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
                    <h1 class="page-header">Edit Donor's Detail</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please make your changes by updating the form below:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    include 'dbconnect.php';
                                    $id = $_GET['id'];
                                    $qry = "select * from register where id='$id'";
                                    $result = mysqli_query($con, $qry);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <form role="form" action="edit.php" method="post">
                                            <div class="form-group">
                                                <label>Enter Full Name</label>
                                                <input class="form-control" name="fullname" type="text" value='<?php echo $row['fullname']; ?>' required>
                                                <p class="help-block">Example: Harry Den</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter username</label>
                                                <input class="form-control" type="text" name="username" value='<?php echo $row['username']; ?>' required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter phonenumber</label>
                                                <input class="form-control" type="number" name="phonenumber" value='<?php echo $row['phonenumber ']; ?>' required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Enter Email</label>
                                                <input class="form-control" type="email" name="email" value='<?php echo $row['email']; ?>' required>
                                            </div>
                                            <div class="form-group">
                                                <label>Gender [ M/F ]</label>
                                                <input class="form-control" type="text" name="gender" value='<?php echo $row['gender']; ?>' required>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter role</label>
                                                <input class="form-control" type="text" name="role" value='<?php echo $row['role']; ?>' required>
                                            </div>
                                            <!-- id hidden grna input type ma "hidden" -->
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-success">Make Changes</button>
                                        </form>
                                    <?php
                                    }
                                    ?>
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
</body>

</html>
