<h1>Ubah Menu Plugin </h1>
<?php
	include "koneksi.php";
	$plugin_id = $_GET['plugin_id'];
	$query = "SELECT * FROM plugin WHERE plugin_id='".$plugin_id."'";
	$query1 = "SELECT * FROM config";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<form method="post" action="proses_ubah_plugin.php?plugin_id=<?php echo $plugin_id; ?>" enctype="multipart/form-data">
  <table cellpadding="8">
	<tr>
		<td>Nama Plugin</td>
		<td><input type="text" name="plugin" required value="<?php echo $data['plugin']; ?>" style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Nama plugin"></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><input type="text" name="address" required value="<?php echo $data['address']; ?>" style="width:400px;" id="<?php echo $data1['keyboard']; ?>" title="Alamat url plugin"></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><select name="status" title="Plugin dapat diaktifkan atau tidak diaktifkan">
				<option selected value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
				<option value="Enable">Enable</option>
				<option value="Disable">Disable</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Logo Terpasang</td>
		<td><img src="../images/icon/menu/<?php echo $data['plugin_logo']; ?>" height='80' width='80' style="background-color:#999999" title="Logo yang sedang terpakai" /></td>
	</tr>
	<tr>
		<td>Upload Logo</td>
		<td>
			<input type="checkbox" name="plugin_logo" value="true"> <em>Ceklis jika ingin mengubah Logo</em><br>
			<input type="file" name="plugin_logo"  title="Logo/gambar plugin">
		</td>
	</tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="?page=plugin"><input type="button" value="Batal"></a>
</form>