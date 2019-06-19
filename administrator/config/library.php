<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$set_judul = "Pemilihan Pegawai Teladan";
$set_judul_sub = "Pemilihan Pegawai Teladan Menggunakan Metode SAW pada Perusahaan ABCDE";
$set_alternatif = "Pegawai";				  
				  

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                    "Juni", "Juli", "Agustus", "September", 
                    "Oktober", "November", "Desember");
							
function antiinjec($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
$tgl_full=date("Y-m-d H:i:s");

$sesinf_adminid=1;

function tgl_waktu($data){
	$tgl_waktu=date("d-m-Y H:i:s", strtotime($data));
	return $tgl_waktu;
}
?>
