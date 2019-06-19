<h1>Ubah Main Menu</h1>
<?php
	include "koneksi.php";
	$menu_id = $_GET['menu_id'];
	$query = "SELECT * FROM menu WHERE menu_id='".$menu_id."'";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<form method="post" action="proses_ubah_mainmenu.php?menu_id=<?php echo $menu_id; ?>" enctype="multipart/form-data">
  <table cellpadding="8">
	<tr>
		<td>Nama Menu</td>
		<td><input type="text" name="menu" required value="<?php echo $data['menu']; ?>" style="width:200px;" id="<?php echo $data1['keyboard']; ?>" title="Nama main menu"></td>
	</tr>
	<tr>
		<td>Logo Terpasang</td>
		<td><img src="../images/icon/menu/<?php echo $data['menu_logo']; ?>" height='80' width='80' style="background-color:#999999" title="Logo yang sedang terpakai" /></td>
	</tr>
	<tr>
		<td>Upload Logo</td>
		<td>
			<input type="checkbox" name="menu_logo" value="true"> <em>Ceklis jika ingin mengubah Logo</em><br>
			<input type="file" name="menu_logo"  title="Logo atau gambar untuk main menu">
		</td>
	</tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="?page=mainmenu"><input type="button" value="Batal"></a>
</form>