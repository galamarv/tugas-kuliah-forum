<?php
session_start();
if($_SESSION['u']==null){
	header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Beranda</title>
<link href="style2.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div id="wrapper";>
<div class="header"><a href="http://forum.lazioindonesia.com/" target="_blank"><img src="image/LI.png" height="200px" width="230px"/></a></div>

<div class="header_atas"><span class="teks_judul"><marquee bgcolor="#000000" behavior="scroll" direction="left">Selamat datang di forum Laziale se-Indonesia<?php
include("koneksi.php");
$nama=mysql_fetch_array(mysql_query("SELECT nama FROM user where username='$_SESSION[u]' AND password='$_SESSION[p]'"));
echo $nama['nama'];  
		?>!</marquee></span><br /><h2 style="letter-spacing:0.45cm"><center>Forum Big Family of Lazio Indonesia</center></h2></center></div>		
<div class="container"><h1 align="center">DATA</h1>
<?php
$allpost=mysql_query("SELECT * FROM pesan where sender=$_SESSION[u] AND receiver=$_POST[receiver]");
while($datapost=mysql_fetch_array($allpost)){
	$nama=mysql_fetch_array(mysql_query("SELECT nama FROM user where username='$datapost[receiver]'"));
	$xxx="image/".$datapost['user'].".jpg";
	echo("<img src='$xxx' width=\"30\" height=\"30\">");
	echo "".$nama['nama']."<br>";
	echo "<br><br>";
}

?>		
<form method="post" action="proses-Login.php">
<input type="hidden" name="e" value="pesan" />
<textarea name="pesan"></textarea>
<input type="submit" value="Kirim" />
</form></div>
        <div id="kotak_nav_atas">
<div id="stylelink_atas">
<a href="default.php">Beranda </a>
<a href="logout.php">Pesan </a>
<a href="profil.php"><?php echo $_SESSION['jeneng']; ?></a>
<?php if($_SESSION['u']=="admin"){
			   echo "<a href=\"lihat-Member.php\">Lihat Member</a>";
			   echo("<a href=\"badwords.php\">Lihat Bad Words</a>");
		   }?>
           <a href="emoticon.php">List Emoticon</a>
<a href="logout.php">Logout </a>
</div></div>

        
<div class="footer"><span class="teks_bawah"><a href="kelompok9.php">Kelompok 9</a><br />
Program Teknologi Informasi dan Ilmu Komputer<br />
@ 2014</span></div></div>
</body>
</html>
