<!DOCTYPE html>
<title>DoubleCEG - Smart Home</title>
<meta charset="utf-8" />
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<h1>Upload Gambar</h1>
<?php 
mysql_connect("localhost","root","");
mysql_select_db("doubleceg");
		if($_POST['upload']){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, '../images/background/'.$nama);
					$query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
					if($query){
						echo 'FILE BERHASIL DI UPLOAD';
					}else{
						echo 'GAGAL MENGUPLOAD GAMBAR';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		?>
		<br/>
		<br/>
		<div class="main-container" align="left">
		<a href="index.php?page=upload" class="table table-striped table-bordered">Upload Lagi</a>
		</div>
		<br/>
		<br/>
  <?php
  include 'koneksi.php';
  $kolom=11; 
  $query = "SELECT * FROM upload order by id_file Desc LIMIT 1"; // Query untuk menampilkan semua data
  $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
  echo "<table border='0' cellpadding='3' cellspacing='0' valign='middle'>";
  echo "<td height='15'></td>";
  echo "<tr>";
  $i=0;
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
     if($i>=$kolom)
				 {
                   echo "<tr></tr>";
                   $i=0;
                 }
 	 			$i++;      
echo "<td><div align='left'>$data[nama_file]</div><img src='../images/background/$data[nama_file]' width='128' height='128'></a><br><div align='left' ><a href='proses_hapus_gambar.php?id_file=".$data['id_file']."'><img src='../images/imgs/hapus.png'></a></div></td>";
}
?>
</body>
</html>