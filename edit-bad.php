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
<title>Edit Profil</title>
<link href="style2.css" rel="stylesheet" type="text/css"/>
</head>
<body >

<div id="wrapper";>
<div class="header"><a href="http://forum.lazioindonesia.com/" target="_blank"><img src="image/LI.png" height="200px" width="230px"/></a></div>

<div class="header_atas"><span class="teks_judul"><marquee bgcolor="#000000" behavior="scroll" direction="left">Selamat datang di forum Laziale se-Indonesia<?php
include("koneksi.php");
$nama=mysql_fetch_array(mysql_query("SELECT nama FROM user where username='$_SESSION[u]' AND password='$_SESSION[p]'"));
echo $nama['nama'];  
		?>!</marquee></span><br /><h2 style="letter-spacing:0.45cm"><center>Forum Big Family of Lazio Indonesia</center></h2></center></div>		
<div class="container">
<?php $profil=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$_SESSION[u]'"));?>
<center>
<?php 
$allbad=mysql_query("SELECT * FROM badword WHERE bad='$_GET[id]'");
$badword=mysql_fetch_array($allbad); 
?>
<br />
<form action="proses-Login.php" method="post">
 <input type="hidden" name="e" value="<?php echo $_GET['e']?>" />
  <input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
 <table align="center">
 <tr><td>Badword</td><td>:</td><td> <input type="text" name="bad" required="required" value="<?php echo $_GET['id']?>" /></td></tr>
 <tr><td><br /></td><td></td><td></td></tr>
 <tr><td>Sensor Badword</td><td>:</td><td><input type="text" name="sensor" required="required" value="<?php echo $badword['replace']?>" /></td></tr>
 <tr><td><br /></td><td></td><td></td></tr>
 </table>
 <input type="submit" value="Edit" />
 </form>
</center>

  </div>
        <div id="kotak_nav_atas">
<div id="stylelink_atas">
<a href="default.php">Beranda </a><a href="pesan.php">Pesan </a>
<?php echo "<a href=\"profil.php?user=".$_SESSION['u']."\">".$_SESSION['jeneng']."</a>"?>
<?php if($_SESSION['u']=="admin"){
			   echo "<a href=\"lihat-Member.php\">Lihat Member</a>";
			   echo("<a href=\"badwords.php\">Lihat Bad Words</a>");
		   }?>
<a href="emoicon.php">List Emoticon</a>
<a href="logout.php">Logout </a>
</div></div>

        
<div class="footer"><span class="teks_bawah"><a href="kelompok9.php">Kelompok 9</a><br />
Program Teknologi Informasi dan Ilmu Komputer<br />
@ 2014</span></div></div>
</body>
</html>
