<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Tahap</title>
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
          /<a href="<?php echo site_url('project/goTahap/'.$this->session->id_tahap); ?>">DetailFase</a>
          /<a href="#">EditFase-<?php echo $tahap->nama_tahap ?></span></a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project/goTahap/'.$this->session->id_tahap); ?>"><i class="fa fa-arrow-left" ></i> Back</a>
        </div>
        <div class="desc">
          <h3>Update Tahap</h3>
        </div>
        <div class="form-wrap">
          <form action="<?php echo site_url('project/updateTpross'); ?>" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id_user" value="<?php echo $this->session->user_id;?>">
            <div class="input-group">
              <input type="text" name="nama_tahap" placeholder="Nama Tahap" value="<?php echo $tahap->nama_tahap; ?>" required>
              <p><?php echo form_error('nama_tahap');?></p>
            </div>
            <div class="input-group">
              <span class="custom-span">Upload Materi <i class="fa fa-upload"></i></span>
              <input type="file" name="file">
               <p style="color:red">* kosongkan jika tidak di update</p>
            </div>
            <div class="input-group">
              <textarea name="tugas" rows="8" cols="80" placeholder="Tugas" required><?php echo $tahap->tugas;?></textarea>
              <p><?php echo form_error('tugas');?></p>
            </div>
            <div class="input-group">
              <textarea name="deskripsi" rows="8" cols="80" placeholder="Deskripsi Tambahan" required><?php echo $tahap->keterangan;?></textarea>
              <p><?php echo form_error('deskripsi');?></p>
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
