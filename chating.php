<?php
session_start();
$user=mysql_query("select * from acount where id_acount='$_GET[id]'");
$r=mysql_fetch_array($user);
 // mysql_query("UPDATE acount set aktif='0' WHERE id_acount='$_SESSION[id_acount]'");
?>
 <div id='box-chat'>
 <div id='head-chat'><img class='foto_acount' src='foto_acount/<?echo$r[foto];?>' width='25' height='25'/> 
 <div class='author'><?echo$r[nm_depan]." ".$r[nm_belakang];?>
 
 
 <a href='?page=chating&act=now&obrolan=bersih&id=<?echo$_GET[id];?>' onclick="return confirm('Yakin ingin bersihkan obrolan ini ?')" title='BersihkanObrolan'>
 <img class='img' src="images/settings.png" width='15' height='15'/>
 </a>
 
 
 </div></div>
 <div id='chat-konten'>

 <div id='chat_detail_new'>
 <?include"view_chat.php";?>
 </div>
 </div>
 <form  action="?page=chating&act=now&id=<?echo$_GET[id];?>&send=ok" method='post'>
 <input type='hidden' id='id_to' name='id_to' value='<?echo$_GET[id];?>'>
 <textarea id='txt_chat' class='text' name='txt_chat'  style='width:150px;height:30px;'></textarea> 
 <button  type='submit' style='width:48px;height:30px;' class='kirim'>Kirim</button>
 <a href="./media.php?page=chating">Exit</button>
 </form>
 </div>
 
<?php
$waktu = date("H:i:s d M Y");
if($_GET[act]=='now' and $_GET[send]=='ok'){
if(empty($_POST[txt_chat])){}else{
mysql_query("INSERT INTO chat(id_chat,id_acount,id_to,chat,time)VALUES('$_GET[id]','$_SESSION[id_acount]','$_POST[id_to]','$_POST[txt_chat]','$waktu')");
echo"<meta http-equiv='refresh' content='0;URL=?page=chating&act=now&id=$_GET[id]'>";
}
}
if($_GET[act]=='now' and $_GET[obrolan]=='bersih'){
mysql_query("delete from chat where  id_chat='$_GET[id]' or  id_acount='$_GET[id]' ");
echo"<meta http-equiv='refresh' content='0;URL=?page=chating&act=now&id=$_GET[id]'>";

}

?>