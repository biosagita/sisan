<html>
<head>
<title>Antrian</title>
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    form.password.focus();
    return (false);
  }
   if (form.id_loket.value == ""){
    form.id_loket.focus();
    return (false);
  }
  return (true);
}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body OnLoad="document.login.username.focus();">
<div id="header">
  <div id="content">

<form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
<table id=log >
		
<tr><td><h1>Login</h1></td></tr>
<tr><td>Username</td><td> : <input type="text" name="username"></td></tr>
<tr><td>Password</td><td> : <input type="password" name="password"></td></tr>
<tr><td>Loket</td><td> :
<?
include"../application/config/koneksi.php";
print"<select name='id_loket'>";
$sql_l=mysql_query("Select * from loket ");
    print"<option value=''>-Pilih Loket-</option>";
while($loket=mysql_fetch_array($sql_l)){	
    print"<option value='$loket[id_loket]'>$loket[nama_loket]</option>";
}
	print"</selected>";
?>
<tr><td colspan="2"><input type="submit" value="Login"></td></tr>
</table>
</form>


<p>&nbsp;</p>
  </div>
</div>
</body>
</html>
