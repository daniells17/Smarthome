<?php
// Load file koneksi.php
include "koneksi.php";
$cam_id = $_GET['cam_id'];
$area = $_POST['area'];
$ip = $_POST['ip'];
    $query = "SELECT * FROM cam WHERE cam_id='".$cam_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
    $query = "UPDATE cam SET area='".$area."', ip='".$ip."' WHERE cam_id='".$cam_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=ipcam"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='?page=ipcam'>Kembali Ke Form</a>";
  }
?>