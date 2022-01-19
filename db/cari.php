<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: menu.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pencarian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand"><h3 class="text2"><i class="fas fa-money-check"></i> UANG KASKU</h3></a>
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
                <a class="nav-link active text-white" aria-current="page" href="menu.php"><i class="fas fa-tachometer-alt m-1"></i> Dashboard</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../tampilan/anggota.php"><i class="fas fa-user-friends m-1"></i> Daftar Anggota</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../tampilan/uang-masuk.php"><i class="fas fa-dollar-sign m-1"></i> Masuk</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../tampilan/uangkeluar.php"><i class="fas fa-hand-holding-usd m-1"></i> Keluar</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../tampilan/rekapitulasi.php"><i class="fas fa-wallet m-1"></i> Rekapitulasi</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../logout.php"><i class="fas fa-sign-out-alt m-1"></i> Keluar</a><hr class="bg-secondary">
            </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 p-2">
            <br/>
            <h3><i class="fas fa-search m-3"></i></i>HASIL PENCARIAN</h3><hr>
            <br/>
            <table class="table table-striped table-bordered">
            <br/>
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_POST['submit']) AND ($_POST['search'])){
                    $search = $_POST['search'];
                    $sql1 = mysqli_query($conn, "SELECT * FROM anggota WHERE nisn OR nama OR alamat LIKE '%".$search."%'") or die(mysqli_error($conn));
                    $search1 = mysqli_num_rows($sql1);
                    if ($search1>0){
                        $id = 1;
                        while($d1 = mysqli_fetch_array($sql1)){
                            echo '
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$d1['nisn'].'</td>
                                <td>'.$d1['nama'].'</td>
                                <td>'.$d1['alamat'].'</td>
                            </tr>
                            ';
                            $id++;
                        }
                    } else {
                        $sql2 = mysqli_query($conn, "SELECT * FROM uang_masuk WHERE nama OR tanggal OR jumlah LIKE '%".$search."%'") or die(mysqli_error($conn));
                        $search2 = mysql_num_rows($sql2);
                        if ($search2>0){
                        $id = 1;
                        while($d = mysqli_fetch_array($sql2)){
                            echo '
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$d['nama'].'</td>
                                <td>'.$d['tanggal'].'</td>
                                <td>'.$d['jumlah'].'</td>
                            </tr>
                            ';
                            $id++;
                            
                        }
                    } else {
                        $sql3 = mysqli_query($conn, "SELECT * FROM uang_keluar WHERE keterangan OR tanggal OR jumlah LIKE '%".$search."%'") or die(mysqli_error($conn));
                        $search3 = mysql_num_rows($sql3);
                        if ($search3>0){
                        $id = 1;
                        while($d = mysqli_fetch_array($sql3)){
                            echo '
                            <tr>
                                <td>'.$id.'</td>
                                <td>'.$d['keterangan'].'</td>
                                <td>'.$d['tanggal'].'</td>
                                <td>'.$d['jumlah'].'</td>
                            </tr>
                            ';
                            $id++;
                    }
                } else {
                    echo "Data yang kamu cari tidak ada";
                }
                } 
                }
            }
			?>
            </tbody>
            </table>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../db/dashboard.js"></script>
</body>
</html>
