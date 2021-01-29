<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kelompok</title>
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
        /<a href="#">DaftarKelompok</a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project');?>"><i class="fa fa-arrow-left" ></i> Back</a>
        </div>
        <div class="desc">
          <h3>Daftar Kelompok <i class="fa fa-list-ul" ></i> </h3>
        </div>
        <table>
          <tr>
            <th>Nama Kelompok</th>
            <th>Aksi</th>
          </tr>
        <?php if (!$kelompok): ?>
          <tr>
            <td class="notext" colspan="2">Belum ada Kelompok</td>
          </tr>
        <?php else: ?>
        <?php foreach ($kelompok as $key): ?>
          <tr>
            <td><?php echo $key->nama_kelompok?></td>
            <td>
              <a class="link warning" href="<?php echo site_url('project/goaddAnggota/'.$key->id_kelompok);?>">Tambah Anggota <i class="fa fa-plus-circle"></i></a>
              <a class="link gray" href="<?php echo site_url('project/goseeKelompok/'.$key->id_kelompok);?>">Daftar Anggota <i class="fa fa-list-ul"></i></a>
              <a class="link red" href="<?php echo site_url('project/deleteKelompok/'.$key->id_kelompok);?>">Hapus Kelompok <i class="fa fa-trash"></i></a>
          </td>
          </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </table>
        <div class="link-below-table">
          <a class="warning" href="<?php echo site_url('project/goaddKelompok'); ?>">Tambah Kelompok</a>
        </div>
      </div>
    </div>
  </body>
</html>
