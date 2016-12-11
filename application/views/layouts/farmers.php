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
		
		#admin_name{
			list-style: none;
			margin-top: -40px;
		}
		
		#admin_name li {
			display: inline;
		}

		#admin ul li a{
			text-decoration: none;
		}
		#loan_btn{
			margin-left: 200px;
			width: 80px;
		}
		#registration label{
			font-size: 10px;
		}

		#registration input{
			width: 200px;
		}
		#registration select{
			width: 200px;
		}
	</style>
</head>

<body>

<div id="admin" class="col-md-12">
	<div id="header" class="col-md-12">
	<div class="col-md-10">
		<img src="<?php echo base_url();?>images/logo.png" width="40" height="40">
	</div>

	<div class="col-md-2">
		<img src="<?php echo base_url();?>images/member.png"  width="30" height="30">
		<ul id="admin_name">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php echo $name;?><span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url();?>main/logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	</div>


	<div id="background_pic">
		
	</div>
	<div class="col-md-9">

		<div class="row">
			<div class="col-md-10"></div>
			<div class="col-md-2">
			<br>
				<a href="" data-toggle="modal" data-target="#loginModal" class="btn btn-success">Post crops</a>
			</div>


			<div id="loginModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

			    <!-- Modal content-->

					<div class="modal-content">
			      		<div class="modal-header">
			        		<button type="button" class="close" data-dismiss="modal">&times;</button>
			        		<h4 class="modal-title">Product</h4>
			     		 </div>

			     		 <div class="modal-body">
				     		 <?php
								$login=(isset($_GET['error'])) ? (int)$_GET['error']:0;								
							?>
			      			<form id="registration" enctype="multipart/form-data" method="POST" class="form-horizontal" action="<?php echo base_url();?>main/post_product">
			      				<input type="hidden" value="<?php echo $id;?>" name="farmers_id">
								<div class="form-group">
									<label class="col-md-2 control-label" for="email">Type</label>
									<div class="col-md-8">

										<select class="form-control" name="type">
											<?php
												foreach ($type as $row) {
													$id = $row->id;
													$farm_type = $row->farm_type;
													echo '<option value="' . $farm_type . '">' . $farm_type . '</option>';
												}
											?>
											
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label" for="">Unit</label>
									<div class="col-md-8">
										<select class="form-control" name="unit">
											<option value="">Choose....</option>
											<option value="sack">Sack</option>
											<option value="pieces">Piece/s</option>
											<option value="kilo">Kilo</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="password">Price</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="price" placeholder="Price" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label" for="password">Quantity</label>
									<div class="col-md-10">
										<input type="type" class="form-control" name="quantity" placeholder="Quantity" />
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label" for="password">Picture</label>
									<div class="col-md-10">
										<input type="file" id="displaypic" name="displaypic">
									</div>
								</div>

								<div class="form-group">
									
									<div class="col-md-6 col-md-offset-6">
										<button type="submit" class="btn btn-success">Post</button>
									</div>
								</div>
							</form>	
			      		</div> 
			    	</div>
				</div>
			</div>


		</div>
		<div class="table-responsive">
		    <table id="table_member" class="table table-hover table table-striped">
		        <thead>
		            <tr>
		                <th>Product Type</th>
		                <th>Unit</th>
		                <th>Price</th>
		                <th>Quantity</th>
		                <th>Total</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php
		        		foreach ($get_product as $row) {
							$id = $row->id;
							$type = $row->type;
							$unit = $row->unit;
							$price = $row->price;
							$quantity = $row->quantity;
							$total = $row->total;
						
							echo 	'<tr>
						        		<td>' . $type . '</td>
						        		<td>' . $unit . '</td>
						        		<td> &#8369; ' . number_format($price) . '</td>
						        		<td>' . $quantity . '</td>
						        		<td> &#8369; ' . number_format($total) . '</td>
						        	</tr>';
						}
		        	?>
			        

			       
		    	</tbody>
	    	</table>
		</div>
	</div>
	<br><br><br>
	<div id="announcement" class="col-md-3">
		<!-- <div class="list-group-item success">
			<h4 class="list-group-item-heading" align="center">
				Announcements
			</h4>
		</div> -->
		<br>
			
			<?php
				echo $ids;
				if($status == '1'){
					
				?>
					<div class="list-group">
						<div id="announcement-header">
							<a href="#" class="list-group-item active list-group-item-success">
								<h4 align="center" style="font-size:15px;">Request loan</h4>
							</a>
							<form action="<?php echo base_url();?>main/request_loan" method="POST"><br />
								<input type="hidden" value="<?php echo $ids;?>" name="farmers_id">
								Amount: <input type="text" name="loan" class="form-control"><br>
								<input id="loan_btn" type="submit" value="Request" class="form-control btn btn-info">
							</form>
						</div>
					</div>
				<?php	
				}else{
					foreach ($check_loan as $row) {
					$farmers_id = $row->farmers_id;
					$amount = $row->amount;
					$status = $row->status;

					echo  	'<div class="list-group">
								<div id="announcement-header">
									<a href="#" class="list-group-item active list-group-item-success">
										<h4 align="center" style="font-size:15px;">Request loan</h4>
									</a><br>
										<label>Amount: &#8369;' . number_format($amount) . '</label><br>
										<label>Status: ' . $status . '</label>
								</div>
							</div>';
			?>
					
			
			
		

					
			<?php
				}
			}
			?>
	</div>
</div>

</body>
</html>