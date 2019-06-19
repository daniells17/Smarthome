<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data submenu_id yang dikirim oleh form_ubah.php melalui URL
$submenu_id = $_GET['submenu_id'];
// Ambil Data yang Dikirim dari Form
$menu_id = $_POST['id_menu'];
$sub_menu = $_POST['sub_menu'];
$sub_ket = $_POST['sub_ket'];
$sub_link = addslashes($_POST['sub_link']);
$sub_on = addslashes($_POST['sub_on']);
$sub_off = addslashes($_POST['sub_off']);

$favorit  = "";
if(isset($_POST['favorit'])){
	if(is_array($_POST['favorit'])){
		$favorit  = implode(', ', $_POST['favorit']);
	}
}


// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['sub_logo'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $sub_logo = $_FILES['sub_logo']['name'];
  $tmp = $_FILES['sub_logo']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$sub_logo;
  
  // Set path folder tempat menyimpan fotonya
  $path = "../images/icon/submenu/".$fotobaru;

  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data berdasarkan submenu_id yang dikirim
    $query = "SELECT * FROM sub_menu WHERE submenu_id='".$submenu_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("../images/icon/submenu/".$data['sub_logo'])) // Jika foto ada
      unlink("../images/icon/submenu/".$data['sub_logo']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE sub_menu SET submenu_id='".$submenu_id."', favorit='".$favorit."', menu_id='".$menu_id."', sub_menu='".$sub_menu."', sub_ket='".$sub_ket."', sub_link='".$sub_link."', sub_on='".$sub_on."', sub_off='".$sub_off."', sub_logo='".$fotobaru."' WHERE submenu_id='".$submenu_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ./?page=submenu"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='./?page=form_ubah_submenu'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='./?page=form_ubah_submenu'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
  $query = "UPDATE sub_menu SET submenu_id='".$submenu_id."', menu_id='".$menu_id."', sub_menu='".$sub_menu."', favorit='".$favorit."', sub_ket='".$sub_ket."', sub_link='".$sub_link."', sub_on='".$sub_on."', sub_off='".$sub_off."' WHERE submenu_id='".$submenu_id."'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=submenu"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='./?page=form_ubah_submenu'>Kembali Ke Form</a>";
  }
}
?>