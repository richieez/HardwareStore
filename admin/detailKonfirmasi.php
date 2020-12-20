
        <?php 
         session_start();
         include '../koneksi.php';
         include 'navbar.php';
         require '../search.php';
         if (!isset($_SESSION['loginAdmin'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='loginAdmin.php'</script>";
      exit;
    }
         ?>

         <?php 
         $id = $_GET['id'];
         $Item = $koneksi->query("SELECT item.nama_produk, item.harga_produk, item.kategori_produk, detail_transaksi.jumlah FROM detail_transaksi INNER JOIN item ON item.id_produk = detail_transaksi.id_produk WHERE detail_transaksi.id_transaksi = '$id'");
          ?>
     <br>
     <br>
<div class="container">
     <div class="row mt-5">
     <h5>ID Transaksi = <?=$id;?></h5>
     </div>

      <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
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
      <td><?=number_format($DataProduk['harga_produk'])?></td>
      <td><?=number_format($DataProduk['jumlah'])?></td>
      <td><?=number_format($DataProduk['harga_produk'] * $DataProduk['jumlah'])?></td>
    </tr>  
  <?php endwhile  ?>
  </tbody>
</table>

<div class="row">
  <div class="col">

  <?php $Data = $koneksi->query("SELECT * FROM transaksi WHERE id_transaksi = '$id'");?>
  <?php $total = $Data->fetch_assoc(); ?>
  <h5>Total Belanja : <?= number_format($total['total_belanja']); ?></h5>
  <h5>Username : <?= $total['id_pembeli']; ?></h5>
  <h5>Lokasi Pengiriman : <?= $total['lokasi']; ?></h5>
  <h5>Tgl Pembelian : <?= date('d F Y', strtotime($total['tgl_pembelian'])); ?></h5>
  <h5>Telp : <?= $total['tlp_penerima']; ?></h5>
  <br>
  <?php if ($total['konfirmasi'] == 'False') : ?>
      <td><a href="accepted.php?id=<?=$total['id_transaksi']?>" class="btn btn-primary" onclick="return confirm('Konfirmasi Pembelian.. ?')">Konfirmasi</a></td>
      <?php else : ?>
      <td><a class="btn btn-secondary" >Konfirmasi</a></td>
      <?php endif; ?>
  </div>

  <div class="col">
  <td> <img src="../bukti_transaksi/<?=$total['bukti_pembayaran']?>" width="250"> </td>
  </div>

</div>

      


</div>

  
   


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>