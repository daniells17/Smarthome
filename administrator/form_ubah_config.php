<h1>Ubah Config</h1>
<?php
	include "koneksi.php";
	$query = "SELECT * FROM config";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
?>
<form method="post" action="proses_ubah_config.php" enctype="multipart/form-data">
  <table cellpadding="8">
	<tr>
		<td>Header</td>
		<td><input type="text" name="header" required value="<?php echo $data['header']; ?>" style="width:200px;" id="<?php echo $data['keyboard']; ?>"  title="Menampilkan nama program Smarthome Anda"></td>
	</tr>
	<tr>
		<td>Slogan</td>
		<td><input type="text" name="slogan" required value="<?php echo $data['slogan']; ?>" style="width:200px;" id="<?php echo $data['keyboard']; ?>" title="Menampilkan teks disebelah nama program Smarthome"></td>
	</tr>
	<tr>
		<td>Awal URL</td>
		<td><input type="text" name="url"  size="150" required value="<?php echo $data['url']; ?>" id="<?php echo $data['keyboard']; ?>" title="Awalan alamat url dari kode IR/FR"></td>
	</tr>
	<tr>
		<td>Akhir URL</td>
		<td><input type="text" name="akhir" value="<?php echo $data['akhir']; ?>" style="width:200px;" id="<?php echo $data['keyboard']; ?>" title="Akhiran alamat url dari kode IR/FR"></td>
	</tr>
	<tr>
		<td>Skala Iframe</td>
		<td><input type="text" name="height_iframe" required value="<?php echo $data['height_iframe']; ?>" style="width:50px;" id="<?php echo $data['keyboard']; ?>"  title="Tinggi Iframe pada menu dalam persen"> %</td>
	</tr>
	<tr>
		<td>Refresh ke Halaman Utama </td>
		<td><input type="text" name="refresh" required value="<?php echo $data['refresh']; ?>" style="width:50px;" id="<?php echo $data['keyboard']; ?>" title="Untuk merefresh kehalaman utama dalam beberapa detik"> Detik</td>
	</tr>
	<tr>
		<td>Lokasi Cuaca</td>
		<td><input type="text" name="location" value="<?php echo $data['location']; ?>" style="width:200px;" id="<?php echo $data['keyboard']; ?>" title="Lokasi cuaca">
		</td>
	</tr>
	<tr>
		<td>Cuaca <br> kode script https://weatherwidget.io</td>
		<td><input type="text" name="weather" value="<?php echo $data['weather']; ?>" style="width:400px;" id="<?php echo $data['keyboard']; ?>" title="Alamat url dari https:\\weatherwidget.io yang didapat"></td>
	</tr>
	<tr>
	<td>Keyboard Virtual</td>
		<td>
			<select name="keyboard" title="Plugin dapat diaktifkan atau tidak diaktifkan">
				<option selected value="<?php echo $data['keyboard']; ?>"><?php echo $data['keyboard']; ?></option>
				<option value="example-1">example-1</option>
				<option value="Non Aktif">Non Aktif</option>
			</select>
		</td>
	</tr> 
	<tr>
		<td>Background</td>
		<td><select name="nama_file">
				<option><?php echo $data['nama_file']; ?></option>
				<?php
					mysql_connect("localhost", "root", "");
					mysql_select_db("doubleceg");
					$sql = mysql_query("SELECT * FROM upload ORDER BY nama_file ASC");
					if(mysql_num_rows($sql) != 0)
					{
						while($row = mysql_fetch_assoc($sql))
						{
							echo '<option>'.$row['nama_file'].'</option>';
						}
					}
				?>
			</select> 
		</td>
	</tr>
	<tr>
		<td></td>
		<td><em>Refresh halaman setelah melakukan pembaruan</em></td>
	</tr>
  </table>
	<input type="submit" value="Ubah">
	<a href="?page=config"><input type="button" value="Batal"></a>
</form>
<?php
	include "koneksi.php";
	$batas   = 7;
	$halaman = @$_GET['halaman'];
	if(empty($halaman))
	{
		$posisi  = 0;
		$halaman = 1;
	}
	else{ 
		$posisi  = ($halaman-1) * $batas; 
		}
	$query = "SELECT * FROM upload order by nama_file LIMIT $posisi,$batas"; // Query untuk menampilkan semua data
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	$no = $posisi+1;
	echo "<table border='0' cellpadding='3' cellspacing='0' valign='middle'>";
	echo "<td height='15'></td>";
	echo "<tr>";
	while($data = mysqli_fetch_array($sql))
	{ // Ambil semua data dari hasil eksekusi $sql 
		echo "<td align='left'><div>$data[nama_file]</div><img src='../images/background/$data[nama_file]' width='120' height='120'></a><br></td>";
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
		echo " <a href=\"./?page=config&act&halaman=$i\">$i</a> | ";
    }
	else{ 
		echo " <b>$i</b> | "; 
		}
    echo "<p>Total : <b>$jmldata</b> Gambar</p>"; 
?>
</td>
</tr>
</table> 