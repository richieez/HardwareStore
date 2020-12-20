<?php include 'koneksi.php'; ?>
<div class="card-deck">
       
     <?php 

         $bestItem = $koneksi->query("SELECT item.id_produk, item.foto_produk, item.nama_produk, item.harga_produk, item.stok_produk, SUM(detail_transaksi.jumlah) AS total_Penjualan FROM detail_transaksi JOIN item ON detail_transaksi.id_produk = item.id_produk JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi WHERE transaksi.konfirmasi = 'True' GROUP BY detail_transaksi.id_produk ORDER BY total_penjualan DESC");

     $index = 0;

    
         while($bestProduk = $bestItem->fetch_assoc()):

         if ($index <= 3) :
         
      ?>
    <div class="row">
      <div class="col mt-2 mb-3 ">
        <div class="card" style="width: 15rem;">
        <a href="detail.php?&id=<?=$bestProduk['id_produk']?>">
            <img src="foto_prodak/<?= $bestProduk['foto_produk']?>" class="card-img-top" alt="card image cap">
        </a>
          <div class="card-body">
            <h5 class="card-title"><a href="detail.php?&id=<?=$bestProduk['id_produk']?>"><?= $bestProduk['nama_produk']?></a></h5>
                 <h6 class="card-title">Rp. <?=number_format($bestProduk['harga_produk'])?></h6>
                 <h6 class="card-title text-info">Stok : <?=$bestProduk['stok_produk']?></h6>

                <a href="beli.php?id=<?=$bestProduk['id_produk']?>"><img src="asset/shopping.svg" width="40" height="30"></a>
                 <a href="detail.php?id=<?=$bestProduk['id_produk']?>" class="btn btn-secondary ml-2">Detail</a>
          </div>
         </div>
     </div>
    </div>
    <?php $index++; ?>
    <?php endif; ?>

    <?php endwhile; ?> 
    
    
    </div>
