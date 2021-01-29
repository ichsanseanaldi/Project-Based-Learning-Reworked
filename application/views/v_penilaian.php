<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penilaian</title>
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
          /<a href="#">JawabanTugasFase-<?php echo $tahap->nama_tahap; ?> </a>
        </div>
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project'); ?>"><i class="fa fa-arrow-left "></i> Back</a>
        </div>
        <div class="desc">
          <table>
            <tr>
              <td><i class="fa fa-code"></i> Project</td>
              <td>:</td>
              <td><?php echo $project->nama_project; ?></td>
            </tr>
            <tr>
              <td><i class="fa fa-flag-o"></i> Fase</td>
              <td>:</td>
              <td><?php echo $tahap->nama_tahap; ?></td>
            </tr>
          </table>
          <h3>Jawaban Tugas <i class="fa fa-percent"></i></h3>
        </div>
        <table>
          <tr>
            <th>Kelompok</th>
            <th>Tugas</th>
            <th>Jawaban</th>
            <th>NILAI</th>
          </tr>
          <?php if (!$rejoice): ?>
            <tr>
              <td class="notext" colspan="4">Belum ada kelompok</td>
            </tr>
          <?php else: ?>
            <?php foreach ($rejoice as $key): ?>
              <tr>
                <td><?php echo $key->nama_kelompok ?></td>
                <td><?php echo $key->tugas ?></td>
                <td><a href="<?php echo base_url('upload/'.$key->jawaban); ?>"><?php echo $key->jawaban?></a></td>
                <td>
                  <?php if ($key->nilai): ?>
                    <?php echo $key->nilai ?>
                  <?php else: ?>
                    <form class="" action="<?php echo site_url('penilaian/Nilai'); ?>" method="post">
                      <input type="hidden" name="id_kelompok" value="<?php echo $key->id_kelompok?>">
                      <select name="nilai" class="select-dalam-table" >
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                      </select>
                      <button class="dalam-table"type="submit" name="button">Nilai</button>
                    </form>
                  <?php endif; ?>
                 </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </table>
      </div>
    </div>
  </body>
</html>
