<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Project</title>
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
          /<a href="<?php echo site_url('project'); ?>">Project-<?php echo $project->nama_project; ?></a>
          /<a href="<?php echo site_url('project'); ?>">DaftarFase</a>
          /<a href="#">EditProject</a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project'); ?>"><i class="fa fa-arrow-left" ></i> Back</a>
        </div>
        <div class="desc">
          <h3>Edit Project <i class="fa fa-plus-square-o"></i></h3>
        </div>
        <div class="form-wrap">
          <form class="" action="<?php echo site_url('project/updateProjectPross');?>" method="post">
            <div class="input-group">
              <input type="text" name="nama_project" value="<?php echo $project->nama_project ?>" required>
              <span>Nama Project</span>
              <p><?php echo form_error('nama_project');?></p>
            </div>
            <div class="input-group">
              <input type="text" name="kelas" value="<?php echo $project->kelas ?>" required>
              <span>Kelas</span>
              <p><?php echo form_error('kelas');?></p>
            </div>
            <div class="input-group">
              <textarea name="keterangan_project" rows="8" cols="80"  required><?php echo $project->keterangan_project ?></textarea>
              <span>Keterangan</span>
              <p><?php echo form_error('keterangan_project');?></p>
            </div>
            <div class="input-group button">
              <button type="submit" name="submit"><i class="fa fa-plus"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
