<?php 
session_start();
include 'koneksi.php';
if (!isset($_SESSION['loginAdmin'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='login.php'</script>";
      exit;
    }







$id=$_GET['id'];

$DataProduk = $koneksi->query("SELECT * FROM item WHERE id_produk = '$id'");
$Data = $DataProduk->fetch_assoc();
//var_dump($Data['foto_produk']);
//unlink('foto_prodak/' . $Data['foto_produk']);
$hapus=$koneksi->query("DELETE FROM item WHERE id_produk = '$id'");

$DataFoto = $koneksi->query("SELECT * FROM foto_prodak WHERE id_produk = '$id'");
while ($foto = $DataFoto->fetch_assoc()) {
	$delete=$koneksi->query("DELETE FROM foto_prodak WHERE id_produk = '$id'");
	unlink('foto_prodak/' . $foto['foto_produk']);
}

echo "<script>location='admin/index.php'</script>";
 ?>