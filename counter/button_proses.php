<?
include"protected/config/koneksi.php";
$sql_count_disp=mysql_query("Select id_transaksi from transaksi where status_transaksi='0' order by id_transaksi asc ");
$sql_count_disp_mk3=mysql_fetch_array($sql_count_disp);
$next_id=$sql_count_disp_mk3[id_transaksi];

$sql_count_recall=mysql_query("Select id_transaksi from transaksi where status_transaksi='1' order by id_transaksi asc ");
$sql_count_recall_mk3=mysql_fetch_array($sql_count_recall);
$recall_id=$sql_count_recall_mk3[id_transaksi];

?>
<? print"<a href='http:proses.php?proses=next&id=$next_id' class=button2 >Next</a>"; ?> 
<? print"<a href='http:proses.php?proses=recall&id_recall=$recall_id' class=button2 >Recall</a>"; ?> 
<? print"<a href='http:proses.php?proses=skip&id_skip=$next_id' class=button2 >Skip</a>";  ?> 
<? print"<a href='http:proses.php?proses=forward&id=$next_id' class=button2 >Forward</a>"; ?> 
