<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data submenu_id yang dikirim oleh form_ubah.php melalui URL
$sublink_id = $_GET['sublink_id'];
// Ambil Data yang Dikirim dari Form
$submenu_id = $_POST['id_menu'];
$sublink = $_POST['sublink'];
$sublink_url = addslashes($_POST['sublink_url']);
$aktif = $_POST['aktif'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['sublink_img'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $sublink_img = $_FILES['sublink_img']['name'];
  $tmp = $_FILES['sublink_img']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$sublink_img;
  
  // Set path folder tempat menyimpan fotonya
  $path = "../images/icon/sublink/".$fotobaru;

  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data berdasarkan submenu_id yang dikirim
    $query = "SELECT * FROM sublink WHERE sublink_id='".$sublink_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("../images/icon/sublink/".$data['sublink_img'])) // Jika foto ada
      unlink("../images/icon/sublink/".$data['sublink_img']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
    $query = "UPDATE sublink SET sublink_id='".$sublink_id."', submenu_id='".$submenu_id."', sublink='".$sublink."', sublink_url='".$sublink_url."', sublink_img='".$fotobaru."', aktif='".$aktif."' WHERE sublink_id='".$sublink_id."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ./?page=sublink"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='./?page=form_ubah_link'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='./?page=form_ubah_sublink'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
 $query = "UPDATE sublink SET sublink_id='".$sublink_id."', submenu_id='".$submenu_id."', sublink='".$sublink."', sublink_url='".$sublink_url."', aktif='".$aktif."' WHERE sublink_id='".$sublink_id."'";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ./?page=sublink"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='./?page=form_ubah_sublink'>Kembali Ke Form</a>";
  }
}
?>