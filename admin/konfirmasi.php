
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

         <?php $Item = $koneksi->query("SELECT * FROM transaksi GROUP BY id_transaksi DESC"); ?>
     <br>
     <br>

      <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Transaksi</th>
      <th scope="col">Total Transaksi</th>
      <th scope="col">Username Pembeli </th>
      <th scope="col">Lokasi </th>
      <th scope="col">Tlp Penerima</th>

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
      <td><?=$DataProduk['id_transaksi']?></td>
      <td><?=number_format($DataProduk['total_belanja'])?></td>
      <td><?=$DataProduk['id_pembeli']?></td>
      <td><?=$DataProduk['lokasi']?></td>
      <td><?=$DataProduk['tlp_penerima']?></td>

      <td><a href="detailKonfirmasi.php?id=<?=$DataProduk['id_transaksi']?>" class="btn btn-success">Detail</a></td>

      <?php if ($DataProduk['konfirmasi'] == 'False') : ?>
      <td><a href="accepted.php?id=<?=$DataProduk['id_transaksi']?>" class="btn btn-primary" onclick="return confirm('Konfirmasi Pembelian.. ?')">Konfirmasi</a></td>
      <?php else : ?>
      <td><a class="btn btn-secondary" >Konfirmasi</a></td>
      <?php endif; ?>

    </tr>
    
    
  <?php endwhile  ?>
  </tbody>
</table>


  
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>