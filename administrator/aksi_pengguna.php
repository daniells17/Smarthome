<?php
include "./config/library.php";
include "./config/koneksi.php";

opendb();
$id=antiinjec(@$_REQUEST['id']);
$status=antiinjec(@$_GET['act']);

$nama=antiinjec(@$_POST['nama']);
$tipe=antiinjec(@$_POST['tipe']);
$username=antiinjec(@$_POST['username']);
$pass1=antiinjec(@$_POST['pass1']);
$pass2=antiinjec(@$_POST['pass2']);

if($status=="tambah" ) {
	$qcek = "SELECT count(*) as jumlah FROM pro_pengguna WHERE username='$username'";
	$hcek = querydb($qcek);
	$dcek = mysql_fetch_array($hcek);
	if($dcek[0]==0 && $pass1!=$pass2) {
		?>
		<script language="JavaScript">alert('Password dan Ulangi Password tidak sama.'); history.go(-1); </script>
		<?php
	}
	elseif($dcek[0]==0 && $pass1==$pass2) {
		$query= "INSERT INTO pro_pengguna
			(nama, username, tipe, password)
			 VALUES ('$nama','$username','$tipe', '".md5($pass1)."')";
		querydb($query);
		header("location:./?page=pengguna");
	} else {
		?>
		<script language="JavaScript">alert('Username sudah digunakan.'); history.go(-1); </script>
        <?php
	}		
}
elseif($status=="edit" ) {
	$qcek = "SELECT count(*) as jumlah FROM pro_pengguna WHERE username='$username' AND id_pengguna<>'$id'";
	$hcek = querydb($qcek);
	$dcek = mysql_fetch_array($hcek);
	if($dcek[0]==0 && $pass1!=$pass2) {
		?>
		<script language="JavaScript">alert('Password dan Ulangi Password tidak sama.'); history.go(-1); </script>
		<?php
	}
	elseif($dcek[0]==0 && $pass1==$pass2 && strlen($pass1)<=20) {
		$query= "UPDATE pro_pengguna SET 
			     nama='$nama', username='$username', tipe='$tipe', password='".md5($pass1)."'
				 where id_pengguna='$id' ";
		querydb($query);
		header("location:./?page=pengguna");
	} elseif($dcek[0]==0 && $pass1==$pass2 && strlen($pass1)>20) {
		$query= "UPDATE pro_pengguna SET 
			     nama='$nama', username='$username', tipe='$tipe'
				 where id_pengguna='$id' ";
		querydb($query);
		header("location:./?page=pengguna");
	} else {
		?>
		<script language="JavaScript">alert('Username sudah digunakan.'); history.go(-1); </script>
        <?php
	}		
}
elseif($status=="hapus" ) {
	$query= "DELETE from pro_pengguna where id_pengguna='$id' ";
	querydb($query);
	header("location:./?page=pengguna");
}
closedb();
?>


