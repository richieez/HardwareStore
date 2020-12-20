
   

   <?php
session_start();
include 'koneksi.php';
include 'navbar.php';
 if (!isset($_SESSION['login'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='login.php'</script>";
      exit;
    }

//mendapatkan produk id_produk dari url
$id_produk=$_GET['id'];
$Item = $koneksi->query("SELECT * FROM item WHERE id_produk='$id_produk'");
$DataProduk = $Item->fetch_assoc();
$stok = $DataProduk['stok_produk'];
$nama = $DataProduk['nama_produk'];

?>

<div class="mx-auto" style="width: 450px;">    
    <div class="container mt-5">
        <div class="row pt-5">
    <h5><?=$nama?></h5>
    </div>
 <form action="" method="post">

       <div class="form-row ml-2">
            <div class="form-group col-md-5">
            <label  for="nama_user">Jumlah Pembelian</label>
          <input type="number" name="jml" required id="exampleInput" class="form-control" autofocus="">
        </div>
    </div>

        <div class="form-row ml-2">
            <div class="form-group col-md-3">
          <button type="submit" class="btn btn-primary mb-4 waves-effect waves-light" name="cek">Buy</button>
        </div>
    </div>
    </form>
    </div>

</div>



    <?php 
   

    if (isset($_POST['cek'])) {
         $tljumlah = $_POST['jml']; 


        if($tljumlah > $stok){
    echo "<script>alert('$nama hanya tersisa $stok buah')</script>";
    echo "<script>location='beli.php?id=$id_produk'</script>";
}
//jika sudah ada produk itu dikeranjang maka produk itu jumlahnya ditambahkan 
/*else if(isset($_SESSION['keranjang'][$id_produk]) AND ($_SESSION['keranjang'][$id_produk]<$pecah['stok_produk']))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}*/
else
{
   $_SESSION['keranjang'][$id_produk]=$tljumlah;

   //ke halaman keranjang
echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='basket.php'</script>";
}
    }
    ?>

        




<?php include 'footer.php'; ?>