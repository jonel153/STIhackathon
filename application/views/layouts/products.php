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
			height: 35px;
			z-index: 1;
		}

		#nav #login{
			list-style: none;
		}

		#nav li {
			font-size: 15px;
			display: inline;

		}

		#nav #login li a{
			text-decoration: none;
			color: white;
			margin-left: 35px;
			line-height: 35px;
		}

		#nav #login li a:hover{
			padding-top: 20px;
			padding-bottom: 10px;
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
		#myModal1{
			z-index: 5;
		}
		#div_name{
			margin-top: 5px;
			margin-left: -60px;
		}
	</style>
</head>
<body>

<div id="main_container">
	<div id="nav" class="col-md-12">
		<div class="col-md-4"></div>
		<?php
			if($status == '1'){
				echo '<div class="col-md-5">';
			}else{
				echo '<div class="col-md-7">';
			}
			
		?>
		
			<ul id="login">
				<li><a href="<?php echo site_url();?>">Home</a></li>
				<li><a href="">About us</a></li>
				<li><a href="">User Guide</a></li>
				<li><a href="<?php base_url();?>main/product">Products</a></li>
				<?php
					if($status == '1'){
				?>
			</ul>
		</div>
		<div id="div_name" class="col-md-3">
					<ul id="name">

						<li class="dropdown">
							<a id="username" href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $name;?><span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url();?>main/logout">Logout</a></li>
							</ul>
						</li>
					</ul>
		</div>
				<?php		
					}

					elseif($status == '0'){
				?>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Registration <span class="caret"></span>
							</a>
						</li>

						<li><a href="#" data-toggle="modal" data-target="#myModal1">Sign in</a></li>

				<!-- Modal for Sign In -->
			
				</ul>	
				<?php
					}
				?>
				
				
			
		</div>
	</div>


	<!-- <div id="slide" class="col-md-12">
		<div id="sayings">"weaweaweaea"</div>

	</div> -->
	<br/><br/><br/>
	<div class="col-md-3 col-md-offset-3">
	</div>
	<div id="middle_content" class ="col-md-12">
		<div id="" class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p align="left">
						<label>List of Goods</label>	
					</p>
				</div>
				<div class="panel-body">
				 	
			 		<?php
			 			foreach ($product as $row) {
							$id = $row->id;
							$type = $row->type;
							$unit = $row->unit;
							$price = $row->price;
							$quantity = $row->quantity;
							$total = $row->total;
							$image= $row->images;		
			 		?>
			 			<div id="content2" class="col-md-4">
							<div class="thumbnail">
						 		<img width="300px" height="200px" src="<?php echo base_url(). $image;?>" alt="...">
						 		<div class="caption">
						 			Types:<?php echo $type;?><br>
						 			Location:<br>
						 			Price:<?php echo $price;?>
									
						 			<a href="<?php echo base_url() . 'main/product_details/'.$id;?>" type="button" class="btn btn-block btn-success">View</a>
						 		</div>
						 	</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>		
		</div>

		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p align="center" class="text-uppercase" style="font-family: Imprint MT Shadow";>
						filter
					</p>
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<div class="form-group">
							<div class="checkbox">
								<input type="checkbox">Rice
							</div>
						</div>
						<div>
							<div class="checkbox">
								<input type="checkbox">Tomato
							</div>
						</div>
							<div class="checkbox">
								<input type="checkbox">Banana
							</div>
						</div>
					<form class="navbar-form navbar-left" role="search">
				        <div class="form-group">
				          <input class="form-control" placeholder="Search" type="text">
				        </div>
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
