<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelompok</title>
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
        /<a href="#">DaftarAnggota</a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project/golistKelompok'); ?>"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="desc">
          <h3>Kelompok <span><?php echo $kelompok->nama_kelompok?></span> <i class="fa fa-users"></i> </h3>
        </div>
        <table>
        <tr>
          <th>Anggota</th>
        </tr>
        <?php if (!$anggota): ?>
            <tr>
              <td class="notext" >Belum ada Anggota</td>
            </tr>
          <?php else: ?>
        <?php foreach ($anggota as $key): ?>
        <tr>
          <td><?php echo $key->nama_anggota; ?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </table>
      </div>
    </div>
    <script src="<?php echo base_url('css/loginscript.js')?>"></script>
  </body>
</html>
