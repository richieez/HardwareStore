
    

    <?php 

    session_start();
    include 'koneksi.php';
    include 'navbar.php';

   
     ?>

<br />
<br />

    <div id="carouselExampleControls" class="carousel slide mt-3" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                 <img src="asset/nvidia.png" class="d-block w-100" alt="...">
            </div>
          <div class="carousel-item">
                 <img src="asset/ryzen.jpg" class="d-block w-100" alt="...">
            </div>
          <div class="carousel-item">
                 <img src="asset/intel.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
  </a>
    </div>


      <div class="container mt-3">
        <h1 class="text-center">Best Seller</h1>

<!-- produk terlaris -->
<?php include 'bestSeller.php'; ?>
<!-- daftar produk -->
  <h1 class="text-center">Product List</h1>
        <div class="card-deck">
       
     <?php 

         $Item = $koneksi->query("SELECT * FROM item ORDER BY id_produk DESC");

          
         while($DataProduk = $Item->fetch_assoc()):
          //var_dump($DataProduk);

      ?>
    <div class="row">
      <div class="col mt-2 mb-3 ">
        <div class="card" style="width: 15rem;">
        <a href="detail.php?&id=<?=$DataProduk['id_produk']?>">
            <img src="foto_prodak/<?= $DataProduk['foto_produk']?>" class="card-img-top" alt="card image cap">
        </a>
          <div class="card-body">
            <h5 class="card-title"><a href="detail.php?&id=<?=$DataProduk['id_produk']?>"><?= $DataProduk['nama_produk']?></a></h5>
                 <h6 class="card-title">Rp. <?=number_format($DataProduk['harga_produk'])?></h6>
                 <h6 class="card-title text-info">Stok : <?=$DataProduk['stok_produk']?></h6>

                <a href="beli.php?id=<?=$DataProduk['id_produk']?>"><img src="asset/shopping.svg" width="40" height="30"></a>
                 <a href="detail.php?id=<?=$DataProduk['id_produk']?>" class="btn btn-secondary ml-2">Detail</a>
          </div>
         </div>
     </div>
    </div>
  
     

    <?php endwhile; ?> 
    </div>
    </div>
       <script type="text/javascript" src="js/script.js"></script>
   <?php include 'footer.php'; ?>
    

    