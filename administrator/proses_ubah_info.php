<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data menu_id yang dikirim oleh form_ubah.php melalui URL
$info_id = $_GET['info_id'];
// Ambil Data yang Dikirim dari Form
$menu_info = $_POST['menu_info'];
// Cek apakah user ingin mengubah fotonya atau tidak
$ket_info = $_POST['ket_info'];
    $query = "SELECT * FROM info WHERE info_id='".$info_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

  $query = "UPDATE info SET menu_info='".$menu_info."',ket_info='".$ket_info."' WHERE info_id='".$info_id."'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=info"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='?page=form_ubah_info'>Kembali Ke Form</a>";
  }
?>