<h1>Tambah Sublink</h1>
<?php
	include "koneksi.php";
	$data=mysqli_query($connect, "SELECT * FROM sub_menu");
	$jsArray = "var data_menu = new Array();\n"; 
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<form method="post" action="proses_simpan_sublink.php" enctype="multipart/form-data">
<table cellpadding="5">
	<tr>
		<td>Sub Menu</td>
		<td><select name="id_submenu" onChange="changeValue(this.value)" style="width:150px;" title="Pilih katagori Sub Menu">
		    <option>- Pilih -</option>
		    <?php if(mysqli_num_rows($data)) {?>
		    <?php while($row_menu= mysqli_fetch_array($data)) {?>
		        <option value="<?php echo $row_menu["submenu_id"]?>"> <?php echo $row_menu["sub_menu"]?> </option>
		        <?php $jsArray .= "data_menu['" . $row_menu['submenu_id'] . "'] = {submenu_id:'" . addslashes($row_menu['submenu_id']) . "'};\n"; } ?>
		        <?php } ?>
		        </select><input type="hidden" name="data_menu" id="submenu_id" value="1" size="3" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td>Sub Link</td>
		<td><input type="text" name="sublink" style="width:300px;" id="<?php echo $data1['keyboard']; ?>" title="Keterangan" required>
			<input type="hidden" name="aktif" id="aktif" value="Enable" size="6" readonly="readonly">
		
		</td>
	</tr>
	<tr>
		<td>Sub Link URL</td>
		<td><textarea cols="135" rows="2" name="sublink_url" title="Code IR/RF dari perangkat" required></textarea></td>
	</tr>
	<tr>
		<td>Logo</td>
		<td><input type="file" name="sublink_img" title="Logo/gambar submenu"></td>
	</tr>
</table>
  <hr>
  <input type="submit" value="Simpan">
  <a href="?page=sublink"><input type="button" value="Batal"></a>
  </form>
<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(id_submenu) {
      document.getElementById("submenu_id").value = data_menu[id_submenu].submenu_id;
    };
</script>