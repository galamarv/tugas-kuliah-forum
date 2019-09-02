<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style type="text/css">
#kotak{
	height:auto; width:auto;
border-radius : 30px 30px 30px 30px;
	border-color: #FFFFFF;
	border-width: 3px;
	border-style: solid;
}
.judul {
	text-align: center;
	color: #0F9;
	font-family: Verdana, Geneva, sans-serif;
}
.masuk {
	text-align: center;
	color: #FFFFFF;
	font-family: "Comic Sans MS", cursive;
}
.tabel {
	text-align: center;
}
.button {
	text-align: center;
}
.huruf {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
#bawah {
	color: #FFF;
	font-size: large;
}
#teks {
	color: #06C;
}
link {
	color: #990;
}
</style>
</head>

<body background="image/Lazio_Wallpaper.jpg"><center><br /><br /><h1 style="color:rgb(255,255,255)">Selamat Datang di Forum Big Family of Lazio Indonesia</h1>
<div id="kotak">
<h3>Silahkan Masuk ke akun Anda</h3>
<form method="post" action="proses-Login.php">
<input type="hidden" name="e" value="login">
<table border="0" align="center">
<tr>
<td width="61">Username</td>
<td width="242"><input name="username" type="text" size="40" required="required" /></td>
</tr>
<tr><td><br> </td></tr>
<tr>
<td >Password</td>
<td><input name="password" type="password" size="40" required="required" /></td>
</tr>
<tr><td> <br /></td></tr>
<tr>
<td colspan="2" class="button"><input type="submit" value="Login" /></td>
</tr>
<tr><td> <br /></td></tr>
</table>
</form>
</div>

<br />Silahkan daftar jika Anda belum terdaftar<br /><br />
<form method="post" action="daftar.php">
<input type="submit" value="Sign Up" />
</form>
</body>
</html>
