<div id='judul_kontent'><img src='images/download.png' width='35' height='35'> Download Module</div>
  <div class='download'>
  <table cellpedding="2" width="100%" border="0" cellspacing="4">
  <tbody>
  <?php
            $download=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT 20");
			
            while($d=mysql_fetch_array($download)){
			//$judul=strtoupper($d[judul]);
			$format=$d[format_file];
			if($format=='EXCEL'){
			echo "<tr><td width='20'><img src='files/type_gambar/excel.jpg' width='35' height='35'> </td><td><a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
			}
			else if($format=='PDF'){
			echo "<tr ><td><img src='files/type_gambar/pdf.jpg' width='35' height='35'></td><td> <a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
			}
			else if($format=='DOC'){
			echo "<tr><td class='garisbawah'><img src='files/type_gambar/doc.jpg' width='35' height='35'></td><td> <a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
			}
			else if($format=='RAR'){
			echo "<tr><td class='garisbawah'><img src='files/type_gambar/rar.jpg' width='35' height='35'></td><td> <a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
			}
			else if($format=='MDB'){
			echo "<tr><td class='garisbawah'><img src='files/type_gambar/access.jpg' width='35' height='35'></td><td> <a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
			}
			else if($format=='PPT'){
			echo "<tr><td class='garisbawah'><img src='files/type_gambar/ppt.jpg' width='35' height='35'></td><td> <a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
			}
			else if($format=='EXE'){
			echo "<tr><td class='garisbawah'><img src='files/type_gambar/wizard.png' width='35' height='35'></td><td> <a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
			}
			else{
			echo "<tr><td class='garisbawah'><img src='files/type_gambar/folder.ico' width='35' height='35'></td><td> <a href='downlot.php?file=$d[nama_file]'  >$d[judul]</a> ($d[hits])</td></tr>";
            }			
			}
            ?>
            </tbody>
            </table>
  </div>