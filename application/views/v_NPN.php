<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jawaban Kelompok</title>
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
        /<a href="<?php echo site_url('pertanyaanPendahuluan/goNilai') ?>">PenilaianPertanyaanPendahuluan</a>
        /<a href="#">Penilaian</a>
      </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('pertanyaanPendahuluan/goNilai') ?>"><i class="fa fa-arrow-left" ></i> Back</a>
        </div>
        <div class="desc">
          <h3>Kelompok <span><?php echo $rejoice[0]->nama_kelompok; ?></span></h3>
        </div>
        <table>
        <tr>
          <th style="width:10%">No</th>
          <th>Soal</th>
          <th>Jawaban</th>
        </tr>
        <?php $count=1; ?>
        <?php foreach ($rejoice as $key): ?>
        <tr>
          <td><?php echo $count ?></td>
          <td><?php echo $key->soal ?></td>
          <td><?php echo $key->jawaban ?> </td>
        </tr>
        <?php $count++; ?>
        <?php endforeach; ?>
        </table>
        <div class="penilaian">
          <form class="" action="<?php echo site_url('pertanyaanPendahuluan/nilaiPP/'.$rejoice[0]->id_kelompok) ?>" method="post">
            <p>Nilai : </p>
            <select name="nilai" >
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
            </select>
            <button type="submit" name="button">Nilai</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
