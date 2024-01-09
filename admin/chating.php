<?php
session_start();
$user=mysql_query("select * from acount where id_acount='$_GET[id]'");
$r=mysql_fetch_array($user);
 // mysql_query("UPDATE acount set aktif='0' WHERE id_acount='$_SESSION[id_acount]'");
?>
 <div id='box-chat'>
 <div id='head-chat'><img src='foto_acount/<?echo$r[foto];?>' width='25' height='25'/> <div class='author'><?echo$r[nm_depan]." ".$r[nm_belakang];?> <img src="art/online.ico" width='15' height='15'/></div></div>
 <div id='chat-konten'>

 <div id='chat_detail_new'>
 <?include"view_chat.php";?>
 </div>
 </div>
 <form  action="./?page=chating&id=<?echo$_GET[id];?>&send=ok" method='post'>
 <input type='hidden' id='id_to' name='id_to' value='<?echo$_GET[id];?>'>
 <textarea id='txt_chat' class='text' name='txt_chat'  style='width:200px;height:19px;'></textarea> <button id='kirim' type='submit' style='width:48px;height:26px;' class='uibutton confirm'>Kirim</button>
 </form>
 </div>
 
<?php
$waktu = date("H:i d M Y");
if($_GET[page]=='chating' and $_GET[send]=='ok'){
if(empty($_POST[txt_chat])){}else{
mysql_query("INSERT INTO chat(id_acount,id_to,chat,time)VALUES('$_SESSION[id_acount]','$_POST[id_to]','$_POST[txt_chat]','$waktu')");
echo"<meta http-equiv='refresh' content='0;URL=./?page=chating&id=$_GET[id]'>";
}
}
?>