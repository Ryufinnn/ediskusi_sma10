
<form method='post' action='proses_registrasi.php'>
<table width='400' class='form'>
<img src='images/user.ico' class='daftar' width='30' height='30'><h3> Laporan History</h3><hr>
<tr><td>id_history		</td><td><input type='text' name='id_history'></td></tr>
<tr><td>tgl_history 	</td><td> 
							<select name='tgl'>
							<option value=''>Tanggal</option>
							<?
							for($i=1;$i<=31;$i++){
							echo"<option value='$i'>$i</option>";
							}
							?>										
							</select>
							
							<select name='bln'>
							<option value=''>Bulan</option>
							<?
							$nm_bulan=array(1 =>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember');
							for($i=1;$i<=12;$i++){
							echo"<option value='$i'>$nm_bulan[$i]</option>";
							}
							?>										
							</select>
							
							<select name='thn'>
							<option value=''>Tahun</option>
							<?
							for($i=1990;$i<=2015;$i++){
							echo"<option value='$i'>$i</option>";
							}
							?>										
							</select>
							</td></tr>	
<tr><td>Pemimpin Diskusi			</td><td><input type='text' name='pimpinan'></td></tr>
<tr><td>pembahasan</td><td><input type='text' name='pembahasan'></td></tr>
<tr><td class="pinggir-data">Nama anggota</td>
<td class="pinggir-data">
<select name="id_acount">
<option value="" selected>------- Pilih Nama Anggota -----</option>
<?php
include "admin/koneksi.php";
$qa=mysql_query("SELECT * FROM acount ORDER BY id_acount");
while ($anggota=mysql_fetch_array($qa)) {
echo "<option value='$anggota[2]'>$anggota[1] $anggota[2]</option>";
}
?>
</select>
</td></tr>

<tr><td></td><td> &nbsp;<br><button><img src="images/foto.jpeg" width='15' height='15' >simpan</button></td></tr>
</tr>
</table>
</form>
