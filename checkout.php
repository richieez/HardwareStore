
   <?php
session_start();
include 'koneksi.php';
include 'navbar.php';
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong silahkan belanja terlebih dahulu')</script>";
    echo "<script>location='index.php'</script>";
}
if(!isset($_SESSION['login'])){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php'</script>";
}
?>



<br />
<br />

<div class="container mt-3 mb-5">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $nomor = 1; $total = 0;?>
                    <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah):?>
                        <!-- menampilkan produk yang sedang diperulangkan berdasarkan id produk -->
                    <?php $Item = $koneksi->query("SELECT * FROM item WHERE id_produk='$id_produk'")?>
                    <?php $DataProduk = $Item->fetch_assoc();?>
                    <?php $subtotal=$DataProduk['harga_produk']*$jumlah;?>
                    <?php $total+=$subtotal; ?>
                    <tr>
                        <th><?=$nomor?></th>
                        <td><?=$DataProduk['nama_produk']?></td>
                        <td>Rp.<?=number_format($DataProduk['harga_produk'])?></td>
                        <td><?=$jumlah?></td>
                        <td>Rp.<?=number_format($subtotal)?></td>
                    </tr>
                    <?php $nomor++;?>
                    <?php endforeach ?>
                </tbody>
            </table>
            
                
          
        

<?php  
 $username = $_SESSION['login']['username'];

 $ambil = $koneksi->query("SELECT * FROM member WHERE username = '$username' ");?>
                <?php $DataMember = $ambil->fetch_assoc();

?>

</div>

<div class="mx-auto" style="width: 450px;">
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="table table-hover align-middle">
          <thead>
            <tr>
              
              <th scope="col" colspan="5">Transfer Bank</th>
              <th scope="col">BNI</th>
            </tr>
          </thead>
          <tbody>
            <tr>
             
              <td colspan="5"><small class="text-muted">No Rekening</small><br>0773075249<br><small class="text-muted">PT. Hardware store</small></td>
              <td><a href=""><br>Salin</a></td>
            </tr>
            <tr>
             
              <td colspan="5">Total Pembayaran</td>
              <td>Rp.<?=number_format($total);?></td>
            </tr>
            <tr>
             
              <td colspan="5">Alamat</td>
              <td><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat" value="<?= $DataMember['alamat']; ?>"></td>
            </tr>

             <td colspan="5">No Telp</td>
              <td><input type="text" class="form-control" id="exampleInputPassword1" name="telp" value="<?= $DataMember['tlp_member']; ?>"></td>
            <tr>
            </tr>

             <td colspan="5">Bukti Transfer</td>
              <td><input type="file" class="form-control" id="exampleInputPassword1" name="bukti"></td>
            <tr>
            <tr>
                <td colspan="5">
                    
                </td>
            <td>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </td>
            </tr>
                
            </tr>
          </tbody>
        </table>
    </form>
</div>
   

   <?php 

   if (isset($_POST['submit'])) {
     $alamat = $_POST['alamat'];
     $telp = $_POST['telp'];
     $tgl = date("Y-m-d");
     $id = uniqid(80);


   
             
             
     $nama_file = $_FILES['bukti']['name'];
     $size_file = $_FILES['bukti']['size'];
     $error = $_FILES['bukti']['error'];
     $tmp_file = $_FILES['bukti']['tmp_name'];

     $daftar_files = ['jpg', 'jpeg', 'png'];
      $ekstensi_file = explode('.', $nama_file);
      $ekstensi_file = strtolower(end($ekstensi_file));
      if (!in_array($ekstensi_file, $daftar_files)) {
        echo "<script>alert('Upload Bukti Transfer Gagal')</script>";
      }

      if ($size_file > 10000000) {
        echo "<script>alert('Ukuran File Terlalu Besar')</script>";
      }
      elseif (in_array($ekstensi_file, $daftar_files)) {
        //rename file
      $nama_file_baru = uniqid();
      $nama_file_baru .= '.';
      $nama_file_baru .= $ekstensi_file;



      move_uploaded_file($tmp_file, 'bukti_transaksi/' . $nama_file_baru); 
      }
      $bukti=$nama_file_baru;



     


     foreach($_SESSION['keranjang'] as $id_produk => $jumlah):
                         
        $ambilproduk = $koneksi->query("INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah) VALUES ('$id', '$id_produk', '$jumlah') ");

        $updatestok = $koneksi->query("UPDATE item SET stok_produk = stok_produk - $jumlah WHERE id_produk = '$id_produk' ");               
     endforeach;

         $ambil = $koneksi->query("INSERT INTO `transaksi` (id_transaksi, id_pembeli, lokasi, tgl_pembelian, tlp_penerima, total_belanja, bukti_pembayaran) VALUES ('$id', '$username', '$alamat', '$tgl', '$telp', '$total', '$bukti');");

     unset($_SESSION['keranjang']);
     echo "<script>alert('Pemesanan Sedang Di Proses');</script>";
     echo "<script>location='notif.php'</script>";

  }
    ?>




   <?php include 'footer.php'; ?>
    

    