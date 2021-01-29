<?php if($this->session->logged_in == 0){
  redirect('welcome');
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url('css/admin.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome/css/font-awesome.min.css')?>">
  </head>
  <body> 
    <div class="head">
        <div class="head-wrap">
            <div class="nav-brand">
              <span>PJBL - Halaman Admin</span>
            </div>
            <div class="head-button-wrap">
              <a href="<?php echo site_url('admin/logOut'); ?>">Logout <i class="fa fa-sign-out"></i></a>
            </div>
          </div>
    </div>
    <div class="container">
      <div class="content">
        <h1>Daftar User</h1>
        <table>
          <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Akses</th>
            <th>Aksi</th>
            <th>Keterangan</th>
          </tr>
          <?php foreach ($data as $key){
            echo "<tr>
                    <td>$key->username</td>";
                    if ($key->status == 'disable'){
                      echo "<td>-</td>";
                    }
                    else{
                      echo 
                      "<td>$key->password</td>";
                    }
                    if ($key->status == 'disable'){
                      echo "<td>-</td>";
                    }
                    else{
                      echo "<td>$key->akses</td>";
                    }
                    if ($key->status == 'disable'){
                      echo "<td>-</td>";
                    }
                    else{
                      echo 
                      "<td> 
                          <a class='warning' href='".site_url('admin/updateUser/'.$key->id_user)."'>Edit</a>
                          <a class='red' href='".site_url('admin/deleteRecord/'.$key->id_user)."'>Hapus</a> 
                      </td>";
                    }
                    if($key->status == 'linkable'){
                      echo "<td><a href='".site_url('admin/linkUser/'.$key->id_user)."'><i class = 'fa fa-link'></i></a></td>";
                    }
                    else if ($key->status == 'linked'){
                      echo "<td>Linked</td>";
                    }
                    else if ($key->status == 'disable'){
                      echo "<td>-</td>";
                    }
            echo"</tr>";
          }?>
        </table>
        <div class="link-below-table">
          <a href="<?php echo site_url('admin/addUser'); ?>">Tambah User</a>
        </div>
      </div>
    </div>
  </body>
</html>
