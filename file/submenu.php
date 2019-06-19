<?php
	include "../administrator/koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="refresh" content="<?php echo $data1['refresh']; ?>; URL=home.php">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>DoubleCEG Smart Home</title>
	<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<body>
	<script src="../css/331jquery.js"></script>
	<script src="../css/notif.js"></script>
	<table border="0" align="right" valign="middle">
		<td><a href="menu.php" target="iframe_a"><img src="../images/icon/return64.png" title="Home" longdesc="menu.php" height="40" width="40"/></a></td>
	</table>
<?php
	$menu_id = $_GET['menu'];
	$kolom=3; 
	$query = "SELECT * FROM sub_menu where menu_id='".$menu_id."'";
	$sql = mysqli_query($connect, $query);
	echo "<table width='100%' border='0' cellpadding='0' cellspacing='1' align='center'>";
	echo "<td height='10'><td>";
	echo "<tr>";
	$i=0;
	while($data=mysqli_fetch_array($sql)) 
	{
        if($i>=$kolom)
			{
                echo "<tr></tr>";
                $i=0;
            }
 			$i++;
		echo "<td align='center' height='80' width='80' background='../images/gray_small.png'><img src='../images/icon/submenu/".$data['sub_logo']."' onclick=".$data1['url']."".$data['sub_link']."".$data1['akhir']." width='50' height='50'></td>";
		echo "<td width='300' valign='top' align='right' background='../images/gray_small.png'><br><div align='right' class='menu'>$data[sub_menu]&nbsp&nbsp<br><span class='menu1'>$data[sub_ket]</span>&nbsp&nbsp<br><span class='style4'>";
  
		$sbmenu_id = $data["submenu_id"];
		$query2 = "SELECT * FROM sublink WHERE submenu_id ='".$sbmenu_id."' and  aktif='enable'";
		$sql2 = mysqli_query($connect, $query2);
		if($sql2)
		{
			while($data2=mysqli_fetch_array($sql2)) 
			{
				if(trim($data2['sublink']) != "") 
				{
					echo "<img src='../images/icon/sublink/".$data2['sublink_img']."' onclick=".$data1['url']."".$data2['sublink_url']."".$data1['akhir']." width='28' height='28' title=".$data2['sublink']."></span>&nbsp&nbsp&nbsp";
				}

			}
		}
		if(trim($data['sub_on']) != "")
		{
			echo "<img src='../images/icon/on.png' onclick=".$data1['url']."".$data['sub_on']."".$data1['akhir']." width='32' height='32'></span>&nbsp&nbsp&nbsp";
		}
		if(trim($data['sub_off']) != "") 
		{
			echo "<img src='../images/icon/off.png' onclick=".$data1['url']."".$data['sub_off']."".$data1['akhir']." width='32' height='32'></span>&nbsp&nbsp";
		}
		echo "</td>";
		echo "<td width='1%'></td>";
	}
	echo "</tr></table>";
?>
	<div id="toast"><div id="img">Ok</div>
	<div id="desc">A notification succes..</div></div>
</body>
</html>