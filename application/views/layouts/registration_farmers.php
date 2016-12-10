<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hackathon</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrapValidator.min.js"></script>

	<script>

	</script>
	<style type="text/css">
		body{
			background-color: #ECECEC;
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

		#sayings{
			width: 20%;
			height: 60px;
			margin-top: 20%;
			background-color: #fff;
			opacity: 0.7;
			filter: alpha(opacity=70);
			-webkit-filter: alpha(opacity=20);
			border-radius: 5px;
		}
		#middle_content{
			margin-top: 70px;
			z-index: 1;
			text-decoration: none;
			height:auto;
		}

	</style>
</head>
<body>

<div id="main_container">
	<div id="nav" class="col-md-12">
		<div class="col-md-6"></div>
		<div class="col-md-6">
			<ul>
				<li><a href="">Home</a></li>
				<li><a href="">About us</a></li>
				<li><a href="">User Guide</a></li>
				<li><a href="">Sign In</a></li>
			</ul>
		</div>
	</div>


	<!-- <div id="slide" class="col-md-12">
		<div id="sayings">"weaweaweaea"</div>

	</div> -->


	<div id="middle_content" class ="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-9 col-md-offset-3">
					<form class="form-horizontal">
						<fieldset>
						    <legend>Registration For Farmers</legend>
						    <div class="form-group">
						    	<label for"fname" class="col-lg-2 control-label">* First Name:</label>
						    	<div class="col-lg-6">
						    		<input class="form-control" type="text" placeholder="Enter First Name">
						    	</div>
						    </div>
						    <div class="form-group">
						    	<label for="mname" class="col-lg-2 control-label">Middle Name:</label>
						    	<div class="col-lg-6">
						    		<input class="form-control" type="text" placeholder="Enter Middle Name">
						    	</div>
						    </div>
						    <div class="form-group">
						    	<label for="lname" class="col-lg-2 control-label">* Last Name:</label>
						    	<div class="col-lg-6">
						    		<input class="form-control" type="text" placeholder="Enter Last Name">
						    	</div>
						    </div>
						    <div class="form-group">
						    	<label for="address" class="col-lg-2 control-label">* Address:</label>
						    	<div class="col-lg-6">
						    		<input type="text" class="form-control" placeholder="Enter Address">
						    	</div>
						    </div>
						   	<div class="form-group">
						   		<label for="contact" class="col-lg-2 control-label">Contact No.:</label>
						   		<div class="col-lg-6">
						   			<input type="number" class="form-control" placeholder="Enter Contact Number">
						   		</div>
						   	</div>
						   	<div class="form-group">
						    	<label for="username" class="col-lg-2 control-label">* Username:</label>
						    	<div class="col-lg-6">
						    		<input type="text" class="form-control" placeholder="Enter Username">
						    	</div>
						    </div>
						    <div class="form-group">
						    	<label for="password" class="col-lg-2 control-label">* Password:</label>
						    	<div class="col-lg-6">
						    		<input type="password" class="form-control" placeholder="Enter Email Address">
						    	</div>
						    </div>
						   	<div class="form-group">
						    	<label for="address" class="col-lg-2 control-label">* Email Address:</label>
						    	<div class="col-lg-6">
						    		<input type="text" class="form-control" placeholder="Enter Email Address">
						    	</div>
						    </div>
							<div class="form-group">
								<label for="address" class="col-lg-2 control-label">* Farm Type:</label>
								<div class="col-lg-6">
									<select class="form-control">
									  <option>Rice Farm</option>
									  <option>Chicken Farm</option>
									</select>
								</div>
						    </div>
						    <div class="form-group">
						      <div class="col-lg-9 col-lg-offset-3">
						      	<button type="submit" class="btn btn-primary">Submit</button>
						        <button type="reset" class="btn btn-default">Cancel</button>
						      </div>
						    </div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function(){
		$('#myInput').focus()
	})
</script>
