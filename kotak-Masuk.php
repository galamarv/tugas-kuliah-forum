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
<body >

<div id="wrapper";>
<div class="header"><a href="http://forum.lazioindonesia.com/" target="_blank"><img src="image/LI.png" height="200px" width="230px"/></a></div>

<div class="header_atas"><span class="teks_judul"><marquee bgcolor="#000000" behavior="scroll" direction="left">Selamat datang di forum Laziale se-Indonesia<?php
include("koneksi.php");
$nama=mysql_fetch_array(mysql_query("SELECT nama FROM user where username='$_SESSION[u]' AND password='$_SESSION[p]'"));
echo $nama['nama'];  
		?>!</marquee></span><br /><h2 style="letter-spacing:0.45cm"><center>Forum Big Family of Lazio Indonesia</center></h2></center></div>	
<div class="container"><h1 align="center">Kotak Masuk</h1>
<table border="2px" bgcolor="#00FFFF">
<?php
$allpost=mysql_query("SELECT * FROM pesan where receiver='$_SESSION[u]' ORDER BY date DESC");
while($datapost=mysql_fetch_array($allpost)){
	$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$datapost[sender]'"));
	if($nama!=$_SESSION['u']){
	$xxx=$nama['avatar'];
	echo("<tr><td width=\"50\"><a href=\"profil.php?user=$datapost[sender]\"><img src='$xxx' width=\"50\" height=\"50\"></a>");
	echo "".$nama['nama']." - ";
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
	echo "<br><i style=\"font-size:12px; color:rgb(0,153,255)\">".$datapost['date']."</i></br>";
	$balas="balas";
	$delete="pesan";
	$id=$datapost['id_pesan'];
	echo "<a href=\"tulis-Pesan.php?receiver=$datapost[sender]&e=$balas\" style=\"color:rgb(0,102,204)\">   Balas</a>";
	echo "<a href=\"proses-Hapus.php?id=$id&e=$delete\" style=\"color:rgb(0,102,204)\">   Delete</a>";
	echo "<br></td></tr><br>";}
}
echo "</table>";
?>		</div>
        <div id="kotak_nav_atas">
<div id="stylelink_atas">
<a href="beranda.php">Beranda </a>
<a href="pesan.php">Pesan </a>
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
