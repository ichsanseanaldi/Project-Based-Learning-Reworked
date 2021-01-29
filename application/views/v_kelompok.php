<?php if($this->session->logged_in == 0){
  redirect('welcome/loginKelompok');
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
    <link rel="stylesheet" href="<?php echo base_url("css/kelompok.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>">
  </head>
  <body>
    <nav>
      <div class="nav-wrap">
          <div class="nav-brand">
           PJBL - Halaman Kelompok <i class="fa fa-graduation-cap"></i>
          </div>
          <div class="nav-button">
            <a href="<?php echo site_url('kelompok/logOut') ?>">Logout <i class="fa fa-sign-out"></i></a>
          </div>
      </div>
    </nav>
    <div class="container">
      <div class="content">
        <div class="heading">
          <h2>Detail <i class="fa fa-id-card-o"></i></h2>
        </div>
        <div class="desc">
          <table>
            <tr>
              <th><i class="fa fa-code"></i> Nama Project</th>
              <td><?php echo $project->nama_project; ?></td>
            </tr>
            <tr>
              <th><i class="fa fa-user-o"></i> Nama Kelompok</th>
              <td><?php echo $kelompok->nama_kelompok ?></td>
            </tr>
          </table>
          <table>
            <tr>
              <th>Anggota Kelompok <i class="fa fa-users"></i></th>
            </tr>
            <?php foreach ($anggota as $key): ?>
            <tr>
              <td>
                <?php echo $key->nama_anggota; ?>
              </td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
        <div class="heading">
          <h2>Daftar Fase <i class="fa fa-list"></i></h2>
        </div>
        <div class="table-wrap">
          <table>
            <tr>
              <th>No</th>
              <th>Nama Fase <i class="fa fa-flag-o"></i></th>
              <th>Aksi</th>
              <th>Nilai</th>
            </tr>
            <tr>
              <td>1</td>
              <td>Pertanyaan Pendahuluan</td>
              <?php if ($kelompok->is_PP == 'yes'): ?>
                <td><i class="fa fa-check"></i></td>
                <td><?php echo $kelompok->nilai_PP; ?></td>
              <?php else: ?>
                <td><a href="<?php echo site_url('kelompok/goPP') ?>">Jawab</a></td>
                <td>-</td>
              <?php endif; ?>
            </tr>
            <?php $count = 2;?>
            <?php foreach ($tahap as $key): ?>
              <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $key->nama_tahap; ?></td>
                <?php if ($key->selesai == 'yes'): ?>
                  <td><i class="fa fa-check"></i></td>
                  <td><?php echo $key->nilai; ?></td>
                <?php else: ?>
                  <td><a href="<?php echo site_url('kelompok/goTahap/'.$key->id_tahap);?>">Buka</a></td>
                  <td>-</td>
                <?php endif; ?>
              </tr>
              <?php $count++;?>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
