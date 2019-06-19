<?php 
	include "koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<h1>Tambah Main Menu</h1>
<form method="post" action="proses_simpan_mainmenu.php" enctype="multipart/form-data">
<table cellpadding="8">
	<tr>
		<td>Main Menu</td>
		<td><input type="text" name="menu" required style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Nama main menu"></td>
	</tr>
	<tr>
		<td>Logo</td>
		<td><input type="file" name="menu_logo" title="Logo atau gambar untuk main menu"></td>
	</tr>
</table> 
  <hr>
  <input align="left" type="submit" value="Simpan">
  <a href="?page=mainmenu"><input type="button" value="Batal"></a>
</form>