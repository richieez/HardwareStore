<?php  

session_start();
$id_produk=$_GET['id'];

//$_SESSION['keranjang'][$id_produk]=0;
unset($_SESSION['keranjang'][$id_produk]);
echo "<script>alert('Produk telah dihapus');</script>";
echo "<script>location='basket.php'</script>";

?>