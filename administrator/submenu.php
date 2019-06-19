<h1>Submenu</h1>
<?php 
	include "koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
	$txtcari=antiinjec(@$_POST['txtcari']);
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
<table border="0" width="100%" align="center" class="table table-striped table-bordered" class="menu2">
	<tr>
		<th width='15%'>Main Menu</th>
		<th width='15%'>Sub Menu</th>
		<th width='70%'>Voice Commnet</th>
		<script type="text/javascript">
			function konTambah() 
			{
				window.location = "?page=form_simpan_submenu&act=tambah";
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
		$query  = "SELECT * FROM sub_menu JOIN menu s USING (menu_id) where (sub_menu LIKE '%$txtcari%') order by menu LIMIT $posisi,$batas";
		$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
		$no = $posisi+1;
		while($data = mysqli_fetch_array($sql))
		{ // Ambil semua data dari hasil eksekusi $sql
			echo "<tr>";
			echo "<td>&nbsp".$data['menu']."</td>";
			echo "<td>&nbsp".$data['sub_menu']."</td>";
			echo "<td>&nbsp".$data['sub_ket']."</td>";
			echo "<td align='center'><a href='?page=form_ubah_submenu&act=edit&submenu_id=".$data['submenu_id']."'><img src='../images/imgs/edit.png' width='20' title='Ubah Data'></a></td>";
			if($dataadm['tipe']==1) {  echo "<td align='center'><a onclick='return konfirmasi()' href='proses_hapus_submenu.php?submenu_id=".$data['submenu_id']."'><img src='../images/imgs/hapus.png' width='20' title='Hapus Data'></a></td>"; } //hanya admin
			echo "</tr>";
		}
	?>
</table>
<table align="center">
	<tr>
		<td>
		<?php
		$query2     = mysqli_query($connect, "select * from sub_menu where (sub_menu LIKE '%$txtcari%') order by sub_menu");
		$jmldata    = mysqli_num_rows($query2);
		$jmlhalaman = ceil($jmldata/$batas);
		echo "<br> Page : ";
		for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $halaman)
		{
			echo " <a href=\"?page=submenu&act&halaman=$i\">$i</a> | ";
		}
		else
		{ 
			echo " <b>$i</b> | "; 
		}
		echo "<p>Total : <b>$jmldata</b> Sub menu</p>"; 
		?> 
		</td>
	</tr>
</table>