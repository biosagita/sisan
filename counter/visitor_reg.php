<?
session_start();
?>
<script src="../jquery/jquery-latest.js" type="text/javascript"></script>
<script src="../jquery/jquery-1.4.3.min.js" type="text/javascript"></script>

<script>

function close_window() {
    window.close();
  }

</script>

<?
include"../application/config/koneksi.php";
$waktu_panggil=date("H:i:s");
$tanggal_transaksi=date(Ymd);
if($_GET[r]=="next"){
$sql_count_disp=mysql_query("Select no_ticket,id_visitor from transaksi where status_transaksi='0' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
$sql_count_disp_mk3=mysql_fetch_array($sql_count_disp);
$next_id=$sql_count_disp_mk3[no_ticket];

//  $sql=mysql_query("UPDATE transaksi set  status_transaksi='1',waktu_panggil='$waktu_panggil',id_loket='$_SESSION[loket]' where no_ticket='$next_id' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi'");

  //print"<meta http-equiv='refresh' content='2; url=http:visitor_reg.php'>";

}

$sql_count_disp=mysql_query("Select no_ticket,id_visitor from transaksi where status_transaksi='2' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
$sql_count_disp_mk3=mysql_fetch_array($sql_count_disp);

    $sql_reg=mysql_query("Select visitor.id_visitor,no_hp,nama_visitor,transaksi.id_layanan from visitor inner join transaksi ON visitor.id_visitor=transaksi.id_visitor where visitor.id_visitor='$sql_count_disp_mk3[id_visitor]' order by id_layanan desc");
	$data_reg=mysql_fetch_array($sql_reg);
	
    $sql_alur=mysql_query("Select id_alur from alur where id_layanan='$data_reg[id_layanan]' ");
	$data_alur=mysql_fetch_array($sql_alur);
	
	$sql_count2=mysql_query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan,id_visitor from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk4=mysql_fetch_array($sql_count2);
	
    $sql_cek_fw=mysql_query("Select id_group_layanan,id_layanan_forward from layanan where id_layanan='$_countmk4[id_layanan]'");
	$data_fw=mysql_fetch_array($sql_cek_fw);
	
//print"<h1>tes $_countmk4[tanggal_transaksi] tes ya $data_fw[id_layanan_forward] - $_countmk4[id_visitor]</font>";

print"<form action='proses.php' method=GET>
       <input type='hidden' name=id_gr_fw value='$data_fw[id_group_layanan]'>

       <input type='hidden' name=id_fw value='$data_fw[id_layanan_forward]'>
       <input type='hidden' name=id_vst value='$_countmk4[id_visitor]'>";

print"<table width=80% align=center>
	<tr><td bgcolor=#efefef colspan=2><font size=5><b>Registrasi Visitor
	<input type=hidden name=proses value=next >
	<tr><td>Id Alur<td><input type=text name=id_alur value=$data_alur[id_alur] >

	<tr><td>Id Visitor<td><input type=text readonly=readonly value='$data_reg[id_visitor]' name=id_visitor>
	<tr><td>No Ticket<td><input type=text readonly=readonly value='$next_id' name=no_ticket>
	
	<tr><td>No Hp<td><input type=text name=no_hp value='$data_reg[no_hp]'>
	<tr><td>Nama Visitor<td><input type=text value='$data_reg[nama_visitor]' name=visitor_name>

	<tr><td><input type='submit' value='Simpan' >
	<a href='http:proses.php?proses=recall&&pr=close'  ><input type=button value='Recall'></a>
	<a href='http:proses.php?proses=skip'  ><input type=button value='Skip'></a>
		
	</table>";
?>	
