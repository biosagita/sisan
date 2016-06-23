<?
session_start();
?>
<script>
function close_window() {
    window.close();
  }
</script>
<?
include"../application/config/koneksi.php";
$waktu_panggil=date("H:i:s");
$tanggal_transaksi=date(Ymd);


$sql_count_disp=mysql_query("Select no_ticket,id_visitor from transaksi where status_transaksi='0' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
$sql_count_disp_mk3=mysql_fetch_array($sql_count_disp);
$next_id=$sql_count_disp_mk3[no_ticket];

$sql_count=mysql_query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
$_countmk3=mysql_fetch_array($sql_count);

$sql_count_skip=mysql_query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
$sql_count_skip_mk3=mysql_fetch_array($sql_count_skip);
$skip_id=$sql_count_skip_mk3[id_transaksi];

if($_GET[proses]=='next')
{
    //cek Layanan Forward-------------------------------------------
    $sql_cek_fw=mysql_query("Select id_group_layanan,id_layanan_forward from layanan where id_layanan='$_countmk3[id_layanan]'");
	$data_fw=mysql_fetch_array($sql_cek_fw);

    $sql_cek_fw_group=mysql_query("Select id_group_layanan from layanan where id_layanan='$data_fw[id_layanan_forward]'");
	$data_fw_group=mysql_fetch_array($sql_cek_fw_group);

  	  //$sql=mysql_query("UPDATE visitor set  no_hp='$_GET[no_hp]',nama_visitor='$_GET[visitor_name]', id_alur='$_GET[id_alur]' where id_visitor='$_GET[id_visitor]'");

  	  $sql=mysql_query("Insert Into visitor (no_hp, nama_visitor) values('$_GET[no_hp]','$_GET[visitor_name]')");
	  
	if ($_GET[id_fw] > 0)
	{
	  $alurs=$_GET[id_alur] + 1;
	  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi,id_visitor) 
	  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '$_GET[id_fw]','$data_fw_group[id_group_layanan]','0','$_GET[id_vst]')");
	  

  	  $sql=mysql_query("UPDATE visitor set   id_alur='$alurs' where id_visitor='$_GET[id_visitor]'");
	  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' ");
	  
	}
	else{
	  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' ");
    }
	}
if($_GET[proses]=='recall')
{ 
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='1' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'");  
}
if($_GET[proses]=='skip')
{
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='3' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'");
}
if($_GET[proses]=='undo')
{
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='0', id_loket='' where no_ticket='$_GET[id_undo]' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi' ");
    print"<meta http-equiv='refresh' content='0; url=http:media.php'>";
}

if($_GET[proses]=='forward1')
{
  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '1','1','0')");
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' ");
  
}
if($_GET[proses]=='forward2')
{
  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '2','2','0')");
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' ");
  
}
if($_GET[proses]=='forward3')
{
  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '3','2','0')");
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' ");
  
}
if($_GET[proses]=='forward4')
{
  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '4','3','0')");
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'");
  
}
if($_GET[proses]=='forward5')
{
  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '5','4','0')");
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'");
  
}
if($_GET[proses]=='forward6')
{
  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '6','4','0')");
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi'");

}
if($_GET[proses]=='request')
{
 
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='1',waktu_panggil='$waktu_panggil',id_loket='$_SESSION[loket]' where no_ticket='$_GET[no_ticket]' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi'");  
  
}
    

?>
