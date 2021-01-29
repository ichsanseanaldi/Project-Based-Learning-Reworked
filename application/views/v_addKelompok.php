<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Kelompok</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url('css/guru.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>">
  </head>
  <body>
    <nav>
      <div class="nav-wrap">
        <div class="nav-brand">PJBL - Halaman Guru <i class="fa fa-briefcase"></i></div>
        <div class="links">
          <a href="<?php echo site_url('guru/logOut'); ?>">Logout <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="content">
      <div class="dirlink">
        /<a href="<?php echo site_url('guru'); ?>">DaftarProject</a>
        /<a href="<?php echo site_url('project'); ?>">DaftarFase</a>
        /<a href="<?php echo site_url('project/golistKelompok'); ?>">DaftarKelompok</a>
        /<a href="#">Buat Kelompok</a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project/golistKelompok'); ?>"><i class="fa fa-arrow-left" ></i> Back</a>
        </div>
        <div class="desc">
          <h3>Buat Kelompok</h3>
        </div>
        <div class="form-wrap">  
          <form action="<?php echo site_url('project/addKelompok'); ?>" enctype="multipart/form-data" method="post">
            <div class="input-group">
              <input type="text" name="username" placeholder="Username" required>
              <p><?php echo form_error('username');?></p>
            </div>
            <div class="input-group">
              <input type="text" name="password" placeholder="Password" required>
              <p><?php echo form_error('password');?></p>	
            </div>
            <div class="input-group">
              <input type="text" name="namaKelompok" placeholder="Nama Kelompok" required>
              <p><?php echo form_error('namaKelompok');?></p>	
            </div>
            <div class="input-group button">
              <button type="submit" name="submit">Simpan <i class="fa fa-save"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
