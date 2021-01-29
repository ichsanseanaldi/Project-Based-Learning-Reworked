<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Edit User</title>
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
        <h1>Edit User <i class="fa fa-edit"></i></h1>
        <div class="form-wrap">
        <div class="button-back">
            <a class="warning" href="<?php echo site_url("admin"); ?>"><i class="fa fa-arrow-left" ></i> Back</a>
          </div>
          <form class="" action="<?php echo site_url("admin/updateProcess"); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $data->id_user;?>">
            <div class="input-group">
              <div class="input-sub">
                <input type="text" name="username" value="<?php echo $data->username;?>" required>
                <p><?php echo form_error('username');?></p>
              </div>
              <div class="input-sub">
                <input type="text" id="password" name="password" value="<?php echo $data->password; ?>" required>
                <p><?php echo form_error('password');?></p>	
              </div>
              <div class="toggle-group">
                <input type="checkbox" name="checkbox" id="toggle" >
                <label for="toggle" >Show Password</label>
              </div>
              <div class="akses">
                <label for="akses">Aksesibilitas</label>
                <select id="akses" name="akses" disabled>
                  <option value="user" <?php if($data->akses == 'user'){echo "selected";} ?>>Guru/User</option>
                </select> 
              </div>
            </div>
            <div class="button-wrap">
              <button class="primary" type="submit" name="button">Simpan <i class="fa fa-save"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url('css/loginscript.js')?>"></script>
  </body>
</html>
