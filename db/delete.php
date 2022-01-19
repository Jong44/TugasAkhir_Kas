<?php
include('koneksi.php');

if(isset($_GET['nisn'])){
	$nisn = $_GET['nisn'];
	$cek = mysqli_query($conn, "SELECT * FROM anggota WHERE nisn='$nisn'") or die(mysqli_error($conn));
	if(mysqli_num_rows($cek) > 0){
		$del1 = mysqli_query($conn, "DELETE FROM anggota WHERE nisn='$nisn'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="../tampilan/anggota.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="../tampilan/anggota.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="../tampilan/anggota.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="../tampilan/anggota.php";</script>';
}

?>
