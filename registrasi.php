
<form method='post' action='proses_registrasi.php'>
<table width='400' class='form'>
<img src='images/user.ico' class='daftar' width='30' height='30'><h3> Mendaftar</h3><hr>
<tr><td>Nama Depan		</td><td><input type='text' name='nm_depan'></td></tr>
<tr><td>Nama Belakang	</td><td><input type='text' name='nm_belakang'></td></tr>
<tr><td>Email			</td><td><input type='text' name='email'></td></tr>
<tr><td>Konfirmasi Email</td><td><input type='text' name='reemail'></td></tr>
<tr><td>Kata Sandi Baru		</td><td><input type='password' name='pass'></td></tr>
<tr><td>Jenis Kelamin		</td><td><select name='jk'><option value=''>Pilih Jenis Kelamin</option><option value='Laki-Laki'>Laki-Laki</option><option value='Perempuan'>Perempuan</option></td></tr>
<tr><td>Tanggal Lahir		</td><td>
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
<tr><td></td><td> &nbsp;<br><button><img src="images/sign.png" width='15' height='15' >Sign Up</button></td></tr>
</tr>
</table>
</form>
