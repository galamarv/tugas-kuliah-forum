<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include ("koneksi.php");
if($_GET['e']=="hapusPost"){
	mysql_query("DELETE FROM post WHERE id_post='$_GET[id]'");
	header("location:beranda.php");
}
else if($_GET['e']=="hapusMember"){
	mysql_query("DELETE FROM user WHERE username='$_GET[user]'");
	header("location:lihat-Member.php");
}
else if($_GET['e']=="hapusKomentar"){
	mysql_query("DELETE FROM komentar WHERE id_komentar='$_GET[idkom]'");
	$id=$_GET['id'];
	header("location:postingan.php?id_post=$id");
}
else if($_GET['e']=="hapusKategori"){
	mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
	header("location:beranda.php");
}
else if($_GET['e']=="hapusEmot"){
	mysql_query("DELETE FROM emot WHERE id_emot='$_GET[id]'");
	header("location:emoticon.php");
}
else if($_GET['e']=="bad"){
	mysql_query("DELETE FROM badword WHERE bad='$_GET[id]'");
	header("location:badwords.php");
}
else if($_GET['e']=="pesan"){
	mysql_query("DELETE FROM pesan WHERE id_pesan='$_GET[id]'");
	header("location:kotak-Masuk.php");
}
else if($_GET['e']=="pesant"){
	mysql_query("DELETE FROM pesan WHERE id_pesan='$_GET[id]'");
	header("location:pesan-Terkirim.php");
}
?>
</body>
</html>
