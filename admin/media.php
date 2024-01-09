<?php
session_start();
include"fungsi/koneksi.php";
include"fungsi/fungsi_kalender.php";
include"../fungsi/fungsi_indotgl.php";
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
<body bgcolor="black">
<div id="wrapper">
<!-----------------#header-------------->
<div id="header"></img>
</div>
<!------------------#Menu--------------->
<nav id="topNav">
        	<ul>
            	<li><a href="./" ><img src="images/home.png" width='15' height='15' > Home</a></li>
          		<li><a href="./media.php?page=akun"><img src="images/settings.png" width='15' height='15' > Setting Akun</a></li>
          		<li><a href="./media.php?page=registrasi"><img src="images/registrasi.png" width='15' height='15' > Data Registrasi</a></li>
			   <li><a href="./media.php?page=download"><img src="images/download.png" width='15' height='15' > Data Download</a></li>
			   
			 <li><a href="logout.php" title="">&nbsp;&nbsp;&nbsp;<img src="images/logout.png" width='15' height='15' > &nbsp;Log Out</a></li>
              
		  </ul>
</nav>
<!------------------#Sidebar--------------->

<!------------------#Content--------------->
<div id="content">
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
else if($page=='preview_registrasi'){
include"preview_registrasi.php";
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
include"mod_download/download.php";
}
else if($page=='akun'){
include"mod_user.php";
}
else if($page=='status'){
include"status.php";
}
else if($page=='registrasix'){
include"hasil_diskusi.php";
}

?>
</div>
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
?>
