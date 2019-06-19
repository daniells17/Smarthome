<h1>Ubah Tesk Informasi</h1>
<?php
	include "koneksi.php";
	$info_id = $_GET['info_id'];
	$query = "SELECT * FROM info WHERE info_id='".$info_id."'";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<form method="post" action="proses_ubah_info.php?info_id=<?php echo $info_id; ?>" enctype="multipart/form-data">
  <table cellpadding="8">
	<tr>
		<td>Info</td>
		<td><input type="text" name="menu_info" required value="<?php echo $data['menu_info']; ?>" style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Judul Informasi"></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><input type="text" name="ket_info" required value="<?php echo $data['ket_info']; ?>" style="width:400px;" id="<?php echo $data1['keyboard']; ?>" maxlength="120" title="Keterangan/Informasi"></td>
	</tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="?page=info"><input type="button" value="Batal"></a>
</form>