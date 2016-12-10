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
		#slide{
			border: 1px solid black;
			height: 500px;
			background-image: url("<?php echo base_url();?>images/slide2.jpg");
			background-size: cover;
			background-attachment: fixed;
			z-index: -2;
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

		#middle_content{
			margin-top: 30px;
		}

		#middle_content #announcement{

			height: 400px;

		 }

		#middle_content #content1{
			margin-left: -10px;
			height: auto;
			border: 1px solid #ffffff;
			box-shadow: 5px 5px 2px grey;

		}
		#middle_content #content2{
			height: auto;
			border: 1px solid #ffffff;
			box-shadow: 5px 5px 3px grey;

		}
		#middle_content #content3{
			height: auto;
			border: 1px solid #ffffff;
			box-shadow: 5px 5px 3px grey;

		}


		#middle_content #modal{
			background-color: #2ecc71;
			opacity: 0.6;
			z-index: 1;
			text-decoration: none;
			color: white;
			border-radius: 3px;
		}

		#middle_content #announcement{
			z-index: 1;
			text-decoration: none;
			color:white;
			height:auto;
			box-shadow: 10px 10px 5px grey;
		}

		#middle_content #announcement-header{
			font-family: Imprint MT Shadow;
		}

		#middle_content #view-more{
			margin-left:65%;
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
		#myModal1{
			z-index: 5;
		}
	</style>
</head>
<body>

<div id="main_container">
	<div id="nav" class="col-md-12">
		<div class="col-md-5"></div>
		<div class="col-md-7">
			<ul>
				<li><a href="<?php echo site_url();?>">Home</a></li>
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


	<div id="slide" class="col-md-12">
		<div id="sayings">"weaweaweaea"</div>

	</div>

	<div class="col-md-3 col-md-offset-3">
		<h2 align="center" class="text-uppercase" style="font-family: Imprint MT Shadow";>
			<strong><u>List Of Goods</u></strong>
		</h2>
	</div>
	<div id="middle_content" class ="col-md-12">
		<div id="" class="col-md-9">
		 	<div id="content1" class="col-md-4">
		 		<div class="thumbnail">
			 		<img src="images/img.jpg" alt="...">
			 		<div class="caption">
			 			<h3><strong>Name of Product</strong></h3>
			 			<p class="text-uppercase">Location:</p>
						<p class="text-uppercase">Price: </p>
			 				<a href="<?php echo site_url('product');?>" type="button" class="btn btn-block btn-success">View</a>
			 		</div>
			 	</div>
		 	</div>
		 	<div id="content2" class="col-md-4">
				<div class="thumbnail">
			 		<img src="images/img.jpg" alt="...">
			 		<div class="caption">
			 			<h3><strong>Name of Product</strong></h3>
			 			<p class="text-uppercase">Location:</p>
						<p class="text-uppercase">Price: </p>
			 				<a href="<?php echo site_url('product');?>" type="button" class="btn btn-block btn-success">View</a>
			 		</div>
			 	</div>
		 	</div>
		 	<div id="content3" class="col-md-4">
				<div class="thumbnail">
			 		<img src="images/img.jpg" alt="...">
			 		<div class="caption">
			 			<h3><strong>Name of Product</strong></h3>
			 			<p class="text-uppercase">Location:</p>
						<p class="text-uppercase">Price: </p>
			 				<a href="<?php echo site_url('product');?>" type="button" class="btn btn-block btn-success">View</a>
			 		</div>
			 	</div>
		 	</div>
		</div>

		<div id="announcement" class="col-md-3">
			<!-- <div class="list-group-item success">
				<h4 class="list-group-item-heading" align="center">
					Announcements
				</h4>
			</div> -->
			<div class="list-group">
				<div id="announcement-header">
					<a href="#" class="list-group-item active list-group-item-success" >
						<h4 align="center" style="font-size:20px;">Announcements</h4>
					</a>
				</div>
				<a href="#" class="list-group-item">
					The Quick Brown Fox Jump Over The Lazy Dog
				</a>
				<a href="#" class="list-group-item">
					The Quick Brown Fox Jump Over The Lazy Dog
				</a>
				<a href="#" class="list-group-item">
					The Quick Brown Fox Jump Over The Lazy Dog
				</a>
				<a href="#" class="list-group-item">
					The Quick Brown Fox Jump Over The Lazy Dog
				</a>
				<a href="#" class="list-group-item">
					The Quick Brown Fox Jump Over The Lazy Dog
				</a>
				<a href="#" class="list-group-item">
					The Quick Brown Fox Jump Over The Lazy Dog
				</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function(){
		$('#myInput').focus()
	})
</script>
