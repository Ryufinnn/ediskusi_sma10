<div id='judul_kontent'><img src='images/registrasi.png' width='30' height='30'>Laporan Diskusi</div>
<table id='theList' border=1 width='100%'>
<tr><th width="4%">No.</th>
<th>Pemimpin Diskusi</th>
<th width="16%">anggota diskusi</th>
<th width="19%">pembahasan</th>
<th width="15%">Tanggal diskusi</th>
<th>&nbsp;</th>
<th>Aksi</th></tr>
<?php
$sql = mysql_query("select * from history order by id_history asc");
$no=1;
while($r = mysql_fetch_array($sql)){
if($r[aktif]==1){
$status="Online";
}else{
$status="Offline";
}
?>
<tr align="center">
<td class='td' align='center'><?echo$no;?></td>
<td class='td' width='23%'><?echo"$r[pimpinan]";?></td>
<align><td class='td'><?echo$r[id_acount];?></td></align>
<td class='td'><?echo$r[pembahasan];?></td>
<td class='td'><?echo$r[tgl_history];?></td>
<td class='td' align='center' width='2%'>&nbsp;</td>
<td class='td' align='center' width='21%'>
 <a  href='?page=registrasi&act=delete&id=<?echo$r[id_acount];?>' onclick="return confirm('Anda yakin untuk menghapus data ini ?')">
 <button style='width:60px;text-align:center;'>Delete</button></a> |
 <button onclick=location.href='?page=preview_registrasi&id=<?echo$r[id_acount];?>' style='width:60px;text-align:center;'>show</button></td>
</tr>
<?
$no++;
}
?>
</table>

<?
if($_GET[page]=='registrasi' and $_GET[act]=='delete'){
$sql=mysql_query("delete from acount where id_acount='$_GET[id]'");
echo"<script>window.location.href='?page=registrasi'</script>";
}

?>