<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Tahap</title>
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
    <div class="container light">
      <div class="content">
        <div class="dirlink">
        /<a href="<?php echo site_url('guru'); ?>">DaftarProject</a>
        /<a href="#">Project-<?php echo $project->nama_project; ?></a>
        /<a href="#">DaftarFase</a>
        </div>
        <div class="buttong">
              <a class="backs" href='<?php echo site_url('guru')?>'><i class="fa fa-arrow-left"></i> Back </a>
              <a class="red" href='<?php echo site_url('project/deleteProject/'.$this->session->id_project)?>'><i class="fa fa-trash"></i> Delete Project </a>
              <a class="warning" href='<?php echo site_url('project/updateProject/')?>'><i class="fa fa-pencil"></i> Edit Project </a>
        </div>
        <div class="desc">
          <table>
            <tr>
              <td><i class="fa fa-code"></i> Project</td>
              <td>:</td>
              <td><?php echo $project->nama_project; ?></td>
            </tr>
            <tr>
              <td><i class="fa fa-graduation-cap"></i> Kelas</td>
              <td>:</td>
              <td><?php echo $project->kelas ?></td>
            </tr>
          </table>
          <a href="<?php echo site_url('project/golistKelompok');?>">Daftar Kelompok <i class="fa fa-address-book"></i></a>
          <h3>Daftar Fase <i class="fa fa-tasks"></i></h3>
        </div>
        <table>
          <tr>
            <th>Nama Fase</th>
            <th>Aksi</th>
          </tr>
          <tr>
            <td>Pertanyaan Pendahuluan</td>
            <td>
              <a class="link green" href="<?php echo site_url('pertanyaanPendahuluan/justSEE') ?>"><i class="fa fa-eye"></i> Lihat</a>
              <a class="link warning" href="<?php echo site_url('pertanyaanPendahuluan/goNilai') ?>"><i class="fa fa-star "></i> Nilai</a>
            </td>
          </tr>
          <?php foreach ($data as $key): ?>
          <tr>
            <td><?php echo $key->nama_tahap ?></td>
            <td>
              <a class="link green" href="<?php echo site_url('project/goTahap/'.$key->id_tahap);?>"><i class="fa fa-eye "></i> Lihat</a>
              <a class="link warning" href="<?php echo site_url('project/goNilai/'.$key->id_tahap);?>"><i class="fa fa-star "></i> Nilai</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
        <div class="link-below-table">
          <a class="warning" href="<?php echo site_url('project/addTahap');?>"><i class="fa fa-plus"></i></a>
        </div>
      </div>
    </div>
  </body>
</html>
