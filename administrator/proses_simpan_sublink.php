<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$submenu_id = $_POST['data_menu'];
$aktif = $_POST['aktif'];
$sublink = $_POST['sublink'];
$sublink_url = addslashes($_POST['sublink_url']);
$sublink_img = $_FILES['sublink_img']['name'];
$tmp = $_FILES['sublink_img']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$sublink_img;

// Set path folder tempat menyimpan fotonya
$path = "../images/icon/sublink/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO sublink VALUES('".$sublink_id."', '".$submenu_id."', '".$sublink."', '".$sublink_url."', '".$fotobaru."', '".$aktif."')";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=sublink"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='./?page=sublink'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar wajib disertakan.";
  echo "<br><a href='./?page=ssublink'>Kembali Ke Form</a>";
}
?>