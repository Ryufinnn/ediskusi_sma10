<?php
include ("fungsi/koneksi.php");
	$nama = $_POST['txtnama'];
	$email = $_POST['txtemail'];
	$telp = $_POST['txttelp'];
	$coment = $_POST['txtcoment'];
	
	
$sql="insert into pesan values('$nama','$email','$telp','$coment')";
							 
$hasil=mysql_query($sql);
$file_name = $_FILES['NamaFile']['name'];
		$file_name = stripslashes($file_name);
		$file_name = str_replace("'","",$file_name);
		echo "<br>Terima Kasih  <a href='media.php?page=diskusi_tugas'>kembali</a> disini";

?>