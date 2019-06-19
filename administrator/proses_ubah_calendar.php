<?php
// Load file koneksi.php
include "koneksi.php";
$api = $_POST['api'];
$event = $_POST['event'];
    $query = "SELECT * FROM calendar";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    $query = "UPDATE calendar SET api='".$api."', event='".$event."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ./?page=calendar"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='?page=calendar'>Kembali Ke Form</a>";
    }
?>