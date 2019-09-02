<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proses</title>
</head>

<body>
<?php
session_start();
$today=date("F j, y, g:i a");
include("koneksi.php");
if($_POST['e']=="login"){
	
$pass=md5($_POST['password']);
$q = mysql_query("SELECT nama FROM user WHERE username = '$_POST[username]' AND password = '$pass'");
$ada=mysql_num_rows($q);
if($ada>0){
	echo("Berhasil");
	$_SESSION['u']=$_POST['username'];
	$_SESSION['p']=$_POST['password'];
	$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$_SESSION[u]'"));
	$_SESSION['jeneng']=$nama['nama'];
	$_SESSION['avatar']=$nama['avatar'];
	header("location:beranda.php");
}
else{
	echo("Belum Terdaftar");
}
}
else if($_POST['e']=="posting"){
	$uname=$_SESSION['u'];
	$post=$_POST['teks'];
	$jud=$_POST['judul'];
	$kat=$_POST['kategori'];
	
	$bad=mysql_query("SELECT * FROM badword");
	while($databad=mysql_fetch_array($bad)){
	$newpost=str_replace($databad['bad'],$databad['replace'],$post);
	}
	mysql_query("INSERT INTO post VALUES (NULL,'$uname','$jud', '$newpost', NOW(), '$kat')");
	header("location:beranda.php");
}
else if($_POST['e']=="komentar"){
	$idpost=$_POST['id_post'];
	mysql_query("INSERT INTO komentar VALUES (NULL,'$idpost','$_SESSION[u]', '$_POST[komentar]', NOW())");
	header("location:postingan.php?id_post=$idpost");
}
else if($_POST['e']=="pesan"){
	mysql_query("INSERT INTO pesan VALUES (NULL,'$_SESSION[u]','$_POST[receiver]', '$_POST[pesan]', NOW())");
	header("location:pesan-Terkirim.php");

}
else if($_POST['e']=="editProfil"){
		
	$target_path = "image/";
	$target_path = $target_path.basename( $_FILES['avatar']['name']);
	$in=mysql_query("UPDATE user SET username='$_POST[username]', nama='$_POST[nama]', biodata='$_POST[biodata]',avatar='$target_path'  WHERE username='$_SESSION[u]'");
	if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
		echo "The file ". basename( $_FILES['avatar']['name'])." has been uploaded";
		}
		else{
			echo "There was an error uploading the file, please try
			again!";
			}
			if($in){
				echo("Berhasil");
				$_SESSION['u']=$_POST['username'];
				$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$_SESSION[u]'"));
				$_SESSION['jeneng']=$nama['nama'];
				$_SESSION['avatar']=$nama['avatar'];
				header("location:profil.php?user=$_SESSION[u]");
				}
				}
else if($_POST['e']=="tambahKat"){
	mysql_query("INSERT INTO kategori VALUES(NULL,'$_POST[namaKat]')");
	header("location:beranda.php");
}
else if($_POST['e']=="editKat"){
	mysql_query("UPDATE kategori SET content='$_POST[namaKat]' WHERE id_kategori='$_POST[id]'");
	header("location:beranda.php");
}
else if($_POST['e']=="tambahBadword"){
	mysql_query("INSERT INTO badword VALUES('$_POST[bad]','$_POST[replace]')");
	header("location:badwords.php");
}

else if($_POST['e']=="editPassword"){
	if($_POST['password']==$_POST['password-confirmed']){
		$password=md5($_POST['password']);
	mysql_query("UPDATE user SET password='$password' WHERE username='$_SESSION[u]'");
	header("location:profil.php?user=$_SESSION[u]");}
	else{
		$nilai="beda";
		header("location:edit-Password.php?nilai=$nilai");
	}
}
else if($_POST['e']=="tambahEmot"){
	$id=$_POST['emot'];
$target_path = "emoticon/";
	$target_path = $target_path.basename( $_FILES['gambar']['name']);
	$in=mysql_query("INSERT INTO emot values ('$id', '$target_path')");
	if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path)) {
		echo "The file ". basename( $_FILES['gambar']['name'])." has been uploaded";
		header("location:emoticon.php");
		}
		else{
			echo "There was an error uploading the file, please try
			again!";
			}
			if($in){
				echo("Berhasil");
				
				header("location:emoticon.php");
				}
}

else if($_POST['e']=="editAvatar"){
$target_path = "image/";
	$target_path = $target_path.basename( $_FILES['avatar']['name']);
	$in=mysql_query("UPDATE user SET avatar='$target_path'  WHERE username='$_SESSION[u]'");
	if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
		echo "The file ". basename( $_FILES['avatar']['name'])." has been uploaded";
		header("location:emoticon.php");
		}
		else{
			echo "There was an error uploading the file, please try
			again!";
			}
			if($in){
				echo("Berhasil");
				$_SESSION['avatar']=$nama['avatar'];
				header("location:profil.php?user=$_SESSION[u]");
				}
}
else if($_POST['e']=="editPost"){
	$uname=$_SESSION['u'];
	$new=$_POST['teks'];
	$jud=$_POST['judul'];
	$kat=$_POST['kategori'];
	
	$bad=mysql_query("SELECT * FROM badword");
	while($databad=mysql_fetch_array($bad)){
	$newpost=str_replace($databad['bad'],$databad['replace'],$post);
	}
	mysql_query("UPDATE post set judul='$jud', content='$new', date=NOW(), kategori='$kat' WHERE id_post='$_POST[id]'");
	$id=$_POST['id'];
	header("location:postingan.php?id_post=$id");
}
else if($_POST['e']=="bad"){
	$id=$_POST['id'];
	$bad=$_POST['bad'];
	$sensor=$_POST['sensor'];
	mysql_query("UPDATE `badword` SET `bad`='$bad', `replace`='$sensor' WHERE `bad`='$id'");
	header("location:badwords.php");
		
}
?>

</body>
</html>
