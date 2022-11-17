<?php

require 'koneksi/koneksi.php';
if(empty($_SESSION['USER']))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTAL PLAYSTATION</title>
    <link rel="stylesheet" href="assets/app/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/icons/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/app/css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Rental Playstation</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="daftarmobil.php" class="nav-item nav-link active">Daftar Playstation</a>
                <?php if(!empty($_SESSION['USER'])){?>
                <li class="nav-item active">
                    <a class="nav-link active" href="history.php">History</a>
                </li>
            <?php }?>
            </div>
            
            <div class="navbar-nav ms-auto">
                <a href="login.php" class="nav-item nav-link active">Login</a>
                <?php if(!empty($_SESSION['USER'])){?>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user"> </i> Hallo, <?php echo $_SESSION['USER']['nama_pengguna'];?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');" href="logout.php">Logout</a>
                </li>
            </ul>
            <?php }?>
            </div>
        </div>
    </div>
</nav>
  <!-- Navbar -->

  <!-- Background image -->
  <div
    class="p-5 text-center bg-image"
    style="
      background-image: url('assets/image/ps4.webp');
      height: 770px;
      margin-top: 10px;
      background-size: cover;">
  </div>
</head><br>
<body>
</body>

<footer>
<div class="footer mt-4 bg-light text-black pt-3 pb-2">
      <div class="container">
        <center>
         <i class="fa fa-google" aria-hidden="true"></i>&nbsp;rentalplaystation.com
        </center>
      </div>
    </div>
</footer>
    <script src="dist/js/jquery.js"></script>
    <script src="assets/app/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dist/js/index.js"></script>

</html>