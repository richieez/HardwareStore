<?php
session_start();
include 'koneksi.php';
include 'navbar.php';
if (!isset($_SESSION['loginAdmin'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='login.php'</script>";
      exit;
    }
$id=$_GET['id'];

?>


<?php  
 $ambil = $koneksi->query("SELECT * FROM item WHERE id_produk = '$id' ");?>
                <?php  while($perproduk = $ambil->fetch_assoc()){
?>
           
                
          <div class="container mt-5 mb-5">

               <form action="" method="post" enctype="multipart/form-data">

	              
	                <input type="hidden" name="id_produk" class="form-control" value="<?=$perproduk['id_produk']?>">
	                <br />
              <div class="form-row ml-2">
                <div class="form-group col-md-3">
	                <label  for="username_user">Kategori Produk</label>
	                <input type="text" name="kategori_produk" class="form-control" value="<?=$perproduk['kategori_produk']?>">
	                <br />
                </div>

                <div class="form-group col-md-3">
	                <label  for="username_user">Nama Produk</label>
	                <input type="text" name="nama_produk" class="form-control" value="<?=$perproduk['nama_produk']?>">
	                <br />
                </div>
              </div>

              <div class="form-row ml-2">
                <div class="form-group col-md-3">
	                <label  for="username_user">Harga Produk</label>
	                <input type="text" name="harga_produk" class="form-control" value="<?=$perproduk['harga_produk']?>">
	                <br />
                </div>

              <div class="form-group col-md-3">
	                <label  for="username_user">Stok Produk</label>
	                <input type="text" name="stok_produk" class="form-control" value="<?=$perproduk['stok_produk']?>">
	                <br />
                </div>
              </div>

                <div class="form-group col-md-8">
	                <label  for="username_user">Keterangan</label>
	                <textarea  name="ket_produk" class="form-control" > 
	                	<?=$perproduk['ket_produk']?>
	                </textarea>
                </div>

                <div class="form-group col-md-3 mb-2">
	                <label  for="username_user">Foto</label>
	                <input type="file" name="foto" class="form-control" value="<?=$perproduk['foto_produk']?>">
                </div>


                  <input type="hidden" name="foto_lama" value="<?=$perproduk['foto_produk']?>">

	              
                 <br>
                    <button type="submit" class="btn btn-primary mb-4 waves-effect waves-light" name="daftar">Edit</button>
                   
                 
	            </form>

            </div>
	            <br />
	            <br />


	            

	        <?php } ?>


	 

	 <?php  


    if(isset($_POST['daftar']))
    {
      $foto_lama = $_POST['foto_lama'];
     $nama_file = $_FILES['foto']['name'];
      $size_file = $_FILES['foto']['size'];
      $error = $_FILES['foto']['error'];
      $tmp_file = $_FILES['foto']['tmp_name'];


      $daftar_files = ['jpg', 'jpeg', 'png'];
      $ekstensi_file = explode('.', $nama_file);
      $ekstensi_file = strtolower(end($ekstensi_file));
      if (!in_array($ekstensi_file, $daftar_files)) {
        
       $nama_file_baru=$foto_lama;
      }

      if ($size_file > 10000000) {
        echo "<script>alert('Ukuran File Terlalu Besar')</script>";
        $nama_file_baru=$foto_lama;
      }
      elseif (in_array($ekstensi_file, $daftar_files)) {
        //rename file
      $nama_file_baru = uniqid();
      $nama_file_baru .= '.';
      $nama_file_baru .= $ekstensi_file;



      move_uploaded_file($tmp_file, 'foto_prodak/' . $nama_file_baru);
      unlink('foto_prodak/' . $foto_lama); 
      }


     



   		$id_produk=$_POST['id_produk'];
      $kategori_produk=$_POST['kategori_produk'];
      $nama_produk=$_POST['nama_produk'];
      $harga_produk=$_POST['harga_produk'];
      $stok_produk=$_POST['harga_produk'];
      $stok_produk=$_POST['stok_produk'];
      $ket_produk=$_POST['ket_produk'];
      $foto=$nama_file_baru;

          $ambil = $koneksi->query("UPDATE item SET id_produk = '$id_produk', kategori_produk = '$kategori_produk', nama_produk = '$nama_produk', harga_produk = '$harga_produk', stok_produk = '$stok_produk', ket_produk = '$ket_produk', foto_produk = '$foto' WHERE id_produk = '$id_produk' ");

          $ambil = $koneksi->query("UPDATE foto_prodak SET id_produk = '$id_produk', foto_produk = '$foto' WHERE foto_produk = '$foto_lama' ");
        //ngitung akun yg terambil

         

         

echo "<script>location='admin/index.php'</script>";

         
       }

       include 'footer.php';
    ?>

                            
                            
              