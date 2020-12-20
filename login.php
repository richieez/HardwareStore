<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    

    <?php  
session_start();
include 'koneksi.php';

if (isset($_SESSION['login'])) {
      echo "<script> alert('Anda Harus Logout Terlebih Dahulu')</script>";
      echo "<script> location='index.php'</script>";
      exit;
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

    
  </head>
  <body>

<br>
<br>
<div class="mx-auto" style="width: 250px;">   
  <div class="container">
     <div class="row">
      <div class="col text-center">
           <h3>LOGIN</h3>
      </div>
     </div>
   <form action="" method="POST">
  <div class="form-group col">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" autofocus="" required="">
  </div>
  <div class="form-group col">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" required="">
  </div>
<div class="col text-center">
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</div>
</form>


<div class="col text-center">
    <a href="registrasi.php">Register</a>
</div>
  </div>
</div>





 <?php
 
    //jika ada tombol simpan(tombol simpan ditekan)
    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        //lakukan query ngecek akun di tabel user di db
        $DataMember = $koneksi->query("SELECT * FROM member WHERE username ='$username'");

       // $HasilDataMember = $koneksi->query("SELECT * FROM member WHERE username ='$username'");

      
      // $RealData = $HasilDataMember->fetch_assoc();
       $akun= $DataMember->fetch_assoc();


     //   var_dump($RealData);
        //ngitung akun yg terambil
        if (password_verify($password, $akun['password'])) {
        
        
       $akunterdaftar = $DataMember->num_rows;
        //jika satu akun yang cocok maka boleh login
        if($akunterdaftar==1){
            //anda sudah login
           // $akun= $DataMember->fetch_assoc();
            //simpan di session login
            $_SESSION['login'] = $akun;
           // var_dump($_SESSION['login']);
            echo "<script>alert('Login Berhasil');</script>";
             echo "<script>location='index.php'</script>";
         }
        }  
        
            //anda gagal login
           echo "<script>alert('Anda Gagal Login');</script>";
            echo "<script>location='login.php'</script>";
        
    
}
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>