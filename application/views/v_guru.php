<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
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
    <div class="container light">
      <div class="content">
        <div class="dirlink">
        /<a href="#">DaftarProject</a>
        </div>
        <div class="desc">
          <table>
            <tr>
              <td><i class="fa fa-user"></i> Pengajar</td>
              <td>:</td>
              <td><?php echo $data->nama; ?></td>
            </tr>
            <tr>
              <td><i class="fa fa-info-circle"></i> Deskripsi</td>
              <td>:</td>
              <td><?php echo $data->deskripsi; ?></td>
            </tr>
          </table>
          <h3>Daftar Project</h3>
        </div>
        <table>
          <tr>
            <th>Nama Project</th>
            <th>Kelas</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
          <?php if (!$mew): ?>
            <tr>
              <td class="notext" colspan="4">Belum ada project</td>
            </tr>
          <?php else: ?>
          <?php foreach ($mew as $key):?>
            <tr>
              <td> <?php echo $key->nama_project ?> </td>
              <td> <?php echo $key->kelas ?> </td>
              <td> <?php echo $key->keterangan_project ?> </td>
              <td><a class="link warning" href='<?php echo site_url('guru/toProject/'.$key->id_project)?>'>Daftar Fase</td>
            </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </table>
        <div class="link-below-table">
          <a class="warning" href="<?php echo site_url('guru/addProject'); ?>">Tambah Project</a>
        </div>
      </div>
    </div>
  </body>
</html>
