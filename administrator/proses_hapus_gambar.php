<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data menu_id yang dikirim oleh index.php melalui URL
$id_file = $_GET['id_file'];
// Query untuk menampilkan data berdasarkan menu_id yang dikirim
$query = "SELECT * FROM upload WHERE id_file='".$id_file."'";
$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
// Cek apakah file fotonya ada di folder images
if(is_file("../images/background/".$data['nama_file'])) // Jika foto ada
  unlink("../images/background/".$data['nama_file']); // Hapus foto yang telah diupload dari folder images
// Query untuk menghapus data berdasarkan menu_id yang dikirim
$query2 = "DELETE FROM upload WHERE id_file='".$id_file."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query
if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ./?page=upload"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='?page=upload'>Kembali</a>";
}
?>