

<?php //untuk mencari karegori di database
include 'koneksi.php';
            $Kategori = $koneksi->query("SELECT kategori_produk FROM item ORDER BY id_produk DESC");
          
             $i =0;
             $Daftar_Kategori = [];

        while ($DataKategori = $Kategori->fetch_assoc()):
         
         //var_dump($DataKategori);
          //seleksi kategori yang sama
          if (!in_array($DataKategori, $Daftar_Kategori)) {
            $Daftar_Kategori[]= $DataKategori;
          }
      ?>

         <?php  $i++;  
          endwhile;   ?>


  <div class="dropdown">
    <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Kategori Produk
    </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <?php foreach ($Daftar_Kategori as $key): ?>
    <a class="dropdown-item text-primary" href="searching.php?id=<?=$key['kategori_produk'];?>"><?=$key['kategori_produk'];?></a>
    <?php endforeach; ?>
  </div>
</div>
