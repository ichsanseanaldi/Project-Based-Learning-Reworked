<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penilaian Pertanyaan Pendahuluan</title>
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
      <div class="content">
      <div class="dirlink">
        /<a href="<?php echo site_url('guru'); ?>">DaftarProject</a>
        /<a href="<?php echo site_url('project'); ?>">DaftarFase</a>
        /<a href="#">PenilaianPertanyaanPendahuluan</a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project');?>"><i class="fa fa-arrow-left" ></i> Back</a>
        </div>
        <div class="desc">
          <table>
            <tr>
              <td><i class="fa fa-code"></i> Project</td>
              <td>:</td>
              <td><?php echo $project->nama_project; ?></td>
            </tr>
            <tr>
              <td><i class="fa fa-info"></i> Keterangan</td>
              <td>:</td>
              <td>Penilaian Pertanyaan Pendahuluan</td>
            </tr>
            <tr>
          </table>
          <h5 style="color:red;font-weight:200;text-transform:uppercase;text-align:center;margin:3rem auto 1rem;">* Aksi Lihat Tidak Bisa Masuk = Kelompok Belum Menjawab *</h5>
          <h3>Daftar Kelompok <i class="fa fa-list"></i></h3>
        </div>
        <table>
        <tr>
          <th>Nama Kelompok</th>
          <th>Aksi</th>
        </tr>
        <?php if (!$kelompok): ?>
            <tr>
              <td class="notext" colspan="2">Belum ada kelompok</td>
            </tr>
          <?php else: ?>
          <?php foreach ($kelompok as $key): ?>
            <tr>
              <td> <?php echo $key->nama_kelompok?> </td>
              <?php if ($key->nilai_PP): ?>
                <td>Nilai = <?php echo $key->nilai_PP?></td>
              <?php else: ?>
                <td> <a class="link warning" href="<?php echo site_url('pertanyaanPendahuluan/goKN/'.$key->id_kelompok)?>">Lihat <i class="fa fa-list-ul"></i></a></td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </table>
      </div>
    </div>
  </body>
</html>
