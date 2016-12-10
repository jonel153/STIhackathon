<!DOCTYPE HTML>
<html>
<head>
	<title>Admin panel</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/admin_style.css">
	
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>

	<style type="text/css">
		body{
		background-image: url("<?php echo base_url();?>images/login_background.jpg");
		background-size: cover;
		}

		#login{
			height: 400px;
			width: 400px;
			background-color: #87D37C;
			color: white;
			position: fixed;
			top: 20%;
			left: 60%;
			opacity: 0.7;
		}
		#login{
			box-shadow: 10px 10px 5px grey;
		}
		#login_header{
			margin-top: 10px;
			font-size: 19pt;
			text-align: center;
		}

		#login_input{
			margin-left: 30px;
			margin-right: 30px;
			margin-top: 60px
		}

		#login_input label{
			margin-top: 30px;
		}

		#submit_btn{
			margin-top: 30px;
			margin-left: 50%;
			width: 70px;
		}
	</style>
</head>

<body>

<div id="admin" class="col-md-12">
	<div id="login">
		<div id="login_header">Login</div>

		<div id="login_input">
			<form action="<?php echo base_url();?>admin/login_process" method="POST">
				<label>Username:</label><input type="text" name="username" class="form-control">
				<label>Password:</label><input type="password" name="password" class="form-control">
				<input id="submit_btn" type="submit" name="submit" value="Login" class="form-control">
			</form>
		</div>
	</div>
</div>

</body>
</html>