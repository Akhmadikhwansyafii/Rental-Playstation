<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if(empty($_SESSION['USER']))
    {
        echo '<script>alert("Harap login !");window.location="index.php"</script>';
    }
    $id = $_GET['id'];
    $isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
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
</head><hr><br>
<body>
<div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <img src="admin/assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px;">
            <div class="card-body" style="background:#ddd">
            <h5 class="card-title"><?php echo $isi['merk'];?></h5>
            </div>
            <ul class="list-group list-group-flush">

            <?php if($isi['status'] == 'Tersedia'){?>
                <li class="list-group-item bg-primary text-white">
                    <i class="fa fa-check"></i> Tersedia
                </li>
            <?php }else{?>
                <li class="list-group-item bg-danger text-white">
                    <i class="fa fa-close"></i> Tidak Tersedia
                </li>
            <?php }?>
            <li class="list-group-item bg-dark text-white">
                <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ hari
            </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-8">
         <div class="card">
           <div class="card-body">
               <form method="post" action="koneksi/proses.php?id=booking">
                    <div class="form-group">
                      <label for="">KTP</label>
                      <input type="text" name="ktp" id="" required class="form-control" placeholder="KTP / NIK Anda">
                    </div> 
                    <div class="form-group">
                      <label for="">Nama</label>
                      <input type="text" name="nama" id="" required class="form-control" placeholder="Nama Anda">
                    </div> 
                    <div class="form-group">
                      <label for="">Alamat</label>
                      <input type="text" name="alamat" id="" required class="form-control" placeholder="Alamat">
                    </div> 
                    <div class="form-group">
                      <label for="">Telepon</label>
                      <input type="text" name="no_tlp" id="" required class="form-control" placeholder="Telepon">
                    </div> 
                    <div class="form-group">
                      <label for="">Tanggal Sewa</label>
                      <input type="date" name="tanggal" id="" required class="form-control" placeholder="Nama Anda">
                    </div> 
                    <div class="form-group">
                      <label for="">Lama Sewa</label>
                      <input type="number" name="lama_sewa" id="" required class="form-control" placeholder="Lama Sewa">
                    </div> 
                    <input type="hidden" value="<?php echo $_SESSION['USER']['id_login'];?>" name="id_login">
                    <input type="hidden" value="<?php echo $isi['id_mobil'];?>" name="id_mobil">
                    <input type="hidden" value="<?php echo $isi['harga'];?>" name="total_harga">
                    <hr/>
                    <?php if($isi['status'] == 'Tersedia'){?>
                        <button type="submit" class="btn btn-primary float-right">Booking Now</button>
                    <?php }else{?>
                        <button type="submit" class="btn btn-danger float-right" disabled>Booking Now</button>
                    <?php }?>
               </form>
           </div>
         </div> 
    </div>
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