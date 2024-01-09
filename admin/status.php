<?
if(empty($_SESSION[id_acount])){}
else{
?>
<form  id='form-status' action="?page=status&update=ok" method='post'>
<?
if(empty($_SESSION[foto])){
?>
<img src='images/nofoto.jpg' width='90' height='100'></img>
<?
}else{
?>
<img src='foto_acount/<?echo$_SESSION[foto];?>' width='90' height='100'></img>
<?
}
?>
<b><div class='judul_status'><img src="images/status.png" width='20' height='20' >Status Terbaru :</div></b>
<textarea style='width:844px;' id='status' class="form-field" defaultVal="Apa Yang Anda Pikirkan ...?" name='status'></textarea>
<p align='right'><button  type='submit'  class='button green'><img src="images/status.png" width='20' height='20'/> Bagikan</button></p>
</form>

<?php
$pesan = mysql_query("SELECT * FROM status,acount where acount.id_acount=status.id_acount  order by status.id_status desc ");
$user=mysql_query("select * from acount ");
$u=mysql_fetch_array($user);
while($p = mysql_fetch_array($pesan)){
    ?>
    <div id='box-status'>
	<div id='status'>
	<img src='foto_acount/<?echo$p[foto];?>' width='60' height='70'/> 
	<p class='nama-status'><?echo"$p[nm_depan] $p[nm_belakang]";?></p> 
	<span class='del'><a href='?page=status&del=this&id=01' title='Hapus Status Ini'><img src="images/hapus.png" width='20' height='20' ></a></span>
	<p class='time'><?echo"$p[waktu] Wib";?></p> 
	<p class='text-status'><?echo"$p[status]";?></p>
	</div>
    <br>
    <?
	$balas = mysql_query("SELECT * FROM balas_status,status,acount where balas_status.id_status=status.id_status and balas_status.id_acount=acount.id_acount and balas_status.id_status='$p[id_status]' order by balas_status.id_balas asc ");
    while($b = mysql_fetch_array($balas)){
	?>
	<div id='balasan'><img src='foto_acount/<?echo$b[foto];?>' width='60' height='70'/> 
	<p class='nama-status'><?echo"$b[nm_depan] $b[nm_belakang]";?></p> 
	<p class='time'><?echo"$b[waktu] Wib";?></p> 
	<p class='text-status'><?echo"$b[balas]";?></p>
	</div>
	<br>
	<?
	}
	?>	
	<br>
	<br>
	<form method='post' action='?page=status&balas=ok&id=<?echo$p[id_status];?>'>
	<div id='balasan_box'><img src='foto_acount/<?echo$u[foto];?>' width='60' height='70'/> 
	<p class='v_nama-status'><?echo$_SESSION[namauser];?></p>
	<textarea style='width:850px;height:30px;' class="form-field" defaultVal="Komentar Anda ..."  class='' name='balasan'  ></textarea>
	<p align='right'><button  type='submit'  class='button green'><img src="images/status.png" width='15' height='15'/> Balas</button></p>
    </form>
	
	</div>
	
	</div>
<?	
}
if($_GET[balas]=='ok'){
$waktu = date("H:i d M Y");
$id=$_GET[id];
if(empty($_POST[balasan])){}
else{
mysql_query("INSERT INTO  balas_status(id_status,id_acount,balas,waktu)VALUES('$id','$_SESSION[id_acount]','$_POST[balasan]','$waktu')");
echo"<meta http-equiv='refresh' content='0;URL=./?page=status'>";
}
}
}

if($_GET[savestatus]=='ok'){
$waktu = date("H:i d M Y");
if(empty($_POST[status]) or $_POST[status]=='Apa Yang Anda Pikirkan ?'){}
else{
mysql_query("INSERT INTO status(id_acount,status,waktu)VALUES('$_SESSION[id_acount]','$_POST[status]','$waktu')");
echo"<meta http-equiv='refresh' content='0;URL=./'>";
}
}

if($_GET[page]=='status' and $_GET[update]=='ok'){
$waktu = date("H:i d M Y");
if(empty($_POST[status]) or $_POST[status]=='Apa Yang Anda Pikirkan ?'){echo"<meta http-equiv='refresh' content='0;URL=./?page=status'>";}
else{
mysql_query("INSERT INTO status(id_acount,status,waktu)VALUES('$_SESSION[id_acount]','$_POST[status]','$waktu')");
echo"<meta http-equiv='refresh' content='0;URL=./?page=status'>";
}
}
?>
