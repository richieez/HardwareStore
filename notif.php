
   <?php
session_start();
include 'koneksi.php';
include 'navbar.php';

if(!isset($_SESSION['login'])){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php'</script>";
}
?>

 <?php $username = $_SESSION['login']['username']; ?>
 
 <div class="container">

  <?php $Data = $koneksi->query("SELECT * FROM transaksi WHERE id_pembeli = '$username' AND konfirmasi_pembeli = 'False'");?>
  <?php $total = $Data->fetch_assoc(); ?>
  <?php $status = $total['konfirmasi']; ?>
  <?php $pesanan = $total['konfirmasi_pembeli']; ?>
  <?php $id_transaksi = $total['id_transaksi']; ?>

  <br>
  <br>

          <div class="mx-auto" style="width: 450px;">
              
                  <table class="table mt-5 table-hover align-middle">
                    <thead>
                      <tr>
                        
                        <th scope="col" colspan="5">Total Belanja  :</th>
                        <th scope="col">Rp. <?= number_format($total['total_belanja']); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                       
                        <td colspan="5">Lokasi Pengiriman :</td>
                        <td><?= $total['lokasi']; ?></td>
                      </tr>
                      <tr>
                       
                        <td colspan="5">Tgl Pembelian : </td>
                        <td><?= date('d F Y', strtotime($total['tgl_pembelian'])); ?></td>
                      </tr>
                      <tr>
                          <?php if ($status == "False") : 
                            $statusPembelian = "Menunggu Konfirmasi";
                            else: 
                            $statusPembelian = "Dalam Proses Pengiriman";
                            
                            endif; 
                            ?>
                       
                        <td colspan="5"><h5>Status Pembelian : </h5> </td>
                        <td><h5><?= $statusPembelian; ?></h5></td>
                      </tr>

                       
                    </tbody>
                  </table>
             
          </div>

      <div class="row">
        <div class="col">
          <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="bukti">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <br>
            <small>Upload Bukti Pembayaran</small>
          </form>
        </div>
        <div class="col">
              <?php if ($pesanan == 'False' AND $status == 'True') : ?>
              <td><a href="accItem.php?id=<?=$id_transaksi?>" class="btn btn-primary" onclick="return confirm('Pastikan Produk Sudah Diterima..!')">Konfirmasi</a></td>
              <?php else : ?>
              <td><a class="btn btn-secondary" >Konfirmasi</a></td>
              <?php endif; ?>
              <br>
            <small>Konfirmasi Penerimaan Barang</small>
        </div>

      </div>



      <?php $Item = $koneksi->query("SELECT item.nama_produk, detail_transaksi.jumlah, item.harga_produk, item.kategori_produk, transaksi.tgl_pembelian, transaksi.id_transaksi FROM item JOIN detail_transaksi ON item.id_produk = detail_transaksi.id_produk JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi WHERE transaksi.id_pembeli = '$username' AND transaksi.konfirmasi_pembeli = 'False'"); ?>
 <?php if (mysqli_num_rows($Item) == 0) {
   echo "<script>alert('Anda Belum Memiliki Transaksi')</script>";
  echo "<script>location='index.php'</script>";
 } ?>

 <br/>

      <table class="table mt-3">
  <thead>
    <tr>

      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Subtotal</th>
     
    </tr>
  </thead>
  <tbody>
   <?php  
    $i=0;
   while($DataProduk = $Item->fetch_assoc()): 
    ?>
  <?php $i++; ?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$DataProduk['nama_produk']?></td>
      <td><?=$DataProduk['kategori_produk']?></td>
      <td><?=number_format($DataProduk['jumlah'])?></td>
      <td>Rp. <?=number_format($DataProduk['harga_produk'])?></td>
      <td>Rp. <?=number_format($DataProduk['harga_produk'] * $DataProduk['jumlah'])?></td>
    </tr>  
  <?php endwhile  ?>
  </tbody>
</table>
  
  

</div>

<br />
<br />
   <?php include 'footer.php'; ?>


   <?php if (isset($_POST['submit'])) {
     
     $nama_file = $_FILES['bukti']['name'];
     $size_file = $_FILES['bukti']['size'];
     $error = $_FILES['bukti']['error'];
     $tmp_file = $_FILES['bukti']['tmp_name'];

     $daftar_files = ['jpg', 'jpeg', 'png'];
      $ekstensi_file = explode('.', $nama_file);
      $ekstensi_file = strtolower(end($ekstensi_file));
      if (!in_array($ekstensi_file, $daftar_files)) {
        echo "<script>alert('Format File Tidak Didukung')</script>";
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

      $updatestok = $koneksi->query("UPDATE transaksi SET bukti_pembayaran = '$bukti' WHERE id_transaksi = '$id_transaksi' ");
   } ?>
    

    