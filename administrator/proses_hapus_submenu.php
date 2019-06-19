<?php
include "koneksi.php";
// Ambil data submenu_id yang dikirim oleh index.php melalui URL
$submenu_id = $_GET['submenu_id'];
// Query untuk menampilkan data berdasarkan submenu_id yang dikirim
$query = "SELECT * FROM sub_menu WHERE submenu_id='".$submenu_id."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
// Cek apakah file fotonya ada di folder images
if(is_file("../images/icon/submenu/".$data['sub_logo'])) // Jika foto ada
  unlink("../images/icon/submenu/".$data['sub_logo']); // Hapus foto yang telah diupload dari folder images

// Query untuk menghapus data siswa berdasarkan submenu_id yang dikirim
$query2 = "DELETE FROM sub_menu WHERE submenu_id='".$submenu_id."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query

if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ./?page=submenu"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='?page=submenu'>Kembali</a>";
}
?>