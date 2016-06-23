<?
session_start();
include"../application/config/koneksi.php";
$waktu_panggil=date("H:i:s");
$tanggal_transaksi=date(Ymd);
?>
<script src="../jquery/jquery-latest.js" type="text/javascript"></script>
<script src="../jquery/jquery-1.4.3.min.js" type="text/javascript"></script>
<?

$sql_count_disp=mysql_query("Select no_ticket from transaksi where status_transaksi='0' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
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
    $sql_cek_fw=mysql_query("Select id_group_layanan,id_layanan_forward,status_popup from layanan where id_layanan='$_countmk3[id_layanan]'");
	$data_fw=mysql_fetch_array($sql_cek_fw);

    $sql_cek_fw_group=mysql_query("Select id_group_layanan from layanan where id_layanan='$data_fw[id_layanan_forward]'");
	$data_fw_group=mysql_fetch_array($sql_cek_fw_group);

//	if($data_fw[status_popup] == 1){
			?>
			<script>
			var KTP=prompt("KTP");
			var Visitor=prompt("Nama Visitor");
			var No_HP=prompt("No HP");

			if (KTP!=null)
			  {
				 $("#load").load("proses.php?proses=next&&Visit_Reg=1&&KTP="+ KTP +"&&Nama="+ Visitor +"&&No_HP="+No_HP);
					$.ajaxSetup({ cache: false });
			  }

			</script>
			<?
   if ($_GET[Visit_Reg] == 1){
	  $sql=mysql_query("Insert Into visitor(ktp,no_hp,nama_visitor) values ('$_GET[KTP]','$_GET[Nama]','$_GET[No_HP]')");   
	  
   }
	  $sql=mysql_query("UPDATE transaksi set  status_transaksi='1',waktu_panggil='$waktu_panggil',id_loket='$_SESSION[loket]' where no_ticket='$next_id' and id_group_layanan='$_SESSION[id_group_layanan]' and tanggal_transaksi='$tanggal_transaksi'");
	
	if ($_countmk3[tanggal_transaksi] > '0')
	{
	  $sql=mysql_query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
	  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '$data_fw[id_layanan_forward]','$data_fw_group[id_group_layanan]','0')");
	  $sql=mysql_query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' ");
	}
	else{
	//close cek layanan forward------------------------------------------------------------------------------
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
  $sql=mysql_query("UPDATE transaksi set  status_transaksi='0', id_loket='' where no_ticket='$_GET[id_undo]' and id_loket='$_SESSION[loket]' and tanggal_transaksi='$tanggal_transaksi' ");
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
    

?>
<div  id="load">
</div>