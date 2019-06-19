<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data menu_id yang dikirim oleh index.php melalui URL
$info_id = $_GET['info_id'];
// Query untuk menampilkan data berdasarkan menu_id yang dikirim
$query = "SELECT * FROM info WHERE info_id='".$info_id."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
$query2 = "DELETE FROM info WHERE info_id='".$info_id."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ./?page=info"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='?page=info'>Kembali</a>";
}
?>