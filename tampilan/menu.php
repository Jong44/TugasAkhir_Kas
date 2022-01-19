<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: menu.php");
}
include '../db/tambahrekap.php';
$jumlah_anggota = mysqli_query ($conn,"SELECT * FROM anggota");
$jumlah_anggota = mysqli_num_rows($jumlah_anggota);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand"><h3 class="text2"><i class="fas fa-money-check"></i> UANG KASKU</h3></a>
        <form class="d-flex" action="../db/cari.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Cari">
        <button class="btn btn-outline-success" value ="cari" type="submit">Cari</button>
      </form>
    <div class="icon">
        <h4>
            <i class="fas fa-user-circle m-3"  data-toogle="tooltip" title="Profil"></i>
        </h4>
    </div>
    </div>
    </nav>
    <div class="row no-gutters">
        <div class="col-md-2 bg-dark pr-3 pt-4">
            <ul class="nav flex-column m-2 mb-5">
            <li class="nav-item">
                <a href="menu.php" class="nav-link active text-white" aria-current="page" href="menu.php"><i class="fas fa-tachometer-alt m-1"></i> Dashboard</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="anggota.php"><i class="fas fa-user-friends m-1"></i> Daftar Anggota</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="uang-masuk.php"><i class="fas fa-dollar-sign m-1"></i> Masuk</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="uangkeluar.php"><i class="fas fa-hand-holding-usd m-1"></i> Keluar</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="rekapitulasi.php"><i class="fas fa-wallet m-1"></i> Rekapitulasi</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../logout.php"><i class="fas fa-sign-out-alt m-1"></i> Keluar</a><hr class="bg-secondary">
            </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 p-2">
            <h3 class="text1"><?php echo "Selamat Datang, " . $_SESSION['username'] . "!"; ?></h3>
            <br/>
            <h3><i class="fas fa-tachometer-alt m-2"></i>DASHBOARD</h3><hr>
            <div class="row text-white">
            <div class="card bg-info m-4" style="width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon"><i class="fas fa-coins"></i></div>
                    <h5 class="card-title">JUMLAH KEUANGAN</h5>
                    <div class="display-4"><h1><?php echo 'Rp.'.$jumlh_total?></h1></div>
                    <a href="rekapitulasi.php"><p class="card-text text-white">Lihat Detail</p><i class="fas da-angle-double-right m-1"></i></a>
                </div>
            </div>
            <div class="card bg-success m-4" style="width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon"><i class="fas fa-user-friends"></i></div>
                    <h5 class="card-title">JUMLAH ANGGOTA</h5>
                    <div class="display-4"><?php echo $jumlah_anggota ?></div>
                    <a href="anggota.php"><p class="card-text text-white">Lihat Detail</p><i class="fas da-angle-double-right m-1"></i></a>
                </div>
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../db/dashboard.js"></script>
</body>
</html>