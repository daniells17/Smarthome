<script type="text/javascript" language="javascript">
function konfirmasi()
{
tanya=confirm("Anda yakin akan menghapus data ini?");
if (tanya==true) return true;
else return false;
}
</script>
<?php
include "./config/library.php";
include "./config/koneksi.php";

opendb();
$ses_nama_pengguna=@$_SESSION['ses_nama_pengguna'];
if($ses_nama_pengguna=="")
{ 
	?>
	<script language="JavaScript">document.location='login.php'</script>
	<?php 
} else { 
	$queryadm="SELECT * FROM pro_pengguna WHERE username='$ses_nama_pengguna'";
	$hasiladm=querydb($queryadm);
	$dataadm=mysql_fetch_array($hasiladm);
	
	if($dataadm['tipe']==1) { $tipe_pengguna="Administrator"; }
	elseif($dataadm['tipe']==2) { $tipe_pengguna="Petugas"; }
?>
<!DOCTYPE html>
<title>DoubleCEG - Smart Home</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="styles/elegant-press.css" type="text/css" />
<script src="scripts/elegant-press.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<!-- Bagian css -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<!-- Popup Keyboard -->
 <link rel="stylesheet" type="text/css" href="../css/jquery.ml-keyboard.css">
 <script src="../css/jquery-1.11.0.min.js"></script>
 <script src="../css/jquery.ml-keyboard.js"></script>
 <script src="../css/demo.js"></script>	
</head>
<body>
<?php include "menu.php";?>
<div class="main-container">
  <div style="width:100%" class="container1">
    <div class="box">
    	<?php
			$page=antiinjec(@$_GET['page']);		
			if($page=="pengguna" && $dataadm['tipe']==1){ include "data_pengguna.php"; }
			elseif($page=="pengguna-input" && $dataadm['tipe']==1){ include "input_pengguna.php"; }
			//Main Menu
			elseif($page=="mainmenu" && $dataadm['tipe']==1){ include "mainmenu.php"; }
			elseif($page=="mainmenu" && $dataadm['tipe']==2){ include "mainmenu.php"; }
			elseif($page=="form_simpan_mainmenu" && $dataadm['tipe']==1){ include "form_simpan_mainmenu.php"; }
			elseif($page=="form_simpan_mainmenu" && $dataadm['tipe']==2){ include "form_simpan_mainmenu.php"; }			
			elseif($page=="form_ubah_mainmenu" && $dataadm['tipe']==1){ include "form_ubah_mainmenu.php"; }
			elseif($page=="form_ubah_mainmenu" && $dataadm['tipe']==2){ include "form_ubah_mainmenu.php"; }
			//Sub Menu
			elseif($page=="submenu" && $dataadm['tipe']==1){ include "submenu.php"; }
			elseif($page=="submenu" && $dataadm['tipe']==2){ include "submenu.php"; }
			elseif($page=="form_simpan_submenu" && $dataadm['tipe']==1){ include "form_simpan_submenu.php"; }
			elseif($page=="form_simpan_submenu" && $dataadm['tipe']==2){ include "form_simpan_submenu.php"; }			
			elseif($page=="form_ubah_submenu" && $dataadm['tipe']==1){ include "form_ubah_submenu.php"; }
			elseif($page=="form_ubah_submenu" && $dataadm['tipe']==2){ include "form_ubah_submenu.php"; }
			//Sub Link
			elseif($page=="sublink" && $dataadm['tipe']==1){ include "sublink.php"; }
			elseif($page=="sublink" && $dataadm['tipe']==2){ include "sublink.php"; }
			elseif($page=="form_simpan_sublink" && $dataadm['tipe']==1){ include "form_simpan_sublink.php"; }
			elseif($page=="form_simpan_sublink" && $dataadm['tipe']==2){ include "form_simpan_sublink.php"; }			
			elseif($page=="form_ubah_sublink" && $dataadm['tipe']==1){ include "form_ubah_sublink.php"; }
			elseif($page=="form_ubah_sublink" && $dataadm['tipe']==2){ include "form_ubah_sublink.php"; }
			//Plugin
			elseif($page=="plugin" && $dataadm['tipe']==1){ include "plugin.php"; }
			elseif($page=="plugin" && $dataadm['tipe']==2){ include "plugin.php"; }
			elseif($page=="form_simpan_plugin" && $dataadm['tipe']==1){ include "form_simpan_plugin.php"; }
			elseif($page=="form_simpan_plugin" && $dataadm['tipe']==2){ include "form_simpan_plugin.php"; }			
			elseif($page=="form_ubah_plugin" && $dataadm['tipe']==1){ include "form_ubah_plugin.php"; }
			elseif($page=="form_ubah_plugin" && $dataadm['tipe']==2){ include "form_ubah_plugin.php"; }
			//IP Cam
			elseif($page=="ipcam" && $dataadm['tipe']==1){ include "ipcam.php"; }
			elseif($page=="ipcam" && $dataadm['tipe']==2){ include "ipcam.php"; }
			elseif($page=="form_simpan_ipcam" && $dataadm['tipe']==1){ include "form_simpan_ipcam.php"; }
			elseif($page=="form_simpan_ipcam" && $dataadm['tipe']==2){ include "form_simpan_ipcam.php"; }			
			elseif($page=="form_ubah_ipcam" && $dataadm['tipe']==1){ include "form_ubah_ipcam.php"; }
			elseif($page=="form_ubah_ipcam" && $dataadm['tipe']==2){ include "form_ubah_ipcam.php"; }			
			//calendar
			elseif($page=="calendar" && $dataadm['tipe']==1){ include "form_ubah_calendar.php"; }
			//Config
			elseif($page=="upload" && $dataadm['tipe']==1){ include "upload.php"; }				
			elseif($page=="config" && $dataadm['tipe']==1){ include "form_ubah_config.php"; }
			elseif($page=="config" && $dataadm['tipe']==2){ include "form_ubah_config.php"; }
			//info
			elseif($page=="info" && $dataadm['tipe']==1){ include "info.php"; }
			elseif($page=="info" && $dataadm['tipe']==2){ include "info.php"; }
			elseif($page=="form_simpan_info" && $dataadm['tipe']==1){ include "form_simpan_info.php"; }
			elseif($page=="form_simpan_info" && $dataadm['tipe']==2){ include "form_simpan_info.php"; }			
			elseif($page=="form_ubah_info" && $dataadm['tipe']==1){ include "form_ubah_info.php"; }
			elseif($page=="form_ubah_info" && $dataadm['tipe']==2){ include "form_ubah_info.php"; }
			//Informasi
			elseif($page=="informasi" && $dataadm['tipe']==1){ include "informasi.php"; }				
			elseif($page=="informasi" && $dataadm['tipe']==2){ include "informasi.php"; }				
			
			else { include "home.php"; }
		?>
      <div class="clear"></div>
    </div>
  </div>
<footer>
   <p class="tagline_left"><center><b><i><font color="#000000">Developed By <b>DoubleCEG</b> @<SCRIPT LANGUAGE="Javascript">
     var now = new Date();
     document.write(now.getFullYear());
     </SCRIPT>
     </font></i></b></center>
   </p>
</footer>
</div>
    </body>
</html>
<?php closedb(); } ?>