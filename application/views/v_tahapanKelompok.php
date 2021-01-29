<?php if($this->session->logged_in == 0){
  redirect('welcome/loginKelompok');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tahapan Kelompok</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url("css/kelompok.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>">
  </head>
  <body>
    <nav>
      <div class="nav-wrap">
        <div class="nav-brand">PJBL - Halaman Kelompok <i class="fa fa-graduation-cap"></i></div>
        <div class="nav-button">
          <a href="<?php echo site_url('kelompok/logOut') ?>">Logout <i class="fa fa-sign-out"></i></a>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="content">
        <div class="form-wrap">
          <div class="desc">
            <a href="<?php echo site_url('kelompok'); ?>"><i class="fa fa-arrow-left"></i> Back</a>
            <table>
              <tr>
                <th><i class="fa fa-flag-o"></i> Fase</th>
                <td><?php echo $tahap->nama_tahap; ?> </td>
              </tr>
              <tr>
                <th><i class="fa fa-info-circle"></i> Keterangan</th>
                <td><?php echo $tahap->keterangan; ?></td>
              </tr>
              <tr>
                <th><i class="fa fa-file-archive-o"></i> Materi</th>
                <td><a href="<?php echo base_url('/upload/'.$tahap->materi);?>"><?php echo $tahap->materi ?></a></td>
              </tr>
              <tr>
                <th><i class="fa fa-flag"></i> Tugas</th>
                <td><?php echo $tahap->tugas; ?></td>
              </tr>
            </table>
          </div>
          <form action="<?php echo site_url('kelompok/addJT')?>" enctype="multipart/form-data" method="post">
            <table>
              <tr>
                <th>Upload Jawaban <i class="fa fa-cloud-upload"></i> </th>
                <td><input type="file" name="file" required></td>
              </tr>
            </table>
            <div class="button-below">
              <button type="submit" name="button">Simpan <i class="fa fa-save"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
