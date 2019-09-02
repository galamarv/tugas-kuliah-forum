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
<title>Post</title>
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
        <div id="kotakpos">
<div class="container"><h3>Detail Post</h3>
<?php
$allpost=mysql_query("SELECT * FROM post where id_post= '$_GET[id_post]'");
$datapost=mysql_fetch_array($allpost);
	$kategori=mysql_fetch_array(mysql_query("SELECT * FROM kategori where id_kategori='$datapost[kategori]'"));
	echo "Kategori $kategori[content]<br><br>";
	$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$datapost[user]'"));
	$xxx=$nama['avatar'];
	
	echo("<a href=\"profil.php?user=$datapost[user]\"><img src='$xxx' width=\"50\" height=\"50\"></a>");
	$ganti2=$datapost['judul'];
	$badword=mysql_query("SELECT * FROM badword");
	while($bad=mysql_fetch_array($badword)){
	$data2=$ganti2;
	$ganti2=str_replace($bad['bad'],$bad['replace'],$data2);
	}
	echo "		Judul <i style=\"font-weight:bold; font-size:24px\">".$ganti2."</i> <br>";
	echo "by ".$nama['nama']."<br> <br>";
	
	$ganti=$datapost['content'];
	$badword=mysql_query("SELECT * FROM badword");
	while($bad=mysql_fetch_array($badword)){
	$data=$ganti;
	$ganti=str_replace($bad['bad'],$bad['replace'],$data);
	}
	$em=mysql_query("SELECT * FROM emot");
	$replace=$ganti;
	while($emo=mysql_fetch_array($em)){
		$id=("$emo[id_emot]");
		$new=("<img src=\"$emo[emot]\">");
		$data=$replace;
		$replace=str_replace($id,$new,$data);
		}
	echo "Isi : ".$replace."<br>";
	echo "<i style=\"font-size:12px; color:rgb(0,153,255)\">".$datapost['date']."</i></br>";
	$h="hapusPost";
	if($_SESSION['u']=="admin" OR $_SESSION['u']==$datapost['user']){
		echo "<a href=\"proses-Hapus.php?e=$h&id=$datapost[id_post]\" ><linkTambahKat>delete</linkTambahKat></a>";
	}
	if($_SESSION['u']==$datapost['user']){
		echo "<br><a href=\"edit-Post.php?id=$datapost[id_post]\" ><linkTambahKat>edit</linkTambahKat></a>";}
	echo "<br><br>";

echo "</div><br>";
echo "<div id=\"kotakkom\">";
echo "<a style=\"font-size:24px; font-weight:bold\">Komentar<br><br>";
$allkomentar=mysql_query("SELECT * FROM komentar where id_post= '$_GET[id_post]'");
while($datakomentar=mysql_fetch_array($allkomentar)){
	echo "<div id=\"kom\">";
	$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$datakomentar[username]'"));
	$xxx=$nama['avatar'];
	echo("<a href=\"profil.php?user=$datakomentar[username]\"><img src='$xxx' width=\"30\" height=\"30\"></a>");
	echo "".$nama['nama']."<br><br>";
	$ganti=$datakomentar['content'];
	$badword=mysql_query("SELECT * FROM badword");
	while($bad=mysql_fetch_array($badword)){
	$data=$ganti;
	$ganti=str_replace($bad['bad'],$bad['replace'],$data);
	}
	$em=mysql_query("SELECT * FROM emot");
	$replace=$ganti;
	while($emo=mysql_fetch_array($em)){
		$id=("$emo[id_emot]");
		$new=("<img src=\"$emo[emot]\">");
		$data=$replace;
		$replace=str_replace($id,$new,$data);
		}
	echo "Isi : ".$replace."<br>";
	echo "<i style=\"font-size:12px; color:rgb(0,153,255)\">".$datakomentar['date']."</i></br>";
	$h="hapusKomentar";
	$id=$_GET['id_post'];
	$idkom=$datakomentar['id_komentar'];
	if($_SESSION['u']=="admin" OR $_SESSION['u']==$datakomentar['username']){
		echo "<a href=\"proses-Hapus.php?e=$h&&id=$id&&idkom=$idkom\" ><linkTambahKat>delete<linkTambahKat></a>";
	}
	echo "</div>";
	echo "<br><br>";
}
?>		<center>
<form method="post" action="proses-Login.php">
<input type="hidden" name="e" value="komentar" />
<input type="hidden" name="id_post" value="<?PHP echo "$_GET[id_post]" ?>" />
<textarea name="komentar" cols="50"></textarea>
<input type="submit" value="Kirim" />
</form></center></div>
        <div id="kotak_nav_atas">
<div id="stylelink_atas">
<a href="default.php">Beranda </a>
<a href="pesan.php">Pesan </a>
<?php echo "<a href=\"profil.php?user=".$_SESSION['u']."\">".$_SESSION['jeneng']."</a>";
		   if($_SESSION['u']=="admin"){
			   echo "<a href=\"lihat-Member.php\">Lihat Member</a>";
			   echo("<a href=\"badwords.php\">Lihat Bad Words</a>");
		   }?>
           <a href="emoticon.php">List Emoticon</a>
           <a href="logout.php">Logout </a>
</div></div></div>

        
<div class="footer"><span class="teks_bawah"><a href="kelompok9.php">Kelompok 9</a><br />
Program Teknologi Informasi dan Ilmu Komputer<br />
@ 2014<br /></span></div></div>
</body>
</html>
