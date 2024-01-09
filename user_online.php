<div id='judul_kontent'><img src='images/chat.png' width='35' height='35'> List User Online</div>
  <div class='download'>
  <table cellpedding="2" width="50%" border="0" cellspacing="4">
  <tbody>
  <?php
            $acount=mysql_query("SELECT * FROM acount ORDER BY id_acount DESC LIMIT 20");
			
            while($d=mysql_fetch_array($acount)){
			if($d[id_acount]==$_SESSION[id_acount]){}else{
			if($d[aktif]==1){
			echo "<tr><td width='20'><img src='foto_acount/$d[foto]' width='35' height='35'> </td><td><a href='?page=chating&act=now&id=$d[id_acount]'  >$d[nm_depan] $d[nm_belakang]</a></td><td> <img src='images/online.ico' width='25' height='25'></td></tr>";
			}else{
			echo "<tr><td width='20'><img src='foto_acount/$d[foto]' width='35' height='35'> </td><td>$d[nm_depan] $d[nm_belakang]</td><td> <img src='images/offline.ico' width='25' height='25'></td></tr>";
			
			}	
			}
			}
            ?>
            </tbody>
            </table>
  </div>
<?
if($_GET[page]=='chating' and $_GET[act]=='now'){
include"chating.php";
}?>