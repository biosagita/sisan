<html>
<body style="font-size:12px;">
<?php

print"<table width=100%>
			<tr><td><b>Biem Benjamin Center</b> 
			<tr><td>

			<tr><th><font size=15px>DATA RELAWAN</font><BR> 
		</table>";
print"<p></p>";
$tgl=date("d-m-Y");
print"<table width=100%>
			<tr><td width=10%>Tanggal Cetak:<td> : $tgl		 
		</table>";

print"<table width=100% border=1 cellpadding=3 cellspacing=0 >
			<tr><th width=5%  > NO
				 <th width=20% > NAMA RELAWAN
				 <th width=10% > STATUS			 
				 <th width=2% > J/K
				 <th width=10% > KEC
				 <th width=10% > KOTA				 
				 <th width=17% > Hp
				 <th width=8% > PIN BB
				 <th width=15% > EMAIL
				 <th width=20% > PARAF
";

$no=1;			
foreach($data_master as $data_master_result):
  	print"<tr>
  			<td align=center width=5% height=50px>$no
  	
  			<td   >$data_master_result->f_emp_name
  			<td align=center >$data_master_result->f_status_name
  			<td align=center >$data_master_result->f_emp_gender

  			<td  >$data_master_result->f_city_name
  			<td  >$data_master_result->f_kec_name
  			<td align=center >$data_master_result->f_emp_mobile_phone
  			<td align=center >$data_master_result->f_emp_pin_bb
  			<td align=center >$data_master_result->f_emp_email
  			<td  >
  			";
  			
$no++;  			
endforeach;
?>
</body>
</html>