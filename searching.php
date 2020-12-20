<?php
include 'koneksi.php';
include 'navbar.php';
session_start();
if (!isset($_SESSION['login'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='login.php'</script>";
      exit;
    }
    ?>
    
<?php 
    $keyword = $_GET['id'];
    if (isset($_GET['cari'])) {
      $keyword = $_GET['keyword'];
      # code...
    }


    $rows = [];

    $query= $koneksi->query("SELECT * FROM item WHERE nama_produk LIKE '%$keyword%' OR kategori_produk LIKE '%$keyword%'");

    while ($row = $query->fetch_assoc()) {
        $rows[]=$row;
    }
 ?>
    <div class="col mt-5">
      <h2>Hasil Pencarian</h2>
    </div>
<div class="container mt-5">
  <div class="card-deck">
 <?php foreach ($rows as $key => $value):  ?>

 <div class="row">
      <div class="col mt-2 mb-3 ">
        <div class="card" style="width: 15rem;">
        <a href="detail.php?&id=<?=$value['id_produk']?>">
            <img src="foto_prodak/<?= $value['foto_produk']?>" class="card-img-top" alt="card image cap">
        </a>
          <div class="card-body">
            <h5 class="card-title"><a href="detail.php?&id=<?=$value['id_produk']?>"><?= $value['nama_produk']?></a></h5>
                 <h6 class="card-title">Rp. <?=number_format($value['harga_produk'])?></h6>
                 <h6 class="card-title text-info">Stok : <?=$value['stok_produk']?></h6>

                <a href="beli.php?id=<?=$value['id_produk']?>"><img src="asset/shopping.svg" width="40" height="30"></a>
                 <a href="detail.php?id=<?=$value['id_produk']?>" class="btn btn-secondary ml-2">Detail</a>
          </div>
         </div>
     </div>
    </div>

   <?php endforeach  ?>
   </div>
</div>


<?php include 'footer.php'; ?>