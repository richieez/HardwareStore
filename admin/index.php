
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

         $Item = $koneksi->query("SELECT * FROM item ORDER BY id_produk DESC");

          //searching
     if (isset($_GET['cari'])) {
      $Item = searching($_GET['keyword']);
     } ?>
     <br>
     <br>
     <div class="col mt-5 text-center">
       <h1>Daftar Produk</h1>
     </div>

     <div class="col mb-2 ml-3 mt-3">
    <a href="../TambahProduk.php" class="btn btn-success">Tambah Produk</a>
   </div>

      <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID</th>
      <th scope="col">Kategori</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga </th>
      <th scope="col">Stok </th>
      <th scope="col"> </th>
      <th scope="col">Keterangan </th>
      <th scope="col">Foto </th>
      <th scope="col">Upload </th>
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
      <td><?=$DataProduk['id_produk']?></td>
      <td><?=$DataProduk['kategori_produk']?></td>
      <td><?=$DataProduk['nama_produk']?></td>
      <td><?=number_format($DataProduk['harga_produk'])?></td>
      <td><?=$DataProduk['stok_produk']?></td>
      <td> <form action="addstok.php" method="GET">
           <input type="hidden" name="id_produk" value="<?=$DataProduk['id_produk']?>">
           <button type="submit" class="btn btn-body"><i style="font-size: 15px" class="fas fa-plus"></i></button>
           </form>
      </td>
      <td><?=$DataProduk['ket_produk']?></td>
      <td> <img src="../foto_prodak/<?=$DataProduk['foto_produk']?>" width="150"> </td>
      <td><?=$DataProduk['created_at']?></td>
        <td><a href="../delete.php?id=<?=$DataProduk['id_produk']?>" onclick="return confirm('Hapus Data ?')"><i class="fas fa-trash-alt" style="color:red;font-size: 30px"></i></a></td>
        <td><a href="../edit.php?id=<?=$DataProduk['id_produk']?>"><i class="fas fa-edit" style="color:orange;font-size: 30px"></i></a></td>
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