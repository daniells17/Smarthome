<?php
	include("./config/library.php");
	include("./config/koneksi.php");

	opendb();
	$username=antiinjec(@$_POST['username']);
	$password=md5(antiinjec(@$_POST['pass']));

	$query="SELECT id_pengguna, username, tipe FROM pro_pengguna WHERE username='$username' AND password='$password'";
	$hasil=querydb($query);
	$userjum=mysql_fetch_array($hasil);
	if ($userjum['username']<>"") 
	{
		$_SESSION['ses_nama_pengguna']=$userjum['username'];
		$_SESSION['ses_tipe_pengguna']=$userjum['tipe'];
?>
		<script language="JavaScript">document.location='./'</script>
<?php
	} else {
?>
	<script language="JavaScript">
	document.location='login.php?err=1'</script>
<?php
	}
?>