<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$menu = $_POST['menu'];
$menu_logo = $_FILES['menu_logo']['name'];
$tmp = $_FILES['menu_logo']['tmp_name'];
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$menu_logo;
// Set path folder tempat menyimpan fotonya
$path = "../images/icon/menu/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO menu VALUES('".$menu_id."', '".$menu."', '".$fotobaru."')";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=mainmenu"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='./?page=mainmenu'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar wajib disertakan.";
  echo "<br><a href='./?page=mainmenu'>Kembali Ke Form</a>";
}
?>