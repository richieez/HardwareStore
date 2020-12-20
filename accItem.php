<?php 
session_start();
include 'koneksi.php';
if (!isset($_SESSION['login'])) {
      echo "<script> alert('Anda harus login terlebih dahulu')</script>";
      echo "<script> location='login.php'</script>";
      exit;
    }


$id=$_GET['id'];



$DataProduk = $koneksi->query("SELECT * FROM transaksi WHERE id_transaksi = '$id'");
while($Data = $DataProduk->fetch_assoc()):


$accepted = $koneksi->query("UPDATE transaksi SET konfirmasi_pembeli = 'True' WHERE id_transaksi = '$id' ");  
 endwhile;

echo "<script>location='index.php'</script>";
 ?>