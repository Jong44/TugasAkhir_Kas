<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: menu.php");
}
if(isset($_GET['nisn'])){
	$nisn = $_GET['nisn'];

	$select = mysqli_query($conn, "SELECT * FROM anggota WHERE nisn='$nisn'") or die(mysqli_error($conn));

	if(mysqli_num_rows($select) == 0){
		echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
		exit();
	}else{
		$data = mysqli_fetch_assoc($select);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.min.css">
</head>
<body>
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container-fluid">
        <a href="menu.php" class="navbar-brand"><h3 class="text2"><i class="fas fa-money-check"></i> UANG KASKU</h3></a>
    <form class="d-flex" action="../db/cari.php" method="post">
        <input class="form-control me-2" type="text" name="search" id="search" placeholder="Cari" aria-label="Cari">
        <button class="btn btn-outline-success" name="submit" id="submit" value ="cari" type="submit">Cari</button>
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
            <h3><i class="fas fa-user-friends m-3"></i>EDIT ANGGOTA</h3><hr>
            <br/>

		<?php
		if(isset($_POST['submit'])){
			$nama		  = $_POST['nama'];
			$alamat	= $_POST['alamat'];
		
			$sql = mysqli_query($conn, "UPDATE anggota SET nama='$nama', alamat='$alamat' WHERE nisn='$nisn'") or die(mysqli_error($conn));
		
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="../tampilan/anggota.php";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		<form action="edit.php?nisn=<?php echo $nisn;?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NISN</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nisn" class="form-control" size="4" value="<?php echo $data['nisn']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
				</div>
			</div>
	</br>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="../tampilan/anggota.php" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
