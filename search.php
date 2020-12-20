<?php



function searching($keyword) {
  include 'koneksi.php';



//$keyword = $_GET['keyword'];





  //$rows = [];

  $query= $koneksi->query("SELECT * FROM item WHERE nama_produk LIKE '%$keyword%' OR kategori_produk LIKE '%$keyword%'");



 /* while ($row = $query->fetch_assoc()) {
    $rows[]=$row;
  }
 */ $rows = $query;
 


return $rows;
  } ?>
 
 

