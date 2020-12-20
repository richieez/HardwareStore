<?php 
session_start();
include '../koneksi.php';
if (!isset($_SESSION['loginAdmin'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='login.php'</script>";
      exit;
    }


$id=$_GET['id'];



$DataProduk = $koneksi->query("SELECT * FROM transaksi WHERE id_transaksi = '$id'");
while($Data = $DataProduk->fetch_assoc()):


$accepted = $koneksi->query("UPDATE transaksi SET konfirmasi = 'True' WHERE id_transaksi = '$id' ");  
 endwhile;

echo "<script>location='konfirmasi.php'</script>";
 ?>