<?php 
	include "koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<h1>Tambah Menu Plugin</h1>
<form method="post" action="proses_simpan_plugin.php" enctype="multipart/form-data">
<table cellpadding="8">
	<tr>
		<td>Menu Plugin</td>
		<td><input type="text" name="plugin" required style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Nama plugin"></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><input type="text" name="address" value="../plugin/" required style="width:400px;" id="<?php echo $data1['keyboard']; ?>" title="Alamat url plugin"></td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
			<select name="status" title="Plugin dapat diaktifkan atau tidak diaktifkan">
				<option selected value="Enable">Enable</option>
				<option value="Disable">Disable</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Logo</td>
		<td><input type="file" name="plugin_logo" title="Logo/gambar plugin"></td>
	</tr>
</table> 
  <hr>
  <input align="left" type="submit" value="Simpan">
  <a href="?page=plugin"><input type="button" value="Batal"></a>
</form>