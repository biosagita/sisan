<?
$server = "192.168.0.101";
$username = "root";
$password = "vertrigo";
$database = "db_antrian_new_des_2013";


// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$sql=mysql_query("Insert Into visitor(no_hp) values ('$_GET[tes]')");


?>
