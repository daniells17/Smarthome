<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$menu_info = $_POST['menu_info'];
$ket_info = $_POST['ket_info'];
  $query = "INSERT INTO info VALUES('".$info_id."', '".$menu_info."', '".$ket_info."')";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=info"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='./?page=info'>Kembali Ke Form</a>";
  }
?>