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



<!-- jQuery 2.0.2 -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

 <?php
	
	// echo json_encode($prototypes);
	?>        
        
        
            <script> 
    // using JQUERY's ready method to know when all dom elements are rendered
    $( document ).ready(function () {
      // set an on click on the button
      	function myFunction() {
//       	alert($("#proto_select").val());
      	var cat_id=$("#CategoryID").val();
      	var jsonString = <?php echo json_encode($batch); ?>;
		var temp=-1;
		var temp1=-1;
		var x = document.getElementById("Size");
		while (x.length > 0) {
		    x.remove(x.length-1);
		}
	      	for(var k in jsonString) {
// 		       console.log(jsonString[k].CategoryID);

				

			   temp=jsonString[k].CategoryID;		       
		       
		       if(temp===cat_id){

		    	    
		    	   var option = document.createElement("option");
					option.text = jsonString[k].Size;
					option.value= jsonString[k].Size;
					
					x.add(option);
			    }	   
	      	}
	
	      	
	        
		}

      	myFunction();

      	$("#CategoryID").on( 'change', function () {
       	 myFunction(); 
         });
    });
	
    </script>
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
				<h1>Medicines Master</h1>

			</section>

			<!-- Main content -->
			<?php //var_dump($batch);?>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Batch Price Update</h3>
							</div>
							<!-- /.box-header -->

							<?php
							$this->db->select ( 'Category,CategoryID' )->from ( 'MedMaster' )->distinct ();
							$categories = $this->db->get ()->result ();
							
							?>
							
							<div class="box-body">
							<form name="marketing_celebrity" id="marketing_celebrity"
												method="post"
												action="<?php echo base_url('auth_admin/batch_update_execute'); ?>">
								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Category</th>
											<th>Packing Size</th>
											<th>Price</th>
											<th>Update</th>





										</tr>
									</thead>
									<tbody>
											
									
										<tr>
											
											
											<td><select id="CategoryID" name="CategoryID">
											<?php  foreach ($categories as $m){?>
											<option value="<?php echo $m->CategoryID;?>"><?php echo $m->Category;?></option>
											<?php }?>
											</select></td>
											<td><select id="Size" name="Size">

											</select></td>
											<td><input type="text" class="form-control" name="price"
												id="price"></td>
											<td><button class="btn btn-primary form-control"
													onclick="return confirm('Are you sure you would like to batch update the prices for this category and size?');">Process
													Query</button></td>
									
											
										</tr>
												
									</tbody>
									<tfoot>

									</tfoot>
								</table>
								</form>
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
	<script
		src="<?php echo $includes_dir;?>plugins/datatables/jquery.dataTables.js"
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
					var t=$('#example2').dataTable();
					$(".dataTables_filter").hide();
					$(".dataTables_length").hide();
					$(".dataTables_info").hide();
					$(".dataTables_paginate").hide();	        
	        		var url = "/cost/med/";
					var result;
//					alert(url);
//	        		$.get(url, function (result) {
//					  var counter=1;
//					  var arr=JSON.parse(result);
//	  	              for(var i=0;i<arr.length;i++){
//	                    var obj = arr[i];
	                    
	                    

// 	                         t.row.add( [
// 	                                     obj['MedID'],
// 	                                     obj['Name'],
// 	                                     obj['Category'],
// 	                                     obj['Size'],
// 	                                     obj['Price']
// 	                                 ] ).draw(); 
	                        
	                    
//	                }
	             	


	        		//});

					
	        				
	    			
	    });

	    
		




	</script>




</body>
</html>
