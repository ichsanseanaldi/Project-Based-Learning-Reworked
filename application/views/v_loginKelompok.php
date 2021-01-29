<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login Siswa</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;800&display=swap" rel="stylesheet"> 	
		<link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('css/loginstyle.css')?>">
	</head>
	<body>
		<div class="container">
			<div class="content-wrap flex flex-center ">
				<div class="img-wrap" style="order:2;">
					<img src="<?php echo base_url('css/img/siswa.png')?>">
				</div>
				<div class="login-wrap" style="order:1;">
					<h1>Portal Siswa</h1>
					<div class="form-wrap">
						<form action="<?php echo site_url('Welcome/loginKelompokP'); ?>" method="post">
							<div class="input-wrap">
								<input class="text-input" type="text" name="username" placeholder="Username" required>
								<p><?php echo form_error('username');?></p>
							</div>
							<div class="input-wrap">
								<input class="text-input" type="password" name="password" id="password" placeholder="Password" required> 
								<p><?php echo form_error('password');?></p>	
								
							</div>
							<div class="togglers">
								<input type="checkbox" name="checkbox" id="toggle">
								<span><label for="toggle" >Show Password</label></span>
							</div>
							<button class="submit-button" type="submit" name="submit">Login <i class="fa fa-sign-in"></i></button>
						</form>
						<div class="error-msg" >			
							<?php echo $this->session->tempdata('error');?>
						</div>	
					</div>
					<div class="divider">atau</div>
					<div class="link-to">
						<a href="<?php echo site_url('Welcome') ?>">Login Guru</a>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('css/loginscript.js')?>"></script>
	</body>
</html>
