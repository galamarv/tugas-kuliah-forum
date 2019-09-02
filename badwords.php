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
<body background="image/Lazio_Wallpaper.jpg">

<div id="wrapper";>
<div class="header"><a href="http://forum.lazioindonesia.com/" target="_blank"><img src="image/LI.png" height="200px" width="230px"/></a></div>

<div class="header_atas"><span class="teks_judul"><marquee bgcolor="#000000" behavior="scroll" direction="left">Selamat datang di forum Laziale se-Indonesia<?php
include("koneksi.php"); 
$nama=mysql_fetch_array(mysql_query("SELECT nama FROM user where username='$_SESSION[u]' AND password='$_SESSION[p]'"));
echo $nama['nama'];  
		?>!</marquee></span><br /><h2 style="letter-spacing:0.45cm"><center>Forum Big Family of Lazio Indonesia</center></h2></center></div>		
<div class="container">
    <div id="kotak_nav_atas">
          <div id="stylelink_atas"> <a href="default.php">Beranda </a>
           <a href="pesan.php">Pesan </a> <?php echo "<a href=\"profil.php?user=".$_SESSION['u']."\">".$_SESSION['jeneng']."</a>";
		   if($_SESSION['u']=="admin"){
			   echo "<a href=\"lihat-Member.php\">Lihat Member</a>";
			   echo("<a href=\"badwords.php\">Lihat Bad Words</a>");
		   }?>
           
<a href="emoticon.php">List Emoticon</a>
 <a href="logout.php">Logout </a> </div></div>
<br />
<h3>Daftar Badword</h3><table>
<form action="proses-Login.php" method="post">
<input type="hidden" name="e" value="tambahBadword" />

<tr><td width="200">Badword</td><td><input type="text" name="bad" required="required"/></td></tr>
<tr><td>Gantikan dengan</td><td><input type="text" name="replace" required="required"/></td></tr>
<tr><td></td><td><input type="submit" value="tambah" /></td></tr>
</form>
<?php
$allbadword=mysql_query("SELECT * FROM badword");
echo "<table border=\"2px\" bgcolor=\"#00FFCC\"><tr><td>Daftar Badword</td><td>Sensor Badword</td></tr>";
while($databadword=mysql_fetch_array($allbadword)){
	echo "<tr><td>$databadword[bad]</td>";
	echo "<td>$databadword[replace]</td>";
	$e="bad";
	 $id_bad=("$databadword[bad]");
	echo "<td width=\"10px\"><a href=\"proses-Hapus.php?e=$e&&id=$id_bad\"style=\"color:rgb(0,153,255)\">Delete</a><br>";
	echo "<a href=\"edit-bad.php?e=$e&&id=$id_bad\" style=\"color:rgb(0,153,255)\">Edit</a></td></tr>";
}
echo "</table>";
?>
    
        </div>

        
<div class="footer"><span class="teks_bawah"><a href="kelompok9.php">Kelompok 9</a><br />
Program Teknologi Informasi dan Ilmu Komputer<br />
@ 2014<br /></span></div></div>
</body>
</html>
