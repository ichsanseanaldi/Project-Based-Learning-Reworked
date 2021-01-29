<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permulaan</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url('css/guru.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>">
  </head>
  <body>
    <nav>
      <div class="nav-wrap">
        <div class="nav-brand">PJBL - Halaman Guru  <i class="fa fa-briefcase"></i></div>
        <div class="links">
          <a href="<?php echo site_url('guru/logOut'); ?>">Logout <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="desc">
        <h3>Permulaan</h3>
      </div>
      <div class="form-wrap">
        <form action="<?php echo site_url('guru/updateStart'); ?>" method="post">
          <input type="hidden" name="id_user" value="<?php echo $this->session->user_id;?>">
          <div class="input-group">
            <input type="text" name="nama" placeholder="Nama" required>
            <p><?php echo form_error('nama');?></p>
          </div>
          <div class="input-group">
            <textarea name="deskripsi" rows="8" cols="80" placeholder="Deskripsi Tambahan" required></textarea >
            <p><?php echo form_error('deskripsi');?></p>
          </div>
          <div class="input-group button">
            <button type="submit" name="submit">Simpan <i class="fa fa-save"></i></button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
