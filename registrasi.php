<?php
include 'koneksi.php';

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_member = $_POST['nama_member'];
        $tlp_member = $_POST['tlp_member'];
        $email_member = $_POST['email_member'];
        $alamat = $_POST['alamat'];






        $cek = $koneksi->query("SELECT * FROM member WHERE username = '$username'");
        $HasilCek=$cek->num_rows;

        if ($HasilCek==1) {
            echo "<script> alert('Username sudah pernah digunakan')</script>";
            echo "<script> location='registrasi.php' </script>";
        }
        else{
            $new_password = password_hash($password, PASSWORD_DEFAULT);

             $koneksi->query("INSERT INTO member (username, password, nama_member, tlp_member, email_member, alamat) VALUES ('$username', '$new_password', '$nama_member', '$tlp_member', '$email_member', '$alamat')");
                        echo "<script>alert('Registrasi berhasil!!, silahkan login')</script>";
                        echo "<script>location='login.php'</script>";
        }
        var_dump($HasilCek);
        
    }

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Registrasi user baru</title>
  </head>
  <body>
  <div class="container mb-3">
    <h1>Form Register</h1>

    <form action="" method="POST">
  <div class="row">
    <div class="col-md-3">
      <label for="username"> Username
      <input type="text" name="username" class="form-control" placeholder="user27" required="" autofocus="" autocomplete="off">
    </label>
    </div>
    <div class="col-md-3">
      <label for="password"> Password
      <input type="password" name="password" class="form-control">
    </label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <label for="name"> Nama
      <input type="text" name="nama_member" class="form-control" placeholder="user">
    </label>
    </div>
     <div class="col-md-3">
      <label for="tlp_member"> Telp
      <input type="text" name="tlp_member" class="form-control" placeholder="6281945795745">
    </label>
    </div>
  </div>
     <div class="row">
    <div class="col-md-3">
      <label for="email_member"> Email
      <input type="text" name="email_member" class="form-control" placeholder="user@gmail.com">
    </label>
    </div>
  </div>
  <div class="row">
  <div class="col-md-3 mb-5">
    <label for="alamat"> Alamat
      </label>
      <textarea name="alamat" class="form-control" ></textarea>
    
    </div>
    </div>

    <button class="btn btn-primary" type="submit" name="register" >Register</button>
</form>
</div>


<?php include 'footer.php'; ?>