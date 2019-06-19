<h1>Ubah IP Camera</h1>
<?php
	include "koneksi.php";
	$cam_id = $_GET['cam_id'];
	$query = "SELECT * FROM cam WHERE cam_id='".$cam_id."'";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<form method="post" action="proses_ubah_ipcam.php?cam_id=<?php echo $cam_id; ?>" enctype="multipart/form-data">
  <table cellpadding="8">
		<tr>
			<td>Area</td>
			<td><input type="text" name="area" required value="<?php echo $data['area']; ?>" style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Area/lokasi camera"></td>
		</tr>
	<tr>
		<td>IP Address</td>
		<td><input type="text" name="ip" required value="<?php echo $data['ip']; ?>" style="width:120px;" id="<?php echo $data1['keyboard']; ?>" title="Alamat ip address ipcam"></td>
	</tr>
	<tr>
		<td>Login untuk pertama kali</td>
		<td>Klik terlebih dahulu sebelum digunakan <a href="http://<?php echo $data['ip']; ?>/Streaming/channels/1/picture"><?php echo $data['area']; ?></a></td>
	</tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="?page=ipcam"><input type="button" value="Batal"></a>
</form>