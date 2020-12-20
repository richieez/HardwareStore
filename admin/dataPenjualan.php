
   <?php
session_start();
include '../koneksi.php';
include 'navbar.php';

if(!isset($_SESSION['loginAdmin'])){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php'</script>";
}
?>
 
 
 <div class="container">

  


      <?php $Item = $koneksi->query("SELECT item.nama_produk, item.kategori_produk, item.harga_produk, SUM(detail_transaksi.jumlah) AS total FROM item JOIN detail_transaksi ON detail_transaksi.id_produk = item.id_produk JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE transaksi.konfirmasi = 'True' GROUP BY detail_transaksi.id_produk ORDER BY total DESC;"); ?>
 

 <br/>
 <br/>

      <table class="table mt-5">
  <thead>
    <tr>

      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Kategori</th>
      <th scope="col">Total Penjualan</th>
      <th scope="col">Harga</th>
      
     
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
      <td><?=number_format($DataProduk['total'])?></td>
      <td>Rp. <?=number_format($DataProduk['harga_produk'])?></td>
      
    </tr>  
  <?php endwhile  ?>
  </tbody>
</table>
  
  

</div>




  
    

    