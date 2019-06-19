<h1>Upload Gambar</h1>
	<form action="proses_upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file"><br />
		<input type="submit" name="upload" value="Upload">
	</form>	
<br /><br />
<h3>Backgroud</h3>
<?php
	include "koneksi.php";
	$batas   = 8;
	$halaman = @$_GET['halaman'];
	if(empty($halaman))
	{
		$posisi  = 0;
		$halaman = 1;
	}
	else
	{ 
		$posisi  = ($halaman-1) * $batas; 
	}
	$query = "SELECT * FROM upload order by id_file desc LIMIT $posisi,$batas"; // Query untuk menampilkan semua data
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	$no = $posisi+1;
	echo "<table border='0' cellpadding='3' cellspacing='0' valign='middle'>";
	echo "<td height='15'></td>";
	while($data = mysqli_fetch_array($sql))
	{ // Ambil semua data dari hasil eksekusi $sql 
		echo "<td><div align='left'>$data[nama_file]</div><img src='../images/background/$data[nama_file]' width='128' height='128'></a><br>
		<div align='left'><a href='proses_hapus_gambar.php?id_file=".$data['id_file']."'><img src='../images/imgs/hapus.png'></a></div></td>";
	}
?>
<table align="center">
	<tr>
		<td>
		<?php
		$query2     = mysqli_query($connect, "select * from upload");
		$jmldata    = mysqli_num_rows($query2);
		$jmlhalaman = ceil($jmldata/$batas);
		echo "<br> Page : ";
		for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $halaman)
		{
			echo " <a href=\"?page=upload&act&halaman=$i\">$i</a> | ";
		}
		else
		{ 
			echo " <b>$i</b> | "; 
		}
		echo "<p>Total : <b>$jmldata</b> Gambar</p>"; 
		?> 
		</td>
	</tr>
</table>	