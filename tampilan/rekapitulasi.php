<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: menu.php");
}
include '../db/tambahrekap.php';



?>

<!DOCTYPE html>
<html>
<head>
    <title>Rekapitulasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container-fluid">
        <a href="menu.php" class="navbar-brand"><h3 class="text2"><i class="fas fa-money-check"></i> UANG KASKU</h3></a>
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
                <a href="menu.php"class="nav-link active text-white" aria-current="page" href="menu.php"><i class="fas fa-tachometer-alt m-1"></i> Dashboard</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="anggota.php"><i class="fas fa-user-friends m-1"></i> Daftar Anggota</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="uang-masuk.php"><i class="fas fa-dollar-sign m-1"></i> Masuk</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="uangkeluar.php"><i class="fas fa-hand-holding-usd m-1"></i> Keluar</a><hr class="bg-secondary">
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
            <br/>
            <h3><i class="fas fa-wallet m-3"></i>REKAPITULASI</h3><hr>
            <br/>
            <table class="table table-striped table-bordered">
            <br/>
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Masuk</th>
                    <th scope="col">Keluar</th>
                    <th colspan="3" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
				$sql = mysqli_query($conn, "SELECT * FROM rekapitulasi") or die(mysqli_error($conn));
				if(mysqli_num_rows($sql) > 0){
					$id = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$id.'</td>
							<td>'.$data['tanggal'].'</td>
							<td>'.$data['jenis'].'</td>
                            <td>'.$data['masuk'].'</td>
                            <td>'.$data['keluar'].'</td>
                            <td><a href="../db/delete3.php?tanggal='.$data['tanggal'].'"><i class="fas fa-minus-circle bg-danger p-1 text-white rounded"></a></i></td>
						</tr>
						';
						$id++;
					}
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
                </tbody>
            <tbody>
            <?php
                echo'
                <tr>
                    <th colspan="3" scope="col">Jumlah Masuk</th>
                    <td>'.$hasil.'</td>
                </tr>
            
            ';
            
         
                echo'
                <tr>
                    <th colspan="3" scope="col">Jumlah Keluar</th>
                    <td>'.$hasill.'</td>
                </tr>
            
            ';
        
                echo'
                <tr>
                    <th colspan="3" scope="col">Total Keuangan</th>
                    <td>'.$jumlh_total.'</td>
                </tr>
            
            ';
            ?>
            </thead>
                </table>

        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../db/dashboard.js"></script>
</body>
</html>
