<?php
include "fungsi/koneksi.php";
$page = $_GET[page];
$act = $_GET[act];
//if($page=='registrasi' and $act=='save')
//{
if(empty($_POST[id_history])){
 echo"<script>alert('Silahkan Lengkapi Data Anda Terlebih Dahulu !');window.location.href='media.php?page=laporandiskusi'</script>";
}else{
mysql_query("insert into history(id_history,tgl_history,pimpinan,pembahasan,id_acount)
 value('$_POST[id_history]','$_POST[thn]-$_POST[bln]-$_POST[tgl]','$_POST[pimpinan]','$_POST[pembahasan]','$_POST[id_acount]')");
 echo"<script>alert('data anggota diskusi telah tersimpan !');window.location.href='media.php?page=laporandiskusi'</script>";
}
//}
?>