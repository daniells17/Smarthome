<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>DoubleCEG Smart Home</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>
<table width="1261" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="9" height="9"></td>
    <td width="228"></td>
    <td width="25"></td>
    <td width="228"></td>
    <td width="27"></td>
    <td width="228"></td>
    <td width="26"></td>
    <td width="228"></td>
    <td width="26"></td>
    <td width="228"></td>
    <td width="8"></td>
  </tr>
  <tr>
		<td height="81">&nbsp;</td>
		<td valign="top">
		<a href="./?page=mainmenu">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#003399">
		<tr>
			<td width="7" height="6"></td>
			<td width="64"></td>
			<td width="148"></td>
			<td width="9"></td>
        </tr>
    <tr>
        <td height="64"></td>
		<?php
			include "koneksi.php";
			$sql = "SELECT * FROM menu";
			$query = mysqli_query($connect, $sql);  // Eksekusi/Jalankan query dari variabel $query
			$count = mysqli_num_rows($query); // Ambil data dari hasil eksekusi $sql
		?>
		<td valign="top"><img src="../images/icon/dashboard/icon/menu64.png" width="64" height="64" /></td>
        <td align="right" valign="middel"><span class="style5"><?php echo $count; ?></span><br />
        <span class="style6">Mian Menu</span></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td height="7"></td>
          <td></td>
          <td></td>
          <td></td>
	</tr>
</table>
    </a></td>
    <td>&nbsp;</td>
    <td valign="top">
	  <a href="./?page=submenu">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900">
      <tr>
        <td width="7" height="6"></td>
          <td width="64"></td>
          <td width="148"></td>
          <td width="9"></td>
        </tr>
      <tr>
        <td height="64"></td>
<?php
  include "koneksi.php";
  $sql = "SELECT * FROM sub_menu";
  $query = mysqli_query($connect, $sql);  // Eksekusi/Jalankan query dari variabel $query
  $count = mysqli_num_rows($query); // Ambil data dari hasil eksekusi $sql
?>
    <td valign="top"><img src="../images/icon/dashboard/icon/list64.png" width="64" height="64" /></td>
    <td align="right" valign="middel"><span class="style5"><?php echo $count; ?></span><br />
        <span class="style6">Sub Menu</span></td>
          <td>&nbsp;</td>
      </tr>
        <td height="7"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </table>
    </a></td>
    <td>&nbsp;</td>
    <td valign="top">
	  <a href="./?page=plugin">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FF9900">
      <tr>
        <td width="7" height="6"></td>
          <td width="64"></td>
          <td width="148"></td>
          <td width="9"></td>
        </tr>
      <tr>
        <td height="64"></td>
<?php
  include "koneksi.php";
  $sql = "SELECT * FROM plugin";
  $query = mysqli_query($connect, $sql);  // Eksekusi/Jalankan query dari variabel $query
  $count = mysqli_num_rows($query); // Ambil data dari hasil eksekusi $sql
?>
      <td valign="top"><img src="../images/icon/dashboard/icon/plugin64.png" width="64" height="64" /></td>
          <td align="right" valign="middel"><span class="style5"><?php echo $count; ?></span><br />
            <span class="style6">Plugin</span></td>
          <td>&nbsp;</td>
        </tr>
            <tr>
        <td height="7"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </table>
    </a>	</td>
    <td>&nbsp;</td>
    <td valign="top">
	  <a href="./?page=ipcam">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900">
      <tr>
        <td width="7" height="6"></td>
          <td width="64"></td>
          <td width="148"></td>
          <td width="9"></td>
        </tr>
      <tr>
        <td height="64"></td>
<?php
include "koneksi.php";
$sql = "SELECT * FROM cam";
$query = mysqli_query($connect, $sql);  // Eksekusi/Jalankan query dari variabel $query
$count = mysqli_num_rows($query); // Ambil data dari hasil eksekusi $sql
?>  
        <td valign="top"><img src="../images/icon/dashboard/icon/webcam64.png" width="64" height="64" /></td>
          <td align="right" valign="middel"><span class="style5"><?php echo $count; ?></span><br />
            <span class="style6">IP Camera</span></td>
          <td>&nbsp;</td>
        </tr>
 
      <tr>
        <td height="7"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </table>
    </a></td>
    <td>&nbsp;</td>
    <td valign="top">
	  <a href="./?page=upload">
	<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#990000">
      <tr>
        <td width="7" height="6"></td>
          <td width="64"></td>
          <td width="148"></td>
          <td width="9"></td>
        </tr>
      <tr>
        <td height="64"></td>
          <?php
  include "koneksi.php";
  $sql = "SELECT * FROM upload";
  $query = mysqli_query($connect, $sql);  // Eksekusi/Jalankan query dari variabel $query
  $count = mysqli_num_rows($query); // Ambil data dari hasil eksekusi $sql
?>  
        <td valign="top"><img src="../images/icon/dashboard/icon/wallpaper64.png" width="64" height="64" /></td>
          <td align="right" valign="middel"><span class="style5"><?php echo $count; ?></span><br />
            <span class="style6">Backgroud</span></td>
          <td>&nbsp;</td>
        </tr>
      <tr>
        <td height="7"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
    </table>
    </a></td>
    <td>&nbsp;</td>
    <td valign="top">
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#990099">
	    <tr>
	      <td width="7" height="6"></td>
          <td width="64"></td>
          <td width="148"></td>
          <td width="9"></td>
        </tr>
	    <tr>
	      <td height="64"></td>
          <?php
  include "koneksi.php";
  $query = "SELECT * FROM pro_pengguna";
  $sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
?>
	      <td valign="top"><img src="../images/icon/dashboard/icon/admin64.png" width="64" height="64" /></td>
          <td align="right" valign="middel"><span class="style5"><?php echo $data['username']; ?></span><br />
            <span class="style6"><?php echo $data['nama']; ?></span></td>
          <td>&nbsp;</td>
        </tr>
	    <tr>
	      <td height="11"></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>