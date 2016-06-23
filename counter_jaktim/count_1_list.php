<?
session_start();
include"../application/config/koneksi.php";
print"<div id=title_data>Data Finish</div>";
$tanggal_transaksi=date(Ymd);

$sql_ct=mysql_query("Select count(*)as ct from transaksi inner join layanan ON transaksi.id_layanan=layanan.id_layanan  where status_transaksi='5' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'");
$mk3_ct=mysql_fetch_array($sql_ct);
print"<div id=counter_data>$mk3_ct[ct]</div>";
print"<div style='height:250px;width:100%;float:left;height:200px; overflow:auto;'>";

$sql=mysql_query("Select no_ticket,layanan.nama_layanan,waktu_ambil from transaksi inner join layanan ON transaksi.id_layanan=layanan.id_layanan  where status_transaksi='5' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' order by id_transaksi asc ");
print"<table border=0 align=center cellpadding=0 cellspacing=0 width=100% >";
echo"<tr align=center id=tr_head>
							<th width=1%>NO
                            <th width=20% >QUEUE NO
                            <th  >TYPE IN
                            <th width=15% >TIME IN";
$n3=1;
while($mk3=mysql_fetch_array($sql))
{
echo"<tr  id=td_row class=\"terang\"
              onMouseOver=\"this.className='sorot'\"
              onMouseOut=\"this.className='terang'\" >
			  <td align=center id=dt >$n3
			  <td align=center id=dt>$mk3[no_ticket]
			  <td align=left id=dt>$mk3[nama_layanan]
			  <td align=left id=dt>$mk3[waktu_ambil]			  
			  ";
$n3++;
}
print"</table>";
?>	