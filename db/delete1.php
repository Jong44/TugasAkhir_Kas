<?php

include('koneksi.php');

if(isset($_GET['nama'])){
	$nama = $_GET['nama'];

	$cek = mysqli_query($conn, "SELECT * FROM uang_masuk WHERE nama='$nama'") or die(mysqli_error($conn));

	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($conn, "DELETE FROM uang_masuk WHERE nama='$nama'") or die(mysqli_error($conn));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="../tampilan/uang-masuk.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="../tampilan/uang-masuk.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="../tampilan/uang-masuk.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="../tampilan/uang-masuk.php";</script>';
}

?>
