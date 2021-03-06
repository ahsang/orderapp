<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MasoodApp |Admin Panel</title>
<meta
	content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'
	name='viewport'>
<!-- Bootstrap 3.3.2 -->
<link href="<?php echo $includes_dir;?>bootstrap/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
	rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link
	href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css"
	rel="stylesheet" type="text/css" />
<!-- DATA TABLES -->
<link
	href="<?php echo $includes_dir;?>plugins/datatables/dataTables.bootstrap.css"
	rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo $includes_dir;?>dist/css/AdminLTE.min.css"
	rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
<link
	href="<?php echo $includes_dir;?>dist/css/skins/_all-skins.min.css"
	rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-red">
	<div class="wrapper">

		<header class="main-header">
			<a href="../../index2.html" class="logo"><b>Masood</b>App</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas"
					role="button"> <span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
				</a>
				<div class="navbar-custom-menu"></div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo $includes_dir;?>dist/img/user2-160x160.jpg"
							class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p>Administrator</p>

						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control"
							placeholder="Search..." /> <span class="input-group-btn">
							<button type='submit' name='seach' id='search-btn'
								class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<?php $this->load->view('demo/admin_examples/nav');?>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Right side column. Contains the navbar and content of the page -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">

			</section>
			<?php
				foreach ($package as $pk){
					$price[$pk->MedID]=$pk->Price;

				}

				foreach ($medicines as $med){
					$meds[$med->MedID]=$med->Name;

				}




			?>
			
			
			<!-- Main content -->
			<?php //var_dump($medicines);?>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h2 class="box-title"><?php echo " OrderID ".$this->uri->segment(3)." Details"?></h2>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<!-- <h3 class="box-title"><?php echo "Category :".$med_cat?></h3> -->
								<br>

							</div>
							<?php// var_dump($medicine_details);?>							<!-- /.box-header -->
							<div class="box-body">
								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Med Name</th>
											<th>Quantity</th>
											<th>Size</th>
											<th>Price</th>
											<!-- <th>Delete</th> -->


										</tr>
									</thead>
									<tbody>
										<?php foreach ($order_details as $od){?>
										
										<tr>

											<td><?php echo $meds[$od->MedID];?></td>
											<td><?php echo $od->Quantity;?></td>
											<td><?php echo $od->Size;?></td>
											<td><?php echo $price[$od->MedID];?></td>
											
											<!-- <td></td> -->
										</tr>
										<?php }?>
										
										
										
									</tbody>

								</table>
								
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">AG</div>
			<strong>Copyright &copy; 2014-2015 ThreeCode. </strong> All rights
			reserved.
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.1.3 -->
	<script
		src="<?php echo $includes_dir;?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo $includes_dir;?>bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<!-- DATA TABES SCRIPT -->
	<script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"
		type="text/javascript"></script>


	<script
		src="<?php echo $includes_dir;?>plugins/datatables/dataTables.bootstrap.js"
		type="text/javascript"></script>
	<!-- SlimScroll -->
	<script
		src="<?php echo $includes_dir;?>plugins/slimScroll/jquery.slimscroll.min.js"
		type="text/javascript"></script>
	<!-- FastClick -->
	<script
		src='<?php echo $includes_dir;?>plugins/fastclick/fastclick.min.js'></script>
	<!-- AdminLTE App -->
	<script src="<?php echo $includes_dir;?>dist/js/app.min.js"
		type="text/javascript"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo $includes_dir;?>dist/js/demo.js"
		type="text/javascript"></script>
	<!-- page script -->

	<script>



	$( document ).ready(function () {
	      // set an on click on the button
					var t=$('#example2').DataTable();
						        
	        		var url = "/cost/med/";
					var result;
					var temp="-";
	             	


					
		
					
	    			
	    });

	    
		




	</script>




</body>
</html>
