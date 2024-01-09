<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #990000;
	font-size: 24px;
}
.style2 {color: #0033CC}
.style3 {font-size: 18px}
.style10 {color: #F0F0F0}
.style7 {	font-family: "Times New Roman", Times, serif;
	font-size: 14px;
}
.style9 {color: #0000FF}
-->
</style>
</head>
<?php
$tanggal=date('Y-m-d');
$waktu=date('H:i:s');
?>
<body>
<?php
if(!isset($_GET[act]))
	{
?>
<center>
<h2 class="style1"> Hotel dan Penginapan
</h2>
</center>
<table width="100%" border="0" align="center" >

<?PHP
include "fungsi/koneksi.php";
 $sql="select berita.order by id_berita ";
 $res=mysql_query($sql,$con) or die(mysql_error());
 while($data=mysql_fetch_array($res))
	{
	$no++;
	$berita=substr($data[deskripsi],0,350);
?>
<Tr>
<Td width="14%" rowspan="4"><img src="images/post/<?php echo $data[gambar]; ?>" width="150px" /></td>
</Tr>
<tr>
<Td><H2><u><?php echo $data[judul]; ?></u></H2></td>
<td align="right"><span class="style7"><?php echo TanggalIndo($data[tgl_posting]); ?><br />
    <span class="style9">Kategori </span><span class="style10">: </span> <?php echo $data[nm_kategori]; ?> </tD>
</tr>
<tr>
<Td colspan="2"><?php echo $berita; ?>...</td>
</tr>
<tr>
<Td align="right" colspan="2"><a href="Home.php?page=hotel&act=showdetail&id=<?php echo $data[id_berita]; ?>"> Baca Selengkapnya... </a></Td>
</tr>
<tr>
<td colspan="6"><hr /></td>
</tr>
<?php	
	}
?>
<tr>	
<TD colspan="3" align="center">
<?php
$q2="select berita.id_berita,berita.id_kategori,berita.id_daerah,judul,hits,deskripsi,tgl_posting,gambar,daerah.id_daerah,nm_daerah,kategori.id_kategori,nm_kategori from berita left join daerah on daerah.id_daerah=berita.id_daerah join kategori on kategori.id_kategori=berita.id_kategori where kategori.nm_kategori='Hotel dan Penginapan' order by berita.id_berita";
$res2=mysql_query($q2,$con) or die(mysql_error());
$jmlrecord=mysql_num_rows($res2);
$jmlhalaman=ceil($jmlrecord / $batas);
echo "Page Number : ";
	for($hal=1; $hal <=$jmlhalaman; $hal++)
	if($hal !=$halaman)
		{
		echo "<a href=Home.php?page=hotel&halaman=$hal >  $hal  </a>";
		}else{
		echo "<b>$hal</b>";
		}
echo "dari $jmlrecord Record";
?><br />
</TD>
</tr>
</table>
<?php 	
	}else{
		
	if($_GET[act]=='showdetail')
		{
		$sql="select berita.id_berita,berita.id_kategori,berita.id_daerah,judul,hits,deskripsi,tgl_posting,gambar,daerah.id_daerah,nm_daerah,kategori.id_kategori,nm_kategori from berita left join daerah on daerah.id_daerah=berita.id_daerah join kategori on kategori.id_kategori=berita.id_kategori where kategori.nm_kategori='Hotel dan Penginapan' and id_berita='$_GET[id]'";
		$res=mysql_query($sql,$con) or die(mysql_error());
		$data=mysql_fetch_array($res);
	?>
	<form name="Aaa" method="post" action="">
	<table border='0' width='100%'>
	<Tr>
	<th  colspan="2" align="right"><br /><center><h2><?php echo $data[judul]; ?></h2></th>
    <th align="right"><span class="style7"><?php echo TanggalIndo($data[tgl_posting]); ?><br />
        <span class="style9">Kategori </span><span class="style10">: </span> <?php echo $data[nm_kategori]; ?> </th>
	</tr>
    <tr>
    <th colspan="3"><hr /></th>
    </tr>
	<tr>
    <td colspan="3">
    <center><img src="images/post/<?php echo $data[gambar]; ?>" width="300px" /></center>
<br />
	<?php echo $data[deskripsi]; ?>
    </td>
	</tr>
    <tr>
	<td colspan="3"><hr /></td>
    </tr>
    <tr>
    <td colspan="2"><h3>KOMENTAR ANDA</h3></td>
    </tr>
    <tr>
    <td width="4%">Nama</td>
    <td width="47%"><input type="text" name="nama" value="" placeholder="Nama Anda" /><input type="hidden" name="idberita" value="<?php echo $data[id_berita]; ?>" /><input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>" /><input type="hidden" name="waktu" value="<?php echo $waktu; ?>" /></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><input type="text" name="url" value="" placeholder="Alamat Email Anda" /></td>
    </tr>
    <tr>
    <td>Pesan</td>
    <td><textarea cols="45" rows="3" name="isi" placeholder="Isikan Komenter Anda"></textarea> &nbsp; &nbsp; <input type='submit' name='kirimkomen' value='KIRIM'/> </td>
    </tr>
	</table>
	</form>
	<?php 
	$sql2="select * from komentar where id_berita='$_GET[id]'";
	$res2=mysql_query($sql2,$con) or die(mysql_error());
	while($datakomen=mysql_fetch_array($res2))
		{
	?>	
	<table border='0' width='100%'>
	<Tr>
	<Td rowspan='3' width='6%'><img src="images/chat.jpg" width='50px'/></td>
	</tr>
	<Tr>
	<td><?php echo $datakomen[nama_komentar]; ?> &nbsp;&nbsp;&nbsp; <font color="#0000FF"><?php echo $datakomen[url]; ?></font> </td>
	<Td align='right'> <?php echo TanggalIndo($datakomen[tgl]); ?> &nbsp; &nbsp; &nbsp; <?php echo $datakomen[jam_komentar]; ?> </td>
	</tr>
	<Tr>
	<Td colspan='2'><?php echo $datakomen[isi_komentar]; ?></td>
	</tR>
	<Tr>
	<Td colspan='3'><hr></td>
	</tr>
	</table>
	<?php 	
		}
	?>
	
	<?php	
		if($_POST[kirimkomen])
			{
			$sql3="insert into komentar values('','$_POST[idberita]','$_POST[nama]','$_POST[url]','$_POST[isi]','$_POST[tanggal]','$_POST[waktu]','Y')";
			$res3=mysql_query($sql3,$con) or die(mysql_error());
			if($res3)
				{
				echo "<script>window.location='Home.php?page=hotel&act=showdetail&id=$_GET[id]'</script>";
				}
			}
		}
	}

?>
</table>
</body>
</html>
