
 <?php 

    session_start();
    include 'koneksi.php';
    if (!isset($_SESSION['loginAdmin'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='loginAdmin.php'</script>";
      exit;
    }
    

    if (isset($_POST['tambah'])) {



      $id_produk=$_POST['id_produk'];
      $kategori_produk=$_POST['kategori_produk'];
      $nama_produk=$_POST['nama_produk'];
      $harga_produk=$_POST['harga_produk'];
      $stok_produk=$_POST['harga_produk'];
      $stok_produk=$_POST['stok_produk'];
      $ket_produk=$_POST['ket_produk'];
      $created_at = date('Y-m-d');

      $nama_file = $_FILES['foto']['name'];
      $size_file = $_FILES['foto']['size'];
      $error = $_FILES['foto']['error'];
      $tmp_file = $_FILES['foto']['tmp_name'];

      $index = 0;
      $nama_file_baru = [];
      foreach ($nama_file as $key => $value) {


      $daftar_files = ['jpg', 'jpeg', 'png'];
      $ekstensi_file = explode('.', $value);
      $ekstensi_file = strtolower(end($ekstensi_file));
      if (!in_array($ekstensi_file, $daftar_files)) {
        echo "<script>alert('Fortmat Gambar Tidak Sesuai')</script>";
        return false;
      }

      if ($size_file[$key] > 10000000) {
        echo "<script>alert('Ukuran File Terlalu Besar')</script>";
        return false;
      }

      
        //rename file
      $nama_file_baru[$key] = $id_produk;
      $nama_file_baru[$key] .= $index;
      $nama_file_baru[$key] .= '.';
      $nama_file_baru[$key] .= $ekstensi_file;
      $index++;


      $tmp_file_new = $tmp_file[$key];
      

      move_uploaded_file($tmp_file_new, 'foto_prodak/' . $nama_file_baru[$key]);

      $save = $koneksi->query("INSERT INTO `foto_prodak` (`id_produk`,  `foto_produk`) VALUES ('$id_produk', '$nama_file_baru[$key]');");

      
      }


     $foto=$nama_file_baru[0];
     // move_uploaded_file($tmp_file, 'foto_prodak/' . $nama_file_baru);
     $ambil = $koneksi->query("INSERT INTO `item` (`id_produk`, `kategori_produk`, `nama_produk`, `harga_produk`, `stok_produk`, `ket_produk`, `foto_produk`, `created_at`) VALUES ('$id_produk', '$kategori_produk', '$nama_produk', '$harga_produk', '$stok_produk', '$ket_produk', '$foto', '$created_at');");


        echo "<script> alert('Data Berhasil Ditambahkan')</script>";
        echo "<script> location='admin/index.php'</script>";


}

    

     ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Tambah Data</title>
    
  </head>
  <body>

    

    <form action="" method="POST" enctype="multipart/form-data">
<div class="form-row ml-2">
  <div class="form-group col-md-3">
    <label for="exampleFormControlInput1">ID Produk</label>
    <?php $id =  date('Ymdhis'); ?>
    <input type="text" class="form-control" name="id_produk" placeholder="2008171" value="<?=$id?>">
  </div>

  <div class="form-group col-md-3">
    <label for="exampleFormControlInput1">Kategori
    <input type="text" class="form-control" name="kategori_produk" placeholder="motherboard" autocomplete="off" autofocus="">
    </label>
  </div>
</div>
<div class="form-row ml-2">
  <div class="form-group col-md-3">
    <label for="exampleFormControlInput1">Nama Produk
    <input type="text" class="form-control" name="nama_produk" placeholder="Maximus Apex XII" autocomplete="off">
    </label>
  </div>

  <div class="form-group col-md-3">
    <label for="exampleFormControlInput1">Harga
    <input type="text" class="form-control" name="harga_produk" placeholder="80000">
    </label>
  </div>
</div>

  <div class="form-group col-md-3">
    <label for="exampleFormControlInput1">Stok
    <input type="text" class="form-control" name="stok_produk" placeholder="10" autocomplete="off">
    </label>
  </div>
 
  <div class="form-group col-md-8">
    <label for="exampleFormControlTextarea1">Deskripsi</label>
    <textarea class="form-control" name="ket_produk" rows="3"></textarea>
  </div>

  <div class="form-group col-md-3 mb-2">
    <label for="exampleFormControlInput1 ">Foto
    <input type="file" name="foto[]" class="gambar" multiple="">
    </label>
    <br />
    
  </div>

  
<div class="col mb-2 ml-3">
   <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
</div>


</form>
    



<script type="text/javascript" src="js/script.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>