<?php
	include "../administrator/koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="<?php echo $data1['refresh']; ?>; URL=../file/home.php">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>DoubleCEG Smart Home</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body class="style2">
<?php
	include "../administrator/koneksi.php";
	$batas   = 1;
	$halaman = @$_GET['halaman'];
	if(empty($halaman))
	{
		$posisi  = 0;
		$halaman = 1;
	}
	else
	{ 
		$posisi  = ($halaman-1) * $batas; 
	}
	$query  = "SELECT * FROM cam order by area LIMIT $posisi,$batas";
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	$no = $posisi+1;
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
?>
<table border="0" align="right" valign="middle" >
	<td><a href="../file/menu.php" target="iframe_a"><img src="../images/icon/return64.png" height="40" width="40"/></a></td>
</table>
<table width="80" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<!--masukan alamat ip cam terlebih dahulu dan masukan user/pass ipcamnya di url http://192.168.0.X/Streaming/channels/1/picture -->
		<td width="80" valign="top" align="center"><div align="center" class="menu"><img src="http://<?php echo $data['ip']; ?>/Streaming/channels/1/picture" height="466" width="697" onload="if(typeof(this.imgsrc) == 'undefined') this.imgsrc = this.src; this.src = this.imgsrc + '?time=' + new Date().getTime();" onerror="this.onload()" /><br /><?php echo $data['area']; ?></td></div></td>
	</tr>
</table>
<?php
	}
?>
<?php
	$query2     = mysqli_query($connect, "select * from cam");
	$jmldata    = mysqli_num_rows($query2);
	$jmlhalaman = ceil($jmldata/$batas);
	echo "<div align='center' class='menu'>";
	echo "<br> Page : ";
	for($i=1;$i<=$jmlhalaman;$i++)
	if ($i != $halaman)
	{
      echo "<a href=\"ipcam.php?halaman=$i\">$i</a> | ";
    }
	else
	{ 
      echo "<b>$i</b> | "; 
    }
      echo "<p>Total : <b>$jmldata</b> IP Camera</p>"; 
	  echo "</div>";
?> 
</body>
</html>