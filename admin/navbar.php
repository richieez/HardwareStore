<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <title>HardwareStore</title>
    <style type="text/css">
      .icon{
        font-size: 50px;
      }
      .linkPage{
        font-size: 50px;
      }
      .nextContent {
        width: 100px;
        height: 75px;
        float: left;
      }

      .nextContent:hover {
        opacity: 0.5;
        cursor: pointer;
      }


    </style>
  </head>
  <body>
    
<!-- navbar -->
     <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="https://www.freepnglogos.com/uploads/logo-tokopedia-png/berita-tokopedia-info-berita-terbaru-tokopedia-6.png" width="30" height="30" alt="" loading="lazy">
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lonceng" href="konfirmasi.php">Konfirmasi</i></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link lonceng" href="dataPenjualan.php">Penjualan</i></a>
      </li>
      
      <li class="nav-item">
        <?php if(!isset($_SESSION['loginAdmin'])) :?>
        <a href="loginAdmin.php" class="SearchButton btn btn-outline-primary my-2 my-sm-0 ml-2 ">Login</a>
        <?php endif; ?>
        <?php if (isset($_SESSION['loginAdmin'])) :?>
        <a href="logoutAdmin.php" class="SearchButton btn btn-outline-warning my-2 my-sm-0 ml-2 ">Logout</a>
        <?php endif; ?>
      </li>
    </ul>
    <form action="" method="GET" class="form-inline my-2 my-lg-0">
      <input type="text" name="keyword" size="50" placeholder="Masukan Keyword Pencarian" autocomplete="off" autofocus=""   class="keyword form-control mr-sm-2">
          <button type="submit" name="cari" class="SearchButton btn btn-outline-success my-2 my-sm-0">Search</button>
     </form>
    
  </div>
</nav>