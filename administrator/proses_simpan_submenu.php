<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$menu_id = $_POST['data_menu'];
$sub_menu = $_POST['sub_menu'];
$favorit  = implode(', ', $_POST['favorit']);
$sub_ket = $_POST['sub_ket'];
$sub_link = addslashes($_POST['sub_link']);
$sub_on = addslashes($_POST['sub_on']);
$sub_off = addslashes($_POST['sub_off']);
$sub_logo = $_FILES['sub_logo']['name'];
$tmp = $_FILES['sub_logo']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$sub_logo;

// Set path folder tempat menyimpan fotonya
$path = "../images/icon/submenu/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO sub_menu VALUES('".$submenu_id."', '".$menu_id."', '".$sub_menu."', '".$favorit."', '".$sub_ket."', '".$sub_link."', '".$sub_on."', '".$sub_off."', '".$fotobaru."')";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=submenu"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='./?page=submenu'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar wajib disertakan.";
  echo "<br><a href='./?page=submenu'>Kembali Ke Form</a>";
}
?>