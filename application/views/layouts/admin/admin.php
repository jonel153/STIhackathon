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
		#background_pic{
			border: 1px solid black;
			height: 250px;
			background-image: url("<?php echo base_url();?>images/main.jpg");
			background-size: cover;
		}

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
					<li><a href="<?php echo base_url();?>admin/logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	</div>


	<div id="background_pic">
		<ul>
			<li><a href=""><img src="<?php echo base_url();?>images/farmers.png" width="30" height="30">Farmers</a></li>
			<li><a href=""><img src="<?php echo base_url();?>images/investor.png" width="30" height="30">Investors</a></li>
			<li><a href=""><img src="<?php echo base_url();?>images/maintenance.png" width="30" height="30">Maintainance</li>
		</ul>
	</div>

	<div class="col-md-10">
		<div class="table-responsive">
		    <table id="table_member" class="table table-hover table table-striped">
		        <thead>
		            <tr>
		                <th>Farmers name</th>
		                <th>Address</th>
		                <th>Loan amount</th>
		                <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        

		        <?php
		        		foreach ($get_loan as $row) {
							$userid = $row->id;
							$loan_id = $row->loan_id;
							$address = $row->address;
							$name = $row->last_name . ' ,' . $row->first_name;
							$amount = $row->amount;
							echo 	'<tr>
										<td>' . $name . '</td>
							        	<td>' . $address . '</td>
							        	<td> &#8369; ' . number_format($amount) . '</td>
							        	<td><a href="' . base_url() . 'admin/accept/' . $loan_id . '/' . $amount . '/' . $userid . '" class="btn btn-success btn-sm">Accept</a> <a href="' . base_url() . 'admin/decline/' . $loan_id . '" class="btn btn-danger btn-sm">Decline</a></td>
						        	</tr>';
						}
		        	?>

		        <?php
		        	/*foreach ($rent->result() as $row) {
						$transactionID = $row->transactionID;
						$name = $row->fname . ' ' . $row->lname;
						$delivery_date=  $row->transaction_delivery_date;
						echo'<tr>
				                <td>' . $transactionID . '</td>
				                <td>' . $name . '</td>
				                <td>' . $delivery_date . '</td>
				                <td><a href="' .base_url() .'transaction/view_order/'. $transactionID .'" class="btn btn-success btn-xs">View Order</a></td>
				            </tr>';
					}*/
				?>
		        </tbody>
		    </table>
	</div>

	<div class="col-md-2">
		
	</div>
</div>

</body>
</html>