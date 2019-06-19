<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DoubleCEG Smart Home</title>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
* {
  box-sizing: border-box;
}

/* Position text in the middle of the page/image */
.bg-header {
  color: white;
  font-weight: bold;
  border: 0px solid #f1f1f1;
  position: absolute;
  font-size:18px;
  top: 5%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  padding: 20px;
  text-align: center;
}
.bg-pesan {
  color: white;
  font-weight: bold;
  border: 0px solid #f1f1f1;
  position: absolute;
  top: 20%;
  left: 42%;
  transform: translate(-50%, -50%);
  width: 80%;
  padding: 20px;
  text-align: left;
}
.circle{
  height:150px;
  width:150px;
  border-radius: 150px;
  background-image: url("../images/white.png");
  color: white;
  font-weight: bold;
  border: 0px solid #f1f1f1;
  position: absolute;
  font-size:18px;
  top: 48%;
  left: 20%;
  transform: translate(-50%, -50%);
  padding: 20px;
  text-align: center;
}
.bg-cuaca {
  color: white;
  font-weight: bold;
  border: 0px solid #f1f1f1;
  position: absolute;
  font-size:18px;
  top: 50%;
  left: 80%;
  transform: translate(-50%, -50%);
  width: 20%;
  padding: 20px;
  text-align: center;
}
.disabled {
			pointer-events: none;
			opacity:1;
		}
<style type="text/css">
	#conent-slider 
	{
		position: relative;
	}
</style>
<script type="text/javascript" src="../css/jquery-3.3.1.min.js"></script> <!-- untuk teks waktu -->
<script type="text/javascript" src="../css/jquery.cycle.all.js"></script> <!-- untuk teks waktu -->
<script type="text/javascript">
	$(document).ready(function() 
	{
		$('#content-slider').cycle(
			{
				fx: 'fade'
			});
	});
</script>
<link rel="stylesheet" type="text/css" href="../css/css.css">
</head>
<div class="bg-pesan" id="content-slider">
<?php
  include "../administrator/koneksi.php";
  $query = "SELECT * FROM info";
  $sql = mysqli_query($connect, $query);
  $query1 = "SELECT * FROM config";
  $sql1 = mysqli_query($connect, $query1);
  while($data1 = mysqli_fetch_array($sql1)){
  while($data = mysqli_fetch_array($sql)){
?>
	<div><font size="5">
	<?php
		echo $data['menu_info']; ?></font><br /><font size="3"><?php echo $data['ket_info']; ?></font>
	</div>
<?php
  }
?>
</div>
<a href="menu.php"><div class="circle"><img src="../images/icon/house64.png" class="zoom" /><p><font color="#FFFFFF">Smart Home</div><a>
<div class="bg-cuaca" "static"><?php echo $data1['location']; ?>
	<a class="weatherwidget-io disabled" href="<?php echo $data1['weather']; ?>" data-icons="Climacons Animated" data-mode="Current" data-days="3" data-theme="candy" data-basecolor="" data-shadow="" data-accent="" data-suncolor="#ffffff" data-cloudfill="#ffffff" data-raincolor="#ffffff" data-snowcolor="" ></a>
	<script>
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
	</script>
	<?php
		}
	?>
</div>
</body>
</html>