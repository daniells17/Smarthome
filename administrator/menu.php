<div style="width:100%" class="container1">
 <div class="box">
 <div style="margin-left:0%"class="main-container">
  <div  class="btn-group btn-breadcrumb">
	<ul class="nav navbar-nav">
      <li><a href="./" class="btn btn-primary">Beranda</a></li>
        <?php if($dataadm['tipe']==1) { ?>
      <li><a href="?page=pengguna" class="btn btn-primary">Pengguna</a></li>
      <li><a href="?page=mainmenu" class="btn btn-primary">Menu</a></li>
      <li><a href="?page=submenu" class="btn btn-primary">Submenu</a></li>
      <li><a href="?page=sublink" class="btn btn-primary">Sub Link</a></li>
      <li><a href="?page=plugin" class="btn btn-primary">Plugin</a></li>
      <li><a href="?page=ipcam" class="btn btn-primary">IP Camera</a></li>
      <li><a href="?page=calendar" class="btn btn-primary">Calendar</a></li>
      <li><a href="?page=config" class="btn btn-primary">Config</a></li>
      <li><a href="?page=upload" class="btn btn-primary">Upload</a></li>
      <li><a href="?page=info" class="btn btn-primary">Info Teks</a></li>
      <li><a href="?page=informasi" class="btn btn-primary">Informasi</a></li>
      <li><a href="logout.php" class="btn btn-primary">Keluar</a></li>
	    <?php } ?>
	   
	   <?php if($dataadm['tipe']==2) { ?>
      <li><a href="?page=mainmenu" class="btn btn-primary">Menu</a></li>
      <li><a href="?page=submenu" class="btn btn-primary">Submenu</a></li>
      <li><a href="?page=sublink" class="btn btn-primary">Sub Link</a></li>
      <li><a href="?page=plugin" class="btn btn-primary">Plugin</a></li>	  
      <li><a href="?page=ipcam" class="btn btn-primary">IP Camera</a></li>
      <li><a href="?page=config" class="btn btn-primary">Config</a></li>
      <li><a href="?page=info" class="btn btn-primary">Info Teks</a></li>  
      <li><a href="?page=infomasi" class="btn btn-primary">Informasi</a></li>
      <li><a href="logout.php"class="btn btn-primary">Keluar</a></li>
	    <?php } ?>
    </ul>
  </div>
</div>