<?php
session_start();
include "fungsi/koneksi.php";
$chat = mysql_query("SELECT * FROM chat,acount where chat.id_acount=acount.id_acount and chat.id_chat='$_GET[id]' or chat.id_acount='$_GET[id]'  order by chat.id asc ");
?>
<table border='0' width='100%'>
<?
while($c = mysql_fetch_array($chat)){
$time=substr($c[time],0,5);
    ?>
    <tr>
	<td  valign='top'><img  src='foto_acount/<?echo$c[foto];?>' width='28' height='28'/> 
	</td>
	<td>
	<p class='txt-jam'><?echo"$time";?></p> 
	<p class='nm-chat'><b><?echo"$c[nm_depan]";?> <?echo"$c[nm_belakang]";?></b></p> 
	<p class='text-chat'><?echo"$c[chat]";?></p> 
	
	</td>
	</td></tr>
  
<?	
}
// Deleting chats older than 5 minutes and users inactive for 30 seconds

$sql=mysql_query("DELETE FROM chat WHERE time < SUBTIME(NOW(),'0:0:3') ");

//if($sql){echo"sukses dihapus $jm";}else{echo"gagal";}
//mysql_query("DELETE FROM webchat_users WHERE last_activity < SUBTIME(NOW(),'0:0:30')");
?>
</table>