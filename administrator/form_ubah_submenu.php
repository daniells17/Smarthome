<h1>Ubah Submenu</h1>
<?php
	include "koneksi.php";
	$submenu_id = $_GET['submenu_id'];
	$query = "SELECT * FROM sub_menu WHERE submenu_id='".$submenu_id."'";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$data1=mysqli_query($connect, "SELECT * FROM menu");
	$jsArray = "var data_menu = new Array();\n"; 
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data2 = mysqli_fetch_array($sql1);
?>
<?php $select=$data['menu_id'];?>
<form method="post" action="proses_ubah_submenu.php?submenu_id=<?php echo $submenu_id; ?>" enctype="multipart/form-data">
  <table cellpadding="7">
	<tr>
		<td>Main Menu</td>
		<td><select name="id_menu" onChange="changeValue(this.value)" style="width:150px;" title="Pilih katagori main menu">     
		        <?php if(mysqli_num_rows($data1)) {?> 						
		        <?php while($row_menu= mysqli_fetch_array($data1)) {?>
				<?php if(trim($select) == trim($row_menu["menu_id"])) {$a="selected";}else{$a = "";} ?>
		            <option value="<?php echo $row_menu["menu_id"]?>" <?php echo $a; ?> > <?php echo $row_menu["menu"]?> </option>
                <?php $jsArray .= "data_menu['" . $row_menu['menu_id'] . "'] = {menu_id:'" . addslashes($row_menu['menu_id']) . "'};\n"; } ?>
	            <?php } ?>
	        </select>
		</td>
	</tr>
	<tr>
		<td>Sub Menu</td>
		<?php 
			include "koneksi.php";
			$checked = explode(', ', $data['favorit']);
		?>
		<td><input type="text" name="sub_menu" required value="<?php echo $data['sub_menu']; ?>" style="width:150px;" id="<?php echo $data2['keyboard']; ?>" title="Nama submenu">
			<input type="checkbox" name="favorit[]" value="Favorit" title="Jika di ceklist submenu ini akan aktif dimenu favorit" <?php in_array ('Favorit', $checked) ? print "checked" : ""; ?> > Favorit<br>
		</td>
	</tr>
	<tr>
		<td>Voice Comment</td>
		<td><input type="text" name="sub_ket" value="<?php echo $data['sub_ket']; ?>" style="width:300px;" id="<?php echo $data2['keyboard']; ?>" title="Untuk menampilkan pesan voice, jika menggunakan Alexa atau Google home"></td>
	</tr>
	<tr>
		<td>Link Logo </td>
		<td><textarea cols="135" rows="4" name="sub_link" title="Code IR/RF dari perangkat"><?php echo $data['sub_link']; ?></textarea></td>
	</tr>
	<tr>
		<td>Link ON</td>
		<td><textarea cols="135" rows="4" name="sub_on" title="Code ON IR/RF dari perangkat"><?php echo $data['sub_on']; ?></textarea></td>
	</tr>
	<tr>
		<td>Link OFF </td>
        <td><textarea cols="135" rows="4" name="sub_off" title="Code OFF IR/RF dari perangkat"><?php echo $data['sub_off']; ?></textarea></td>
	</tr>
	<tr>
		<td>Logo Terpasang </td>
		<td><img src="../images/icon/submenu/<?php echo $data['sub_logo']; ?>" height='80' width='80' style="background-color:#999999" title="Logo yang sedang terpakai"/></td>
	</tr>
	<tr>
		<td>Upload Logo</td>
		<td>
			<input type="checkbox" name="sub_logo" value="true"> <em>Ceklis jika ingin mengubah Logo</em><br>
			<input type="file" name="sub_logo" title="Logo/gambar submenu">
		</td>
	</tr>
 </table>
	<hr>
	<input type="submit" value="Ubah">
	<a href="?page=submenu"><input type="button" value="Batal"></a>
</form>
<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(id_menu)
	{
      document.getElementById("menu_id").value = data_menu[id_menu].menu_id;
    };
</script>