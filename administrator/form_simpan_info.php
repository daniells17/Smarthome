<?php 
	include "koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<h1>Tambah Teks Infomarsi</h1>
<form method="post" action="proses_simpan_info.php" enctype="multipart/form-data">
  <table cellpadding="8">
	<tr>
		<td>Info</td>
		<td><input type="text" name="menu_info" required style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Judul Informasi"></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><input type="text" name="ket_info" required style="width:400px;" id="<?php echo $data1['keyboard']; ?>" maxlength="120" title="Keterangan/Informasi"></td>
	</tr>
  </table> 
  <hr>
  <input align="left" type="submit" value="Simpan">
  <a href="?page=info"><input type="button" value="Batal"></a>
</form>