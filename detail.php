
    <?php
session_start();
include 'koneksi.php';
include 'navbar.php';

//mendapatkan produk id_produk dari url
$id_pr=$_GET['id'];
?>                         
 

<br>
<br>
<div class="container display">

<div class="col mt-5 mb-5 align-center">
  <h3>Detail Produk :</h3>
</div>
  

  <?php $ambil = $koneksi->query("SELECT * FROM item WHERE id_produk = '$id_pr' ");?>
               <?php   $perproduk = $ambil->fetch_assoc() ?>


  <div class="card mb-3" style="max-width: 840px;">
  <div class="row no-gutters">

     <div class="col-md-4">
      <img src="foto_prodak/<?=$perproduk['foto_produk']?>" class="card-img content" alt="..."  >
    </div>

    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title text-success" ><?=$perproduk['nama_produk']?></h5>
        <h5 class="card-title text-info" ><?=$perproduk['kategori_produk']?></h5>
        <h5 class="card-title">Rp.<?=number_format($perproduk['harga_produk'])?></h5>
        <p class="card-text text-justify text-secondary">Stok           : <?=$perproduk['stok_produk']?></p>
        <p class="card-text text-justify">Description    : <?=$perproduk['ket_produk']?></p>
        <p class="card-text"><small class="text-muted">Diupload Pada : <?= date('d F Y', strtotime($perproduk['created_at']))?></small></p>
        <a href="beli.php?id=<?=$perproduk['id_produk']?>" class="btn btn-primary">Buy</i></a>

      </div>
    </div>
  


<?php $getFoto = $koneksi->query("SELECT * FROM foto_prodak WHERE id_produk = '$id_pr'"); ?>
<?php while ($foto = $getFoto->fetch_assoc() ) :?>
  <div class="thumbnail">
  <img src="foto_prodak/<?= $foto['foto_produk']?>" class="nextContent" alt="..." >
  </div>

  <?php endwhile ?>

  </div>
</div>
</div>
<br />
<br />
<br />






  <script type="text/javascript" src="script.js"></script>

  <?php include 'footer.php'; ?>

   