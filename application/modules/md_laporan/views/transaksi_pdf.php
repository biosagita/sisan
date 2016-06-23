<html>
<body style="font-size:12px;">
<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename = relawan.xls");
header("Pragma: no-cache");
header("Expires: 0"); 

print"<table width=100%>
			<tr><td><b>Imigrasi Jakarta Utara</b> 
			<tr><td>

			<tr><th><font size=15px>Data Laporan Antrian</font><BR> 
		</table>";
print"<p></p>";
$tgl=date("d-m-Y");
print"<table width=100%>
			<tr><td width=10%>Tanggal Cetak:<td> : $tgl		 
		</table>";

print"<table width=100% border=1 cellpadding=3 cellspacing=0 >
			<tr><th width=5%  > NO
				 <th width=20% > Tanggal 
				 <th width=10% > Mulai		 
				 <th width=2% > Selesai
				 <th width=15% > No Tiket
				 <th width=25% > Layanan
				 <th width=5% > Group Layanan
				 <th width=5 > Status				 
				 <th width=10% > User
				 <th width=10% > Loket				 
";

$no=1;			
foreach($data_master as $data_master_result):
  	print"<tr>
  			<td align=center width=5% >$no
  	
  			<td align=center  >$data_master_result->tanggal_transaksi
  			<td align=center >$data_master_result->waktu_ambil
  			<td align=center >$data_master_result->waktu_panggil
  			<td align=center >$data_master_result->no_ticket
  			<td  >$data_master_result->nama_layanan
  			<td  >$data_master_result->nama_group_layanan
  			<td align=center >$data_master_result->status_transaksi
  			<td  >$data_master_result->username
  			<td  >$data_master_result->nama_loket

  			";
  			
$no++;  			
endforeach;
?>
</body>
</html>