<?php
include "./config/koneksi.php";
$err=@$_GET['err'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.bluewebtemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DoubleCEG - Smart Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="styles/style.css" type="text/css" />
<script src="scripts/elegant-press.js" type="text/javascript"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/java.js"></script>
<!-- Bagian js -->
	<script type="text/javascript" src="jsa/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="jsa/jquery.cycle2.min.js"></script>

<!-- Popup Keyboard -->
 <link rel="stylesheet" type="text/css" href="../css/jquery.ml-keyboard.css">
 <script src="../css/jquery-1.11.0.min.js"></script>
 <script src="../css/jquery.ml-keyboard.js"></script>
 <script src="../css/demo.js"></script>	
</head>
<body>
<?php
include "koneksi.php";
$query1 = "SELECT * FROM config";
$sql1 = mysqli_query($connect, $query1);
$data1 = mysqli_fetch_array($sql1);
?>
<br /><br /><br />
	<div id="loginbox">
	<div id="loginboxin">
    	
        <form action="login_periksa.php" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<h4 align="center">Login</h4><br><br>
          
          <tr valign="middle">
            <td width="33%">Username</td>
            <td width="6%">:</td>
            <td width="61%"><input name="username" placeholder="Username" type="text" size="25" maxlength="20" class="txt" id="<?php echo $data1['keyboard']; ?>" ></td>
          </tr>
          <tr valign="middle">
            <td>Password</td>
            <td>:</td>
            <td><input name="pass" placeholder="Password" type="password" size="25" maxlength="20" class="txt" id="<?php echo $data1['keyboard']; ?>"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>
			         <div class="wrapper">
            <span class="group-btn">     
                <input type="submit" name="button"  class="btn btn-primary btn-md" value="Sign In" />
            </span>
			<span class="group-btn">     
               <input type="reset" name="button"  class="btn btn-primary btn-md" value="Reset" />
            </span>
            </div>
			</td>
          </tr>
		  
        </table>
        </form>
    </div>
</div>
</body>
</html>