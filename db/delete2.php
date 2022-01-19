<?php

include('koneksi.php');

if(isset($_GET['keterangan'])){
	$keterangan = $_GET['keterangan'];

	$cek = mysqli_query($conn, "SELECT * FROM uang_keluar WHERE keterangan='$keterangan'") or die(mysqli_error($conn));

	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($conn, "DELETE FROM uang_keluar WHERE keterangan='$keterangan'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="../tampilan/uangkeluar.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="../tampilan/uangkeluar.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="../tampilan/uangkeluar.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="../tampilan/uangkeluar.php";</script>';
}

?>
