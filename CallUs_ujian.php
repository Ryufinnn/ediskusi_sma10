
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<style type="text/css">

.style3 {
	font-family: times new roman;
	font-size: 26px;
	font-weight: bold;
	color: #000000;
}

</style>

<center class="style3"><align="center">Diskusi Seputar Ujian Sekolah
</center><br>
		
		<div class="cleaner_h50"></div>
            
            	<div id="contact_form">
                
<form name="form1" method="post" action="simpan_coment_ujian.php">
  <table width="500" border="0" cellspacing="2" cellpadding="0" class="keliling">
    <tr bgcolor="#00CCFF"> 
      <td colspan="2" bgcolor="FF9900" align="center"><b> ENTRY DISKUSI </b></td>
    </tr>
	
  
 
   
    <tr> 
      <td align="right">Nama   : </td>
      <td><input name="txtnama" type="text" size="35" maxlength="150"></td>
    </tr>
    
    <tr> 
      <td align="right">Email  : </td>
      <td><input name="txtemail" type="text" size="35" maxlength="40"></td>
    </tr>
    <tr> 
      <td align="right">Diskusi  : </td>
      <td><input name="txttelp" type="text" size="35" maxlength="40" value="Ujian" ></td>
    </tr>
	 
	 <tr> 
      <td align="right">Pesan/Koment : </td>
      <td><textarea name="txtcoment" cols="35" rows="4" id="head"></textarea></td>
    </tr>
    
	 <tr>

 
    <tr> 
      <td>&nbsp;</td>
      <td><input name="TbSimpan" type="submit" value="Send">
      <input name="reset" type="reset" value="Reset"></td>
    </tr>
  </table>

<?php
  include ("fungsi/koneksi.php");
  ?>
  <?php
  $sql = "SELECT * FROM pesan WHERE telp LIKE '%Ujian%' ";
  $qry = mysql_query($sql);
  while ($data = mysql_fetch_array($qry)) 
  
  {
  ?>
 <br>
  <table width="575" border="0">
    <tr>
      <td width="66"><strong>Pengirim</strong></td>
      <td width="10">:</td>
      <td width="485"><?php echo $data['nama']; ?></td>
    </tr>
    <tr>
      <td><strong>Komentar</strong></td>
      <td>:</td>
      <td><?php echo $data['coment']; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
</table>

  <?php
  }
  ?>
            