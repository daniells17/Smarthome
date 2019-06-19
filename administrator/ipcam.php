<h1>IP Camera</h1>
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
	<table border="1" width="100%" align="center" class="table table-striped table-bordered">
		<tr>
			<th width='80%'>Area IP Cam</th>
			<th width='10%'>IP Address</th>
			<script type="text/javascript">
			function konTambah()
			{
				window.location = "?page=form_simpan_ipcam&act=tambah";
			}
			</script>
			<th colspan="2" width="5%" align="center"><input type='button' class='btn btn-primary' value='Tambah' onclick="konTambah()" title="Tambah Data"></th>
		</tr>
		<?php
			include "koneksi.php";
			$batas   = 5;
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
			$query  = "SELECT * FROM cam where (area LIKE '%$txtcari%') order by area LIMIT $posisi,$batas";
			$sql = mysqli_query($connect, $query);
			$no = $posisi+1;
			while($data = mysqli_fetch_array($sql))
			{
				echo "<tr>";
				echo "<td>&nbsp".$data['area']."</td>";
				echo "<td>&nbsp".$data['ip']."</td>";
				echo "<td align='center'><a href='?page=form_ubah_ipcam&act=edit&cam_id=".$data['cam_id']."'><img src='../images/imgs/edit.png' width='20' title='Ubah Data'></a></td>";
				if($dataadm['tipe']==1) {  echo "<td align='center'><a onclick='return konfirmasi()' href='proses_hapus_ipcam.php?cam_id=".$data['cam_id']."'><img src='../images/imgs/hapus.png' width='20' title='Hapus Data'></a></td>"; } //hanya admin
				echo "</tr>";
			}
		?>
	</table>
<table align="center">
	<tr>
		<td>
			<?php
			$query2     = mysqli_query($connect, "select * from cam where (area LIKE '%$txtcari%') order by area");
			$jmldata    = mysqli_num_rows($query2);
			$jmlhalaman = ceil($jmldata/$batas);
			echo "<br> Page : ";
			for($i=1;$i<=$jmlhalaman;$i++)
			if ($i != $halaman)
			{
				echo " <a href=\"?page=ipcam&act&halaman=$i\">$i</a> | ";
			}
			else
			{ 
				echo " <b>$i</b> | "; 
			}
			echo "<p>Total : <b>$jmldata</b> IP Camera</p>"; 
			?> 
		</td>
	</tr>
</table>