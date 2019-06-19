<?php 
	include "koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<h1>Tambah IP Camera</h1>
<form method="post" action="proses_simpan_ipcam.php" enctype="multipart/form-data">
  <table cellpadding="8">
	<tr>
		<td>Area</td>
		<td><input type="text" name="area" required style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Area/lokasi camera"></td>
	</tr>
	<tr>
		<td>IP Address</td>
		<td><input type="text" name="ip" required style="width:120px;" id="<?php echo $data1['keyboard']; ?>" title="Alamat ip address ipcam"></td>
	</tr>
	<tr>
		<td></td>
		<td><em>masukan alamat IP pada ipcam terlebih dahulu pada url browser dan masukan user/password ipcam di url, contoh: http://192.168.0.2/Streaming/channels/1/picture</em></td>
	</tr>
  </table> 
  <hr>
  <input type="submit" value="Simpan">
  <a href="?page=ipcam"><input type="button" value="Batal"></a>
</form>