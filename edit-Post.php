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
<title>Edit Post</title>
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
<form action="proses-Login.php" method="post"><br />
<input type="hidden" name="e" value="editPost">
<input type="hidden" name="id" value="<?php echo "$_GET[id]"?>">
<?php
$allpost=mysql_query("SELECT * FROM post WHERE id_post=$_GET[id]");
$datapost=mysql_fetch_array($allpost);?>
<table  style="background-color:#FFF">
<tr><td style="background-color: #FFF">Kategori</td><td>:</td><td style="background-color: #FFF"><select name="kategori">
<?php 
$allkategori=mysql_query("SELECT * FROM kategori");
while($semuaKategori=mysql_fetch_array($allkategori)){
	echo("<option value=$semuaKategori[id_kategori]\">$semuaKategori[content]</option>");
}
echo("</select>");	
	
?></td></tr>
<tr><td style="background-color: #FFF">Judul</td><td>:</td><td style="background-color: #FFF"> <input name="judul" type="text" size="54"	 required="required" value="<?php echo $datapost['judul'];?>" /></td></tr>
<tr><td style="background-color: #FFF">Isi</td><td>:</td><td style="background-color: #FFF"> <textarea name="teks" cols="40" rows="5" required="required"><?php echo $datapost['content']?></textarea></td></tr>
<tr><td></td><td></td><td>
<input type="submit" value="Edit" align="middle" /></form></td></tr>
</table>
    
        </div>

        
<div class="footer"><span class="teks_bawah"><a href="kelompok9.php">Kelompok 9</a><br />
Program Teknologi Informasi dan Ilmu Komputer<br />
@ 2014<br /></span></div></div>
</body>
</html>
