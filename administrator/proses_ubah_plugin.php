<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data menu_id yang dikirim oleh form_ubah.php melalui URL
$plugin_id = $_GET['plugin_id'];
// Ambil Data yang Dikirim dari Form
$plugin = $_POST['plugin'];
$address = $_POST['address'];
$status = $_POST['status'];
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['plugin_logo'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $plugin_logo = $_FILES['plugin_logo']['name'];
  $tmp = $_FILES['plugin_logo']['tmp_name'];
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$plugin_logo;
  // Set path folder tempat menyimpan fotonya
  $path = "../images/icon/menu/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data berdasarkan menu_id yang dikirim
    $query = "SELECT * FROM plugin WHERE plugin_id='".$plugin_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("../images/icon/menu/".$data['plugin_logo'])) // Jika foto ada
      unlink("../images/icon/menu/".$data['plugin_logo']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE plugin SET plugin='".$plugin."', plugin_id='".$plugin_id."', plugin_logo='".$fotobaru."', address='".$address."', status='".$status."' WHERE plugin_id='".$plugin_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ./?page=plugin"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='?page=form_ubah_plugin'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='?page=form_ubah_plugin'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE plugin SET plugin='".$plugin."', address='".$address."', status='".$status."' WHERE plugin_id='".$plugin_id."'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=plugin"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='?page=form_ubah_plugin'>Kembali Ke Form</a>";
  }
}
?>