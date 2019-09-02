<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
include("koneksi.php");
$u=$_POST['username'];
$n=$_POST['nama'];
$p=md5($_POST['password']);
$b=$_POST['biodata'];

$target_path = "image/";
$target_path = $target_path.basename( $_FILES['gambar']['name']);
$in=mysql_query("INSERT INTO user VALUES ('$u','$n','$p','$b','$target_path')");
if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target_path)) {
echo "The file ". basename( $_FILES['gambar']['name']).
" has been uploaded";
$_SESSION['u']=$_POST['username'];
	$_SESSION['p']=$_POST['password'];
	$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$_SESSION[u]'"));
	$_SESSION['jeneng']=$nama['nama'];
	$_SESSION['avatar']=$nama['avatar'];
header("location:beranda.php");
} else{
echo "There was an error uploading the file, please try
again!";
}
if($in){
	echo("Berhasil");
	$_SESSION['u']=$_POST['username'];
	$_SESSION['p']=$_POST['password'];
	$nama=mysql_fetch_array(mysql_query("SELECT * FROM user where username='$_SESSION[u]'"));
	$_SESSION['jeneng']=$nama['nama'];
	$_SESSION['avatar']=$nama['avatar'];
	header("location:beranda.php");
}

?>
</body>
</html>
