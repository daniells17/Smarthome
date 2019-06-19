<h1>Ubah Sublink</h1>
<?php
	include "koneksi.php";
	$sublink_id = $_GET['sublink_id'];
	$query = "SELECT * FROM sublink WHERE sublink_id='".$sublink_id."'";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$data1=mysqli_query($connect, "SELECT * FROM sub_menu");
	$jsArray = "var data_menu = new Array();\n"; 
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data2 = mysqli_fetch_array($sql1);
?>
<?php $select=$data['submenu_id'];?>
<form method="post" action="proses_ubah_sublink.php?sublink_id=<?php echo $sublink_id; ?>" enctype="multipart/form-data">
  <table cellpadding="7">
	<tr>
		<td>Sub Menu</td>
		<td><select name="id_menu" onChange="changeValue(this.value)" style="width:150px;" title="Pilih katagori sub menu">
				<?php if(mysqli_num_rows($data1)) {?> 
				<?php while($row_menu= mysqli_fetch_array($data1)) {?>
				<?php if(trim($select) == trim($row_menu["submenu_id"])) {$a="selected";}else{$a = "";} ?>
				<option value="<?php echo $row_menu["submenu_id"]?>" <?php echo $a; ?> > <?php echo $row_menu["sub_menu"]?> </option>
				<?php $jsArray .= "data_menu['" . $row_menu['submenu_id'] . "'] = {submenu_id:'" . addslashes($row_menu['submenu_id']) . "'};\n"; } ?>
				<?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Sub Link</td>
		<?php 
			include "koneksi.php";
			$checked = explode(', ', $data['aktif']);
		?>
		<td><input type="text" name="sublink" value="<?php echo $data['sublink']; ?>" style="width:300px;" id="<?php echo $data2['keyboard']; ?>" title="Keterangan" required>
		</td>
	</tr>
		<tr>
		<td>Status</td>
		<td><select name="aktif" title="Plugin dapat diaktifkan atau tidak diaktifkan">
				<option selected value="<?php echo $data['aktif']; ?>"><?php echo $data['aktif']; ?></option>
				<option value="Enable">Enable</option>
				<option value="Disable">Disable</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Sub Link URL </td>
		<td><textarea cols="135" rows="2" name="sublink_url" title="Code IR/RF dari perangkat" required><?php echo $data['sublink_url']; ?></textarea></td>
	</tr>
	<tr>
		<td>Logo Terpasang </td>
		<td><img src="../images/icon/sublink/<?php echo $data['sublink_img']; ?>" height='80' width='80' style="background-color:#999999" title="Logo yang sedang terpakai"/></td>
	</tr>
	<tr>
		<td>Upload Logo</td>
		<td>
			<input type="checkbox" name="sublink_img" value="true"> <em>Ceklis jika ingin mengubah Logo</em><br>
			<input type="file" name="sublink_img" title="Logo/gambar submenu">
		</td>
	</tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="?page=sublink"><input type="button" value="Batal"></a>
</form>
<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(id_menu)
	{
      document.getElementById("menu_id").value = data_menu[id_menu].menu_id;
    };
</script>