<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MasoodApp | Log in</title>
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
<!-- Theme style -->
<link href="<?php echo $includes_dir;?>dist/css/AdminLTE.min.css"
	rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="<?php echo $includes_dir;?>plugins/iCheck/square/blue.css"
	rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="../../index2.html"><b>Masood</b>App</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
				<?php echo form_open(current_url(), 'class="parallel"');?>  	
				<div class="form-group has-feedback">
					<input type="text" id="identity" name="login_identity"
						value="<?php echo set_value('login_identity', 'admin@admin.com');?>"
						class="tooltip_parent form-control" /> <span
						class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" id="password" name="login_password" class="form-control"
						value="<?php echo set_value('login_password', 'password123');?>" />
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-12">

						<button type="submit"
							class="btn btn-primary btn-block btn-flat form-control">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			<?php echo form_close();?>

		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery 2.1.3 -->
	<script
		src="<?php echo $includes_dir;?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo $includes_dir;?>bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	
</body>
</html>