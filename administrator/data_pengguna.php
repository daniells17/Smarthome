<h1>Data Pengguna</h1>
<?php 
include "koneksi.php";
$query1 = "SELECT * FROM config";
$sql1 = mysqli_query($connect, $query1);
$data1 = mysqli_fetch_array($sql1);
$txtcari=(@$_POST['txtcari']);
?>
<form method="post" action="#" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="9%">Pencarian :</td>
    <td width="14%"><input name="txtcari" type="text" size="30" value="<?php echo"$txtcari"; ?>" id="<?php echo $data1['keyboard']; ?>"/></td>
    <td width="77%"><input name="" type="submit" value="Cari" class="btn btn-primary"/></td>
  </tr>
</table>
</form>
<table class="table table-striped table-bordered"width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr>
  	<th width="4%">No.</th>
    <th width="19%">Nama Lengkap</th>
    <th width="13%">Username</th>
    <th width="59%">Tipe</th>
	<script type="text/javascript">
    function konTambah() {
            window.location = "?page=pengguna-input&act=tambah";
    }
    </script>
    <th width="5%" align="center"><input type='button' class='btn btn-primary' value='Tambah' onclick="konTambah()"></th>
  </tr>
<?php
$halaman=@$_GET['halaman'];
$perhalaman=5;
$query_part ="SELECT id_pengguna, nama, username, tipe
        	  FROM pro_pengguna
			  WHERE (nama LIKE '%$txtcari%')";
$hasil_part = querydb($query_part);
$jmlhalaman_part = ceil(mysql_num_rows($hasil_part)/$perhalaman);

if (!isset($halaman))
{
$halaman=0;
}
else
{
$halaman=$halaman-1;
}
$halamannya = $halaman * $perhalaman;

$nomor=0;
$query="SELECT id_pengguna, nama, username, tipe
        	  FROM pro_pengguna
			  WHERE (nama LIKE '%$txtcari%') ORDER BY nama ASC LIMIT $halamannya, $perhalaman" ;
$hquery=querydb($query);
while ($dataquery=mysql_fetch_array($hquery)) {
$nomor=$nomor+1;
?>
<script type="text/javascript">
function konfirmasi<?php echo $dataquery[0]; ?>() {
	var answer = confirm("Anda yakin akan menghapus data ini?")
	if (answer){
		window.location = "aksi_pengguna.php?act=hapus&id=<?php echo"$dataquery[0]"; ?>";
	}
}
</script>
  <tr>
  	<td><?php echo"$nomor"; ?></td>
    <td><?php echo"$dataquery[nama]"; ?></td>
    <td><?php echo"$dataquery[username]"; ?></td>
    <td>
		<?php echo""; 
			if($dataquery['tipe']==1) { echo "Administrator"; }
			elseif($dataquery['tipe']==2) { echo "Petugas"; }
		?>
    </td>
    <td align="center">
    <a href="?page=pengguna-input&act=edit&id=<?php echo"$dataquery[0]"; ?>">
    <img src="../images/imgs/edit.png" width="20" alt="Ubah" border="0" title="Ubah Data" style="float:left;"/>
    </a>
    <img src="../images/imgs/hapus.png" width="20" alt="Hapus" border="0" title="Hapus Data" style="float:left; cursor:pointer;" onclick="konfirmasi<?php echo $dataquery[0]; ?>()"/>
    </td>
  </tr>
<?php
}
?>
</table>
<div style="margin-top:15px; padding-top:10px; clear:both; line-height:normal;">
		<div style="padding:3px; margin:1px; border:1px solid; border-color:#999999; background-color:#666666; color:#CCCCCC; float:left;">Hal :</div> 
	        <?php
				for($j=1;$j<($jmlhalaman_part+1);$j++)
			{
			?>
			<div style="padding:3px; margin:1px; border:1px solid; border-color:#77BBFF;
			<?php if (($halaman+1)==$j)
			{
				echo"background-color:#FFF";
			} 
			else 
			{
				echo"background-color:#B0D8FF"; 
			}
			?>; float:left;">
			<a href="?page=pengguna&halaman=<?php echo "$j"; ?>
				<?php 
					if($kat<>"")
				{ 
					echo "&kat=$kat"; 
				} 
				?>" 
				title="Halaman : <?php echo "$j"; ?>" style="text-decoration:none; color:#06C;">
				<?php echo "$j"; ?>
			</a>
			</div>
		<?php 
			}
		?>
</div>