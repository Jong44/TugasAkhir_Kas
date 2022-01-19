<?php
include 'koneksi.php';


$jumlh = mysqli_query($conn,"SELECT SUM(jumlah) AS sum FROM uang_masuk");
        while($d=mysqli_fetch_assoc($jumlh)){
            $hasil = $d['sum'];
        }

$jumlhh = mysqli_query($conn,"SELECT SUM(jumlah) AS sum FROM uang_keluar"); 
        while($d=mysqli_fetch_assoc($jumlhh)){
            $hasill = $d['sum'];
        }

$jumlh_total = $hasil - $hasill; 
?>