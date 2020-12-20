

   <?php
session_start();
include 'koneksi.php';
include 'navbar.php';
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong silahkan belanja terlebih dahulu')</script>";
    echo "<script>location='index.php'</script>";
}
if(!isset($_SESSION['login'])){
    echo "<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php'</script>";
}
?>
   
        <!-- ========================= SECTION  ========================= -->
        <!-- judul -->
           <div class="pt-5">
                  <h3 class="mt-5 text-center">Keranjang Belanja</h3>
           </div>
                
        <!-- end judul -->
        <!-- main content -->
        
        <div class="container mt-3 mb-5">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Foto</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $nomor = 1;?>
                    <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah):?>
                        <!-- menampilkan produk yang sedang diperulangkan berdasarkan id produk -->
                    <?php $Item = $koneksi->query("SELECT * FROM item WHERE id_produk='$id_produk'")?>
                    <?php $DataProduk = $Item->fetch_assoc();?>
                    <tr>
                        <th><?=$nomor?></th>
                        <td><?=$DataProduk['nama_produk']?></td>
                        <td>Rp.<?=number_format($DataProduk['harga_produk'])?></td>
                        <td><?=$jumlah?></td>
                        <td> <img src="foto_prodak/<?=$DataProduk['foto_produk']?>" width="80"> </td>
                       
                        <td><a href="deleteitem.php?id=<?=$id_produk?>"><button class="btn btn-warning">Delete</button></a></td>
                    </tr>
                    <?php $nomor++;?>
                    <?php endforeach ?>
                </tbody>
            </table>
        
                
                <a href="index.php"><button class="btn btn-primary">Lanjut Belanja</button></a>
                <a href="checkout.php"><button class="btn btn-success">Checkout</button></a>
                
          
        </div>

   
<?php include 'footer.php'; ?>