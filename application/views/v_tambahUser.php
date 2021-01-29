<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Tambah User</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url('css/admin.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>">
  </head>
  <body>
    <div class="head">
      <div class="head-wrap">
          <div class="nav-brand">
            <span>PJBL - Halaman Admin</span>
          </div>
          <div class="head-button-wrap">
            <a href="<?php echo site_url('admin/logOut'); ?>">Logout <i class="fa fa-sign-out"></i></a>
          </div>
        </div>
    </div>
    <div class="container">
      <div class="content">
        <h1>Tambah User</h1>
        <div class="form-wrap">
          <div class="button-back">
            <a class="warning" href="<?php echo site_url("admin"); ?>"><i class="fa fa-arrow-left" ></i> Back</a>
          </div>
          <form action="<?php echo site_url("admin/addUserProcces"); ?>" method="post">
            <div class="input-group">
              <div class="input-sub">
                <input type="text" name="username" placeholder="Username" required>
                <p><?php echo form_error('username');?></p>
              </div>
              <div class="input-sub">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <p><?php echo form_error('password');?></p>	
              </div>
              <div class="toggle-group">
                <input type="checkbox" name="checkbox" id="toggle" >
                <label for="toggle">Show Password</label>
              </div>
              <div class="akses">
                <label for="akses">Aksesibilitas</label>
                <select id="akses" name="akses">
                  <option value="Guru/User">Guru/User</option>
                </select>
              </div>
            </div>
            <div class="button-wrap">
              <button class="primary" type="submit" name="button">Tambah <i class="fa fa-plus"></i></button>
              <button type="reset" name="button">Reset <i class="fa fa-undo"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url('css/loginscript.js')?>"></script>
  </body>
</html>
