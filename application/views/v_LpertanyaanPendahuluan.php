<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertanyaan Pendahuluan</title>
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
        /<a href="#">DaftarPertanyaanPendahuluan</a>
        </div>
      <div class="buttong">
        <a class="backs" href="<?php echo site_url('project'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                <td><?php echo $project->kelas; ?></td>
              </tr>
          </table>
          <h3>Daftar Pertanyaan Pendahuluan</h3>
        </div>
        <table>
          <tr>
            <th style="width:5%;">No</th>
            <th style="width:95%;">Soal</th>

          </tr>
          <?php $count=1; ?>
          <?php if ($data): ?>
            <?php foreach ($data as $key):?>
              <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $key->soal ?></td>
              </tr>
              <?php $count++; ?>
            <?php endforeach; ?>
          <?php else: ?>
              <tr>
                <td class="notext" colspan="3">Tidak Ada Soal</td>
              </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>
  </body>
</html>
