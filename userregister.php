<?php
session_start();
include('./dbcon.php');

if (isset($_POST['userregister'])) {
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Check if the passwords match
    if ($password !== $confirm_password) {
        $errorMessage = 'Passwords do not match.';
    } else {
        $query = "INSERT INTO register (fullname, username, phonenumber, email, gender, role, password, confirm_password)
                  VALUES ('$fullname', '$username', '$phonenumber', '$email', '$gender', '$role', '$password', '$confirm_password')";

        if (mysqli_query($con, $query)) {
            $_SESSION['user_id'] = mysqli_insert_id($con);
            header('Location: userlogin.php');
            exit();
        } else {
            $errorMessage = 'Error inserting data into the register table: ' . mysqli_error($con);
        }
    }
}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="userstyles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <style>
		/* Coded with love by Mutiullah Samim */
	body,
	html {
		margin: 0;
		padding: 0;
		height: 100%;
		background: #fff !important;
	}
	.user_card {
		height: 400px;
		width: 350px;
		margin-top: auto;
		margin-bottom: auto;
		background: #768281de;
		position: relative;
		display: flex;
		justify-content: center;
		flex-direction: column;
		padding: 10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius: 5px;

	}
	.brand_logo_container {
		position: absolute;
		height: 170px;
		width: 170px;
		top: -75px;
		border-radius: 50%;
		background: #f5f5f5;
		padding: 10px;
		text-align: center;
	}
	.brand_logo {
		height: 150px;
		width: 150px;
		border-radius: 50%;
		border: 2px solid white;
	}
	.form_container {
		margin-top: 100px;
	}
	.login_btn {
		width: 100%;
		background: #c0392b !important;
		color: white !important;
		border-radius: 0%;
	}
	.login_btn:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}
	.login_container {
		padding: 0 2rem;
	}
	.input-group-text {
		background: #c0392b !important;
		color: white !important;
		border: 0 !important;
		border-radius: 0.25rem 0 0 0.25rem !important;
	}
	.input_user,
	.input_pass:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}
	.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
		background-color: #c0392b !important;
	}
</style>
</head>
<body>

<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card">
			<div class="d-flex justify-content-center">
				<div class="brand_logo_container">
					<img src="./userlog/img/ico.png" class="brand_logo" alt="Logo">
				</div>
			</div>
			<div class="d-flex justify-content-center form_container">
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="fullname" class="form-control input_user" value="" placeholder="Full Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control input_user" value="" placeholder="Username" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="tel" name="phone" class="form-control input_user" value="" placeholder="Phone Number" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control input_user" value="" placeholder="Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                        </div>
                        <select name="gender" class="form-control input_user" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                        </div>
                        <select name="role" class="form-control input_user" required>
                            <option value="">Select Role</option>
                            <option value="Donor">Donor</option>
                            <option value="Field Staff">Field Staff</option>
                            <option value="Hospital">Hospital</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass" value="" placeholder="Password" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="confirm_password" class="form-control input_pass" value="" placeholder="Confirm Password" required>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="userregister" style="border-radius: 0%" class="btn login_btn">Register</button>
                    </div>
                </form>
            </div>
			<?php if (isset($errorMessage)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <?php echo $errorMessage; ?>
                </div>
            <?php } ?>
			<div class="mt-4">
				<div class="d-flex justify-content-center links">
					Already have an account? <a href="userlogin.php" class="ml-2" style="text-decoration:none">Login</a>
				</div>
				<div class="d-flex justify-content-center links">
					<a href="./index.php" style="text-decoration:none; color: black">Back to Admin Panel</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
