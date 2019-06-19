<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>DoubleCEG Smart Home</title>
	<link rel="stylesheet" type="text/css" href="css/clock_style.css">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script type="text/javascript" src="css/date.js"></script> 
	<!--
		<link rel="stylesheet" href="administrator/css/bootstrap.min.css">
		<script src="css/jquery.min.js"></script>
		<script src="css/bootstrap.min.js"></script>
	-->
</head>
<?php
  include "administrator/koneksi.php";
  $query = "SELECT * FROM config";
  $sql = mysqli_query($connect, $query);
  $data = mysqli_fetch_array($sql);
?>
<body background="images/background/<?php echo $data['nama_file']; ?>">
<table width="100%" align="center" border='0'>
	<td height="10%"><a onClick="location.reload();"><img src="images/icon/smart-home32.png" /></a></td>
	<td height="10%" class="header"><?php echo $data['header']; ?></td>
	<td width="10%" align="left" class="slogan"><?php echo $data['slogan']; ?></td>
	<td width="70%" align="center" class="style1"></td>
	<td width:"10%" align="right" id="date">date</td>
    <td width="1%" align="center" class="style1">&nbsp;&nbsp;</td>
    <td width="10%" align="center" id="time">time</td>
</table>
<hr>
	<td colspan="5" rowspan="2" valign="top">
		<div class='hidden-scrollbar'>
			<div class='inner'>
				<div id="body">
					<iframe height="<?php echo $data['height_iframe']; ?>%" width="100%" src="file/menu.php" name="iframe_a" frameborder="0" valign="middle"></iframe> <!-- atur lebar tinggi iframe-->
				</div>
			</div>
		</div>
	</td>
<table width="3%" border="0" cellpadding="0" cellspacing="0" align="left" class="vertical-center">
<!--shortcut menu-->
    <tr>
        <td height="50" background="images/gray_small.png"><a href="file/menu.php" target="iframe_a"><img src="images/icon/fav/home32.png" height="25px" width="25px" class="zoom1"/></a></td>
    </tr>
    <tr>
        <td height="50" background="images/gray_small.png"><a href="file/favorit.php" target="iframe_a"><img src="images/icon/fav/star32.png" height="25px" width="25px" class="zoom1"/></a></td>
    </tr>
    <tr>
        <td height="50" background="images/gray_small.png"><a href="skype:daniel.gaoqi?call"><img src="images/icon/fav/facetime32.png" height="25px" width="25px" class="zoom1"/></a></td>
    </tr>
	<tr>
        <td height="50" background="images/gray_small.png"><a href="administrator/index.php" target="iframe_a"><img src="images/icon/fav/settings-32.png" height="25px" width="25px" class="zoom1"/></a></td>
    </tr>
</table>
<div class="static">
	<hr />
	<a class="weatherwidget-io disabled" href="<?php echo $data['weather']; ?>" data-label_1="<?php echo $data['location']; ?>" data-label_2="WEATHER" data-icons="Climacons Animated" data-theme="dark" data-basecolor="" data-shadow="#000000" data-textcolor="#ffffff" data-cloudcolor="#ebebeb" data-cloudfill="#ffffff" ><?php echo $data['location']; ?></a>
	<script>
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
	</script>
</div>
</body>
</html>