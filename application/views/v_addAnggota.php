<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Anggota</title>
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
      <div class="dirlink">
        /<a href="<?php echo site_url('guru'); ?>">DaftarProject</a>
        /<a href="<?php echo site_url('project'); ?>">DaftarFase</a>
        /<a href="<?php echo site_url('project/golistKelompok'); ?>">DaftarKelompok</a>
        /<a href="#">TambahAnggota</a>
      </div>
      <div class="content-custom">
        <div class="buttong">
          <a class="backs" href="<?php echo site_url('project/golistKelompok'); ?>"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <div class="desc">
          <h3>Tambah Anggota <i class="fa fa-plus-square-o"></i></h3>
        </div>
        <form action="<?php echo site_url('project/addAnggota') ?>" method="post">
          <div class="field_wrapper">
            <div class="input-group">
              <input type="text" name="nama_anggota[]" placeholder="Nama Siswa" required>
              <a href="javascript:void(0);" class="remove_button"><i class="fa fa-trash"></i></a>
            </div>
          </div>
          <div class="dom-button">
            <a id="trigger" href="javascript:void(0);" class="add_button" title="Add field">Tambah Field <i class="fa fa-plus"></i></a>
          </div>
          <button type="submit" name="submit">Simpan <i class="fa fa-save"></i></button>
        </form>
      </div>
    </div>
    <script src="<?php echo base_url('asset/js/jquery-3.5.1.min.js') ?>" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        const addButton = $('.add_button');
        const wrapper = $('.field_wrapper');
        const fieldHTML = '<div class="input-group"><input type="text" name="nama_anggota[]" placeholder="Nama Siswa" required/><a href="javascript:void(0);" class="remove_button"><i class="fa fa-trash"></i></a></div>';

        $(addButton).click(function(){
          $(wrapper).append(fieldHTML);
        });

        $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove();
        });
      });
    </script>
  </body>
</html>