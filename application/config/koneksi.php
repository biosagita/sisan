<?php 
$server = "localhost";

$username = "root";
$password = "rachmats8311";
$database = "db_antrian";
// Koneksi dan memilih database di server 
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");?>