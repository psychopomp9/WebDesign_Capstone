<!DOCTYPE html>
<html>


<!-- Mirrored from radixtouch.in/templates/admin/redstar/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 12:54:34 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Dentshine</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="<?= ASSETS_PATH?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?= ASSETS_PATH?>assets/bundles/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="<?= ASSETS_PATH?>assets/bundles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?= ASSETS_PATH?>css/extra_pages.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?= ASSETS_PATH?>img/icon.png" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">

				<form  method="post" class="login100-form validate-form" action="<?php echo base_url();?>Clinic_controller/user_auth">

					<span class="login100-form-logo">
						<img alt="" src="<?= ASSETS_PATH?>img/pngtree.jpg">
					</span>
					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="user_email" placeholder="Username">
						<span class="" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="user_password" placeholder="Password">
						<span class="" data-placeholder="&#xf191;"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-30">
						<a class="txt1" href="<?php echo base_url();?>Clinic_controller/forgetpassword">
							Forgot Password?
						</a>
					</div>
			<?php  if(isset($invalid))
			{
                if($invalid!=null){ ?>
                  <div class=""> <span style="color:#FF0000;"><b>*<?php echo $invalid; ?></b></span>
                 </div>

            <?php } } ?>
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="<?= ASSETS_PATH?>assets/bundles/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?= ASSETS_PATH?>assets/bundles/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= ASSETS_PATH?>assets/data/login-data.js"></script>
	<!-- end js include path -->
</body>


<!-- Mirrored from radixtouch.in/templates/admin/redstar/source/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 12:54:34 GMT -->
</html>