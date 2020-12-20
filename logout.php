<?php  
session_start();
unset($_SESSION['login']);
 echo "<script>alert('Logout Berhasil');</script>";
 echo "<script>location='index.php'</script>";
?>