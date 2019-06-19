<?php 
include "koneksi.php";
$query1 = "SELECT * FROM config";
$sql1 = mysqli_query($connect, $query1);
$data1 = mysqli_fetch_array($sql1);
?>
<script type='text/javascript' src='./js/jquery.min.js?ver=3.1.2'></script>
<script type="text/javascript" src="./js/custom.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript">
// Forms Validator
$j(function() {
   $j("#form1").validate();
});
</script>

<?php
$status=antiinjec(@$_GET['act']);

if ($status=="edit") { $id=antiinjec(@$_REQUEST['id']); }
if ($status=="tambah") { $id=0; }
	$query="select * from pro_pengguna where id_pengguna='$id'" ;
	$hquery=querydb($query);
	$dataquery=mysql_fetch_array($hquery);
?>
<h1><?php if($status=="edit") { echo "Ubah"; } elseif ($status=="tambah") { echo "Tambah"; } ?> Data Pengguna</h1>
<form action="aksi_pengguna.php?act=<?php echo"$status"; ?>" method="post" enctype="multipart/form-data" id="form1">
<table class="table table-striped" width="100%" cellpadding="10" cellspacing="0" border="0">
  <input type="hidden" name="id" value="<?php echo"$dataquery[id_pengguna]"; ?>" />
  <tr>
    <td width="17%">Nama Lengkap</td>
    <td width="2%">:</td>
    <td width="81%"><input name="nama" type="text" required size="50" maxlength="100" value="<?php echo"$dataquery[nama]"; ?>" class="required" id="<?php echo $data1['keyboard']; ?>"></td>
  </tr>
  <tr>
    <td>Tipe</td>
    <td>:</td>
    <td>
    <select name="tipe">
    	<option value="2" <?php if($dataquery['tipe']==2) { echo "selected"; } ?>>Petugas</option>
    	<option value="1" <?php if($dataquery['tipe']==1) { echo "selected"; } ?>>Administrator</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Username</td>
    <td>:</td>
    <td><input name="username" required type="text" size="30" maxlength="100" value="<?php echo"$dataquery[username]"; ?>" class="required" id="<?php echo $data1['keyboard']; ?>"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input name="pass1" required type="password" size="30" value="<?php echo"$dataquery[password]"; ?>" class="required" id="<?php echo $data1['keyboard']; ?>"></td>
  </tr>
  <tr>
    <td>Ulangi Password</td>
    <td>:</td>
    <td><input name="pass2" required type="password" size="30" value="<?php echo"$dataquery[password]"; ?>" class="required" id="<?php echo $data1['keyboard']; ?>"></td>
  </tr>
  <tr>
  	<td></td>
    <td></td>
    <td colspan="3"><input name="simpan" type="submit" value="Simpan" class="btn btn-primary"></td>
  </tr>
</table>
</form>