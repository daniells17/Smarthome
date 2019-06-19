<?php
// Load file koneksi.php
include "koneksi.php";
$header = $_POST['header'];
$slogan = $_POST['slogan'];
$url = addslashes ($_POST['url']);
$akhir = addslashes ($_POST['akhir']);
$height_iframe = $_POST['height_iframe'];
$refresh = $_POST['refresh'];
$location = $_POST['location'];
$weather =  addslashes($_POST['weather']);
$keyboard = $_POST['keyboard'];
$nama_file = $_POST['nama_file'];

    $query = "SELECT * FROM config";
    $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

    $query = "UPDATE config SET header='".$header."', slogan='".$slogan."', url='".$url."', akhir='".$akhir."', height_iframe='".$height_iframe."', refresh='".$refresh."', location='".$location."', weather='".$weather."', keyboard='".$keyboard."', nama_file='".$nama_file."'";
    $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ./?page=config"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='?page=config'>Kembali Ke Form</a>";
    }
?>