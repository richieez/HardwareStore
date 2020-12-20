<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    

    <?php 
        include '../koneksi.php';
        require '../search.php';

        $Item = searching($_GET['keyword']);
        ?>
        <div class="container mt-3">
            <div class="card-deck">

 <?php     while($DataProduk = $Item->fetch_assoc()): ?>

      
    <div class="row">
      <div class="col mt-2 mb-3 ">
        <div class="card" style="width: 15rem;">
        <a href="detail.php?&id=<?=$DataProduk['id_produk']?>">
            <img src="foto_prodak/<?= $DataProduk['foto_produk']?>" class="card-img-top" alt="card image cap">
        </a>
          <div class="card-body">
            <h5 class="card-title"><a href="detail.php?&id=<?=$DataProduk['id_produk']?>"><?= $DataProduk['nama_produk']?></a></h5>
                 <h6 class="card-title">Rp. <?=number_format($DataProduk['harga_produk'])?></h6>
                 <h6 class="card-title">Stok : <?=$DataProduk['stok_produk']?></h6>

                 <a href="beli.php?id=<?=$DataProduk['id_produk']?>" class="btn btn-primary">Beli</a>
                 <a href="detail.php?id=<?=$DataProduk['id_produk']?>" class="btn btn-primary">Detail</a>
          </div>
         </div>
     </div>
    </div>





  <?php endwhile ?>
            </div>
         </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>