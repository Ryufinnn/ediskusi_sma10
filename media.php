<?php
session_start();
include"fungsi/koneksi.php";
include"fungsi/fungsi_kalender.php";

?>
<html>
<title> .:: Welcome To Sistem Informasi E-Discussion SMA N 10 Padang ::.</title>
<head>
<link rel="stylesheet" href="style/style.css "type="text/css"/>
<link rel="stylesheet" href="style/style_tabel.css "type="text/css"/>
<link rel="stylesheet" href="style/nav.css">
<link type="text/css" rel="stylesheet" href="style/style_slider.css" />

<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/style6.css" />
<script language="javascript" type="text/javascript" src="js_slider/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<script type='text/javascript' src='jquery.js'></script>
<script type="text/javascript" language="javascript" src="jscript.js"></script>

<script type="text/javascript" src="js_slider/jquery.js"></script>
<script type="text/javascript" src="js_slider/slides.min.jquery.js"></script>
<script type="text/javascript">
$(function(){
	$('#slider').slides({
		preload: true,
		preloadImage: 'img/loading.gif',
		play: 4000,
		pause: 2500,
		auto: 2000,
		hoverPause: true,
		animationComplete: function(current){
			$('.caption').animate({
				bottom:0
			},200);
		},
		slidesLoaded: function() {
			$('.caption').animate({
				bottom:0
			},200);
		}
	});
});
</script>

<head>
<body>
<div id="wrapper">
<!-----------------#header-------------->
<div id="header">
<img src='images/logo.png' width='35%' height='75'></img></div>
<!------------------#Menu--------------->
<nav id="topNav">
        	<ul>
            	<li><a href="./" ><img src="images/home.png" width='15' height='15' > Home</a></li>
          		<li><a href="#" title=""><img src="images/profile.png" width='15' height='15' > &nbsp;Profil Sekolah</a>
                	<ul>
                    	<li><a href="./media.php?page=sejarah" title="">&nbsp;&nbsp;&nbsp;<img src="images/sub.png" width='15' height='15' > &nbsp;Sejarah Sekolah</a></li>
                        <li><a href="./media.php?page=visi" title="">&nbsp;&nbsp;&nbsp;<img src="images/sub.png" width='15' height='15' > &nbsp;Visi Misi</a></li>
                        <li><a href="./media.php?page=struktur" title="">&nbsp;&nbsp;&nbsp;<img src="images/sub.png" width='15' height='15' > &nbsp;Struktur Organisasi</a></li>
                    </ul>        
                </li>
			 	
              <?
			  if(empty($_SESSION[id_acount])){
			  ?>
			  
			  <li><a href="./media.php?page=registrasi"><img src="images/registrasi.png" width='15' height='15' > Registrasi</a></li>
			  <li><a href="#login" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"><img src="images/login.png" width='15' height='15' > Login</a></li>
			  <div id="light" class="white_content">

<form method='post' action='cek_login.php'>
<table width='400' class='form'>
<h3><img src='images/login.png' width='30' height='30'> Login</h3><hr>
<tr><td>Email / Username		</td><td><input type='text' size='28' name='username'></td></tr>
<tr><td>Level		</td><td><select name='level'><option value=''> Pilih Level Login Anda !</option><option value='admin'>Admin</option><option value='user'>Member</option></td></tr>
<tr><td>Password	</td><td><input type='password' size='28' name='password'></td></tr>
<tr><td></td><td>&nbsp;<br><button><center><img src="images/login.png" width='15' height='15' >&nbsp;Sign In</button>&nbsp; 
<button type='reset' onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><center><img src="images/close.png" width='14' height='14' >&nbsp; Keluar</button>
</td></tr>
</tr>
</table>
</form>
</div>       <? }else if ($_SESSION[level] == 'guru'){ ?>
			   <li><a href="./media.php?page=download"><img src="images/download.png" width='15' height='15' > Upload Materi</a></li>
              <?
			  }else {
			  ?>
			  <li><a href="./media.php?page=download"><img src="images/download.png" width='15' height='15' > Download Materi</a></li>
			  <li><a href="./media.php?page=chating"><img src="images/chat.png" width='22' height='19' >  Chatting</a></li>
			  <li><a href="#"><img src="images/status.png" width='15' height='15' >Discussion</a>
			  <ul>
                    	<li><a href="./media.php?page=diskusi_tugas" title="">&nbsp;&nbsp;&nbsp;<img src="images/sub.png" width='15' height='15' > &nbsp;Tugas</a></li>
                        <li><a href="./media.php?page=diskusi_latihan" title="">&nbsp;&nbsp;&nbsp;<img src="images/sub.png" width='15' height='15' > &nbsp;Latihan</a></li>
                        <li><a href="./media.php?page=diskusi_ujian" title="">&nbsp;&nbsp;&nbsp;<img src="images/sub.png" width='15' height='15' > &nbsp;Ujian</a></li>
                    </ul>    </li>
			
			  <li><a href=""><img src="images/settings.png" width='15' height='15' > Setting</a>
                	<ul>
                    	<li><a href="./media.php?page=edit_akun" title="">&nbsp;&nbsp;&nbsp;<img src="images/login.png" width='15' height='15' > &nbsp;Edit Akun</a></li>
                    	<li><a href="logout.php" title="">&nbsp;&nbsp;&nbsp;<img src="images/logout.png" width='15' height='15' > &nbsp;Log Out</a></li>
                    </ul>        
              </li>
			  
              
			  <?
			  }
			  ?>
		  </ul>
</nav>
<!------------------#Sidebar--------------->

<!------------------#Content--------------->
<div id="content">
<table id='theList' border="0" align="center" cellpadding="0" cellspacing="0">   
    <tr >    
    <td width="100%" class='td'  valign="top"  >
<div id="content-left">


<?
$page=$_GET[page];
if($page=='home'){
	if(empty($_SESSION[id_acount])){
	include"home.php";
	}else{
	include"beranda.php";
	}
}
else if($page=='profile'){
include"profile.php";
}
else if($page=='registrasi'){
include"registrasi.php";
}
else if($page=='sejarah'){
include"sejarah.php";
}
else if($page=='visi'){
include"visimisi.php";
}
else if($page=='struktur'){
include"strukture.php";
}
else if($page=='download'){
include"download.php";
}
else if($page=='edit_akun'){
include"modul/mod_registrasi/edit_akun.php";
}
else if($page=='chating'){
include"user_online.php";
}

else if($page=='status'){
include"status.php";
}

else if($page=='laporandiskusi'){
include"laporandiskusi.php";
}
else if($page=='diskusi_tugas'){
include"CallUs.php";
}
else if($page=='diskusi_latihan'){
include"CallUs_latihan.php";
}
else if($page=='diskusi_ujian'){
include"CallUs_ujian.php";
}

?>
</div>
 </td>
 <td width="130" class='td' valign="top"  >
 <div id="Sidebar">
 <div id='judul_header'>
 <table border='0'>
 <tr>
 <td width='200'>
 </table>
 </div>
 <br>
 <div id='judul_header'>&#187; Jam Akademik</div>
<center><embed src="images/jam-akun.swf?TimeZone=ICT&"  width="250" height="100" wmode="transparent" type="application/x-shockwave-flash"></center>

 <div id='judul_header'>&#187; Kalender</div>
  <div class='agenda'> 
  <?php 
  $tgl_skrg=date("d");
  $bln_skrg=date("n");
  $thn_skrg=date("Y");
  echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg); 
  ?>    
  </div>
  

  </td>
  </tr> 
    </table>
</div>
<!------------------#Footer--------------->
<div id="footer">
Copyright &copy; 2015 by: <a href="#">SMA N 10 Padang</a>
</div>
</div>

</body>
        <script src="javascript/modernizr.js"></script>
		<script>
			(function($){
				
				//cache nav
				var nav = $("#topNav");
				
				//add indicator and hovers to submenu parents
				nav.find("li").each(function() {
					if ($(this).find("ul").length > 0) {
						$("<span>").text("^").appendTo($(this).children(":first"));

						//show subnav on hover
						$(this).mouseenter(function() {
							$(this).find("ul").stop(true, true).slideDown();
						});
						
						//hide submenus on exit
						$(this).mouseleave(function() {
							$(this).find("ul").stop(true, true).slideUp();
						});
					}
				});
			})(jQuery);
		</script>
		
</html>
<?
if($_GET[savestatus]=='ok'){
$waktu = date("H:i d M Y");
if(empty($_POST[status]) or $_POST[status]=='Apa Yang Anda Pikirkan ?'){}
else{
mysql_query("INSERT INTO status(id_acount,status,waktu)VALUES('$_SESSION[id_acount]','$_POST[status]','$waktu')");
echo"<meta http-equiv='refresh' content='0;URL=./'>";
}
}

if($_GET[page]=='home' and $_GET[update]=='ok'){
$waktu = date("H:i d M Y");
if(empty($_POST[status]) or $_POST[status]=='Apa Yang Anda Pikirkan ?'){echo"<meta http-equiv='refresh' content='0;URL=./?page=home'>";}
else{
mysql_query("INSERT INTO status(id_acount,status,waktu)VALUES('$_SESSION[id_acount]','$_POST[status]','$waktu')");
echo"<meta http-equiv='refresh' content='0;URL=./?page=home'>";
}
}

if($_GET[page]=='home'  and $_GET[del]=='this'){

mysql_query("delete from status where id_status='$_GET[id]' ");
echo"<meta http-equiv='refresh' content='0;URL=./?page=home'>";
}
if( $_GET[page]=='status' and $_GET[del]=='this'){

mysql_query("delete from status where id_status='$_GET[id]' ");
echo"<meta http-equiv='refresh' content='0;URL=./?page=status'>";
}

?>
