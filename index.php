<?php
include('db.php');
include('function.php');
$fin ="";
if(isset($_POST['submit']))
{
	$email =get_safe_value($_POST['email']);
	$password =get_safe_value($_POST['pass']);
	$sql =mysqli_query($con,"select * from user where email='$email'");
	if(mysqli_num_rows($sql)>0)
	{
		$row =mysqli_fetch_assoc($sql);
		$db_status =$row['status'];
		if($db_status==0)
		{
			$fin ="Account Deactivated";
		}
		else{
			$db_pass =$row['password'];
		if(password_verify($password,$db_pass))
		{
				$_SESSION['QR_USER_LOGIN']=true;
				$_SESSION['QR_USER_ID']=$row['id'];
				$_SESSION['QR_USER_NAME']=$row['name'];
				$_SESSION['QR_USER_ROLE']=$row['role'];
				redirect('profile.php');
		}
		else
		{
			$fin ="Enter valid password";
		}	
		}
		
	}
	else
	{
		$fin ="Enter valid email";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts1/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts1/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css1/util.css">
	<link rel="stylesheet" type="text/css" href="css1/main.css">

</head>
<body>
<style>
  #sigma
  {
    color: red;
  }
  </style>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32" name="submit">
						<button class="login100-form-btn"  type="submit"  name="submit">
							Login
						</button>
					</div>
					<br>
					<center id="sigma">
					<?php echo $fin ?>
					</center>
				</form>

			
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/countdowntime/countdowntime.js"></script>

	<script src="js1/main.js"></script>

</body>
</html>