<?php
	include "../administrator/koneksi.php";
	$query1 = "SELECT * FROM config";
	$sql1 = mysqli_query($connect, $query1);
	$data1 = mysqli_fetch_array($sql1);
?>
<html>
<head>
	<meta http-equiv="refresh" content="<?php echo $data1['refresh']; ?>; URL=../file/home.php">
	<meta charset='utf-8' />
	<link href='../css/fullcalendar.min.css' rel='stylesheet' />
	<link href='../css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='../lib/moment.min.js'></script>
	<script src='../lib/jquery.min.js'></script>
	<script src='../css/fullcalendar.min.js'></script>
	<script src='../css/gcal.min.js'></script>
<script>
<?php
	include "../administrator/koneksi.php";
	$query  = "SELECT * FROM calendar";
	$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
	while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
?>
	$(document).ready(function() {
    $('#calendar').fullCalendar({
      header:
	  {
        left: 'prev,next today',
        center: 'title',
        right: 'month,listYear'
      },
      displayEventTime: false, // don't show the time column in list view

      // THIS KEY WON'T WORK IN PRODUCTION!!!
      // To make your own Google API key, follow the directions here:
      // http://fullcalendar.io/docs/google_calendar/
      googleCalendarApiKey: '<?php echo $data['api']; ?>',

      // US Holidays
      events: '<?php echo $data['event']; ?>',
      eventClick: function(event) {
        // opens events in a popup window
        window.open(event.url, 'gcalevent', 'width=700,height=600');
        return false;
      },

      loading: function(bool) {
        $('#loading').toggle(bool);
      }

    });

  });
</script>
<style>
  body {
    margin: 2px 2px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }
  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }
  #calendar {
    max-width: 700px;
    margin: 0 auto;
  }
</style>
<?php
	}
?>
</head>
<body>
<table border="0" align="right" valign="middle">
	<td><a href="../file/menu.php" target="iframe_a"><img src="../images/icon/return64.png" alt="Home" longdesc="menu.php" height="40" width="40"/></a></td>
</table>
  <table align="center" width="50%" height="100%" border="0" cellpadding="10" cellspacing="10" background="../images/white.png">
    <tr>
      <td> <div id='loading'>loading...</div>
      <div id='calendar'></div></td>
    </tr>
  </table>
</body>
</html>