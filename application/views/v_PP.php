<?php if($this->session->logged_in == 0){
  redirect('welcome/loginKelompok');
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
        <a href="<?php echo site_url('kelompok'); ?>"><i class="fa fa-arrow-left"></i> Back</a>
        <div class="heading">
            <h2>Pertanyaan Pendahuluan</h2>
        </div>
        <div class=form-wrap>
          <form action="<?php echo site_url('kelompok/addJP'); ?>" method="post">
          <table>
            <tr>
              <th>No</th>
              <th>Soal</th>
              <th>Jawaban</th>
            </tr>
            <?php if (!$PP): ?>
            <tr>
              <td colspan="3">Belum ada soal</td>
            </tr>
          <?php else: ?>
            <?php $count = 1;?>
            <?php foreach ($PP as $key): ?>
            <tr>
              <td><?php echo $count?></td>
              <td><?php echo $key->soal ?></td>
              <td><input type="text" name="jawaban[]" placeholder="Jawaban Anda" required></td>
            </tr>
            <?php $count++;?>
            <?php endforeach; ?>
          </table>
            <div class="button-wrap">
              <button type="submit" name="button">Kirim <i class="fa fa-send" ></i></button>
            </div>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
