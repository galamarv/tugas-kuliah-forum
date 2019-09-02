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
		?>!</marquee></span><br /><h2 style="letter-spacing:0.45cm"><center>Forum Big Family of Lazio Indonesia</center></h2></center></div>>		
<div class="container">
<?php $profil=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$_GET[user]'"));?>
<center>
<h3> Ubah Profil <?php echo "".$profil['nama']."<br>"?></h3>

 <img src="<?php echo $profil['avatar']?>" width="100" height="100" /><br />
<br />
<form action="proses-Login.php" method="post" enctype="multipart/form-data">
 <input type="hidden" name="e" value="editProfil" />
 <table align="center">
 <tr><td>Username </td><td>:</td><td><input type="text" name="username" value="<?php echo "".$profil['username']?>" size="30"/></td></tr>
 
 <tr><td>Nama </td><td>:</td><td><input type="text" name="nama" value="<?php echo "".$profil['nama']?>" size="30"/></td></tr>
 <tr><td>Biodata </td><td>:</td><td><textarea name="biodata" cols="28"><?php echo "".$profil['biodata']?></textarea></td></tr>
 <tr><td><br /></td><td></td><td</td></tr>
 <tr><td></td><td></td><td>
 <input type="submit" value="Simpan" /></td></tr>
 </form>
<tr><td></td><td><br /></td><td></td></tr>
 <tr><td>Password</td><td>:</td><td><form action="edit-Password.php" method="post"><input type="submit" value="Ganti Password" />
 </form></td></tr>
 <tr><td>Avatar</td><td>:</td><td><form action="edit-Avatar.php" method="post"><input type="submit" value="Ganti Avatar" />
 </form></td></tr>
 </table>
 
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
<a href="emoticon.php">List Emoticon</a>
<a href="logout.php">Logout </a>
</div></div>

        
<div class="footer"><span class="teks_bawah"><a href="kelompok9.php">Kelompok 9</a><br />
Program Teknologi Informasi dan Ilmu Komputer<br />
@ 2014</span></div></div>
</body>
</html>
