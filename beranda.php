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
<form action="proses-Login.php" method="post"><br />
<input type="hidden" name="e" value="posting">

<table  style="background-color:#FFF">
<tr><td style="background-color: #FFF">Kategori</td><td>:</td><td style="background-color: #FFF"><select name="kategori">
<?php 
$allkategori=mysql_query("SELECT * FROM kategori");
while($semuaKategori=mysql_fetch_array($allkategori)){
	echo("<option value=\"$semuaKategori[id_kategori]\">$semuaKategori[content]</option>");
}
echo("</select>");	
if($_SESSION['u']=="admin"){
	echo("<tr><td></td><td></td><td><a href=\"tambah-Kategori.php\"><linkTambahKat>Tambah Kategori Baru</a></linkTambahKat></td></tr>");
	
}
?></td></tr>
<tr><td style="background-color: #FFF">Judul</td><td>:</td><td style="background-color: #FFF"> <input name="judul" type="text" size="54"	 required="required" /></td></tr>
<tr><td style="background-color: #FFF">Isi</td><td>:</td><td style="background-color: #FFF"> <textarea name="teks" cols="47" rows="5" required="required"></textarea></td></tr>
<tr><td></td><td></td><td>
<input type="submit" value="Postkan" align="middle" /></form></td></tr>
</table>

</div>

<div class="containerbawah">
<br /></td>
<h3 style="font-size:36px">Daftar Postingan</h3>
<?php
$allkategori=mysql_query("SELECT * FROM kategori");
while($semuaKategori=mysql_fetch_array($allkategori)){
echo "<b>Kategori $semuaKategori[content]</b><br>";
if($_SESSION['u']=="admin"){
echo "<a href=\"edit-Kategori.php?id_kat=$semuaKategori[id_kategori]\"><linkTambahKat>Edit Kategori</a></linkTambahKat><br>";
$apah="hapusKategori";
echo("<a href=\"proses-Hapus.php?id=$semuaKategori[id_kategori]&e=$apah\"><linkTambahKat>Hapus Kategori</a></linkTambahKat><br>");
}
$allpostKul=mysql_query("SELECT * FROM post WHERE kategori=$semuaKategori[id_kategori] ORDER BY date DESC");
echo "<table>";
while($datapost=mysql_fetch_array($allpostKul)){
	$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$datapost[user]' "));
	$xxx=$nama['avatar'];
	echo "<tr><div id=\"kotakdalam\">";
	echo("<td width=\"50\"><a href=\"profil.php?user=$datapost[user]\"><img src='$xxx' width=\"50\" height=\"50\"></a></td>");
	$ganti=$datapost['judul'];
	$badword=mysql_query("SELECT * FROM badword");
	while($bad=mysql_fetch_array($badword)){
	$data=$ganti;
	$ganti=str_replace($bad['bad'],$bad['replace'],$data);
	}
	echo "<td width=\"650\"><a href=\"postingan.php?id_post=$datapost[id_post]\"><k>".$ganti."</k></a></td>";
	echo "<td>by <a href=\"profil.php?user=$datapost[user]\"><linkTambahKat>".$nama['nama']."</linkTambahKat></a><br><i style=\"font-size:12px; color:rgb(0,153,255)\">".$datapost['date']."</i></br>";
	$jml=mysql_num_rows(mysql_query("SELECT * FROM komentar where id_post='$datapost[id_post]'"));
 echo("jumlah komentar : ".$jml."");
 $h="hapusPost";
	if($_SESSION['u']=="admin" OR $_SESSION['u']==$datapost['user']){
		
		echo "<br><a href=\"proses-Hapus.php?e=$h&id=$datapost[id_post]\" ><linkTambahKat>delete</linkTambahKat></a>";
		
	}
	if($_SESSION['u']==$datapost['user']){
		echo " or <a href=\"edit-Post.php?id=$datapost[id_post]\" ><linkTambahKat>edit</linkTambahKat></a>";}
	echo "</td></div></tr>";
}
echo "</table>";
}
?>	</div>
    
        </div>

        
<div class="footer"><span class="teks_bawah"><a href="kelompok9.php">Kelompok 9</a><br />
Program Teknologi Informasi dan Ilmu Komputer<br />
@ 2014<br /></span></div></div>
</body>
</html>
