<h1>Tambah Submenu</h1>
<?php
	include "koneksi.php";
	$data=mysqli_query($connect, "SELECT * FROM menu");
	$jsArray = "var data_menu = new Array();\n"; 
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<form method="post" action="proses_simpan_submenu.php" enctype="multipart/form-data">
  <table cellpadding="5">
	<tr>
		<td>Main Menu</td>
		<td><select name="id_menu" onChange="changeValue(this.value)" style="width:150px;" title="Pilih katagori main menu">
		    <option>- Pilih -</option>
		        <?php if(mysqli_num_rows($data)) {?>
		        <?php while($row_menu= mysqli_fetch_array($data)) {?>
		        <option value="<?php echo $row_menu["menu_id"]?>"> <?php echo $row_menu["menu"]?> </option>
		        <?php $jsArray .= "data_menu['" . $row_menu['menu_id'] . "'] = {menu_id:'" . addslashes($row_menu['menu_id']) . "'};\n"; } ?>
		        <?php } ?>
		    </select><input type="hidden" name="data_menu" id="menu_id" value="1" size="3" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td>Sub Menu</td>
		<td><input type="text" name="sub_menu" required style="width:150px;" id="<?php echo $data1['keyboard']; ?>" placeholder="Sub Menu" title="Nama submenu">
			<input type="checkbox" name="favorit[]" value="Favorit"  title="Jika di ceklist submenu ini akan aktif dimenu favorit"> Favorit
		</td>
	</tr>
	<tr>
		<td>Voice Commnet</td>
		<td><input type="text" name="sub_ket" style="width:300px;" id="<?php echo $data1['keyboard']; ?>" title="Untuk menampilkan pesan voice, jika menggunakan Alexa atau Google home"></td>
	</tr>
	<tr>
		<td> Link Logo </td>
		<td><textarea cols="135" rows="4" name="sub_off" title="Code IR/RF dari perangkat"></textarea></td>
	</tr>
	<tr>
		<td>Link ON</td>
		<td><textarea cols="135" rows="4" name="sub_link" title="Code ON IR/RF dari perangkat"></textarea></td>
	</tr>
	<tr>
		<td>Link OFF</td>
		<td><textarea cols="135" rows="4" name="sub_on" title="Code OFF IR/RF dari perangkat"></textarea></td>
	</tr>
	<tr>
		<td>Logo</td>
		<td><input type="file" name="sub_logo" title="Logo/gambar submenu"></td>
	</tr>
  </table>
  <hr>
  <input type="submit" value="Simpan">
  <a href="?page=submenu"><input type="button" value="Batal"></a>
</form>
<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(id_menu) {
      document.getElementById("menu_id").value = data_menu[id_menu].menu_id;
    };
</script>