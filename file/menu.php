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
<?php
	include "../administrator/koneksi.php";
	$kolom=6; 
	$query = "SELECT * FROM menu";
	$sql = mysqli_query($connect, $query);
	echo "<table border='0' cellpadding='20' cellspacing='15' align='center' valign='middle' class='menu'>";
	echo "<td height='105'></td>";
	echo "<tr>";
	$i=0;
	while($data = mysqli_fetch_array($sql))
	{
		if($i>=$kolom)
			{
                echo "<tr></tr>";
                $i=0;
            }
 	 		$i++;    
		echo "<td height='50' background='../images/gray_small.png'><a href='submenu.php?menu=".$data['menu_id']."'><img src='../images/icon/menu/$data[menu_logo]' class='zoom' width='80' height='80'></a><br><br><div align='center'>$data[menu]</div></td>";
	}
?>
<?php
	include "../administrator/koneksi.php";
	$kolom1=6; 
	$query1 = "SELECT * FROM plugin where status='Enable'";
	$sql1 = mysqli_query($connect, $query1);
	$i=0;
	while($data1 = mysqli_fetch_array($sql1))
	{
		if($i>=$kolom1)
			{
                echo "<tr></tr>";
                $i=0;
            }
 	 		$i++;      
		echo "<td height='50' background='../images/gray_small.png'><a href='".$data1['address']."'><img src='../images/icon/menu/$data1[plugin_logo]' class='zoom' width='80' height='80'></a><br><br><div align='center'>$data1[plugin]</div></td>";
	}
?>
</body>
</html>