<?php
session_start();
include "../application/config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST[username]);
$pass     = anti_injection(md5($_POST[password]));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{

$login=mysql_query("SELECT id_user,username,password,id_role,user_group.id_group_layanan FROM user inner join user_group ON user.id_user_group=user_group.id_user_group WHERE username='$username'  AND password='$pass' ");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);


$sql_lk=mysql_query("Select group_loket.id_group_layanan from loket inner join group_loket ON loket.id_group_loket=group_loket.id_group_loket  where id_loket='$_POST[id_loket]' ");
$mk3_lk=mysql_fetch_array($sql_lk);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[id]     = $r[id_user];
  $_SESSION[namauser]     = $r[username];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[id_role];
  $_SESSION[loket]    = $_POST[id_loket];
  $_SESSION[id_group_layanan] = $mk3_lk[id_group_layanan];

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();
	$waktu=date("Y-m-d H:i:s");
	$sql=mysql_query("UPDATE user set  last_login='$waktu' where id_user='$r[id_user]' ");
  
 header('location:media.php');
}
else{
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
}
?>
