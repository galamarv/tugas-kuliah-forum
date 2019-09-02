<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pendaftaran</title>
</head>

<body background="image/Lazio_Wallpaper.jpg">
<center>
<h1>Daftar</h1>
<h3>Silahkan masukkan data diri Anda untuk mendaftar</h3>
<form method="post" action="proses-Daftar.php" enctype="multipart/form-data">
<input type="hidden" name="e" value="daftar"/>
<table border="0">
<tr>
<td>Username</td><td>:</td>
<td><input name="username" type="text" size="35" required="required"/></td>
</tr>
<tr>
<tr>
<td>Nama</td><td>:</td>
<td><input name="nama" type="text" size="35" required="required"/></td>
</tr>
<tr>
<td>Password</td><td>:</td>
<td><input name="password" type="password" size="35" required="required"/></td>
</tr>
<tr>
<td>Biodata</td><td>:</td>
<td><textarea name="biodata" cols="28" rows="6"></textarea></td>
</tr>
<tr><td>Foto</td><td>:</td>
<td><input name="gambar" type="file" required="required"/></td></tr>
<tr><td></td><td></td>
<td colspan="2"><input type="submit" value="Daftar" /></td>
</tr>
</table>
</form>
</center>
</body>
</html>
