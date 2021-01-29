<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tahap</title>
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
          /<a href="#">DetailFase-<?php echo $data->nama_tahap ?></span></a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project'); ?>"><i class="fa fa-arrow-left" ></i> Back </a>  
          <a class="red" href="<?php echo site_url('project/deleteTahap/'.$this->session->id_tahap); ?>"><i class="fa fa-trash"></i> Delete Fase </a>
          <a class="warning" href="<?php echo site_url('project/updateTahap/'.$this->session->id_tahap); ?>"><i class="fa fa-pencil"></i> Edit Fase  </a>
        </div>
        <div class="desc">
          <h3>Tahap <span><?php echo $data->nama_tahap ?></span></h3>
        </div>
        <table>
          <tr>
            <th style="width:20%;"><i class="fa fa-file-archive-o"></i> Materi</th>
            <td><a href="<?php echo base_url('upload/'.$data->materi) ?>"><?php echo $data->materi ?></a></td>
          </tr>
          <tr>
            <th style="width:20%;"><i class="fa fa-flag"></i> Tugas</th>
            <td><?php echo $data->tugas ?> </td>
          </tr>
          <tr>
            <th style="width:20%;"><i class="fa fa-info"></i> Keterangan </th>
            <td><?php echo $data->keterangan ?></td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>
