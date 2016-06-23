<?
session_start();
include"../application/config/koneksi.php";
$tanggal_transaksi=date(Ymd);

$sql_count=mysql_query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
$_countmk3=mysql_fetch_array($sql_count);
print"       

		<div id=count_disp >$_countmk3[no_ticket]</div>
		<div id=nama_gl_disp >&nbsp;&nbsp; Transaction :$_countmk3[nama_group_layanan] </div>
		<div id=loket_disp >$_SESSION[loket]</div>
		<div id=waktu_count_disp >&nbsp;&nbsp; Start : $_countmk3[waktu_panggil]</div>
		<div id=login_id >&nbsp;&nbsp; Login : $_SESSION[namauser]</div>"; 
?>	