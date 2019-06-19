<h1>Ubah Calendar</h1>
<?php
	include "koneksi.php";
	$query = "SELECT * FROM calendar";
	$sql = mysqli_query($connect, $query);
	$data = mysqli_fetch_array($sql);
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<form method="post" action="proses_ubah_calendar.php" enctype="multipart/form-data">
  <table cellpadding="8">
	<tr>
		<td>Api Key</td>
		<td><input type="text" name="api" value="<?php echo $data['api']; ?>" style="width:300px;" id="<?php echo $data1['keyboard']; ?>" title="Api Key dari google calender Anda"></td>
	</tr>
	<tr>
		<td>Event</td>
		<td><input type="text" name="event" value="<?php echo $data['event']; ?>" style="width:300px;" id="<?php echo $data1['keyboard']; ?>" title="Akun email Anda"></td>
	</tr>
  </table>
  <input type="submit" value="Ubah">
  <a href="?page=calendar"><input type="button" value="Batal"></a>
</form>