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
			background-image: url("<?php echo base_url();?>images/field-wallpapers.jpg");
			background-size: cover;
			background-repeat: no-repeat;
			}

			#nav{
				position: fixed;
				background-color: #2ecc71;
				width: 100%;
				height: 50px;
				opacity: 0.6;
				z-index: 1;
			}

			#nav ul{
				list-style: none;
			}

			#nav li {
				font-size: 20px;
				display: inline;

			}

			#nav ul li a{
				text-decoration: none;
				color: white;
				margin-left: 35px;
				line-height: 50px;
			}

			#nav ul li a:hover{
				padding-top: 20px;
				padding-bottom: 15px;
				padding-left: 2px;
				padding-right: 2px;
				background-color: white;
				color: #2ecc71;
				transition: all 0.2s ease-in-out 0.1s;
				border-radius: 3px;
			}

			#login{
				height: 350px;
				width: 400px;
				background-color: #87D37C;
				color: white;
				position: fixed;
				top: 30%;
				left: 35%;
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
				margin-top: 5px;
			}

			#submit_btn{
				margin-top: 30px;
				margin-left: 30%;
				width: 150px;
			}
		</style>
	</head>

	<body>

		<div id="nav" class="col-md-12">
			<div class="col-md-5"></div>
			<div class="col-md-7">
				<ul>
					<li><a href="<?php echo site_url('main/index');?>">Home</a></li>
					<li><a href="">About us</a></li>
					<li><a href="">User Guide</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Registration <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#farmers">Farmers</a></li>
							<li><a href="#Investors">Investors</a></li>
						</ul>
					</li>
					<li><a href="#" data-toggle="modal" data-target="#myModal1">Sign in</a></li>

					<!-- Modal for Sign In -->
					<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									Sign In
								</div>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</div>

		<div id="admin" class="col-md-12">
			<div id="login">
				<div id="login_header">
					<p class="text-uppercase" style="font-size:40px;">
						<strong style="font-family:Imprint BT Shadow;">Login</strong>
					</p>
				</div>
				<div id="login_input">
					<label>Username:</label><input type="text" name="username" class="form-control">
					<label>Password:</label><input type="password" name="password" class="form-control">

					<input id="submit_btn" type="submit" name="submit" value="Login" class="form-control">
				</div>
			</div>
		</div>

	</body>
</html>
