<?php

error_reporting(0);

session_start();

if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){

  echo "<link href='style.css' rel='stylesheet' type='text/css'>

 <center>Untuk mengakses modul, Anda harus login <br>";

  echo "<a href=index.php><b>LOGIN</b></a></center>";

}

else{
$tanggal_transaksi=date(Ymd);
?>

<html>
<head>
<title>
Antrian
</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/main.css" rel="stylesheet" type="text/css">

<script src="../jquery/jquery-latest.js" type="text/javascript"></script>
<script src="../jquery/jquery-1.4.3.min.js" type="text/javascript"></script>

<script>
var XMLHttpRequestObject = false;
if (window.XMLHttpRequest) {
    XMLHttpRequestObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
function getJam(sumberdata, divID) {
  if(XMLHttpRequestObject) {
    var obj = document.getElementById(divID);
    XMLHttpRequestObject.open("GET",sumberdata);
    XMLHttpRequestObject.onreadystatechange = function() {
      if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
        obj.innerHTML = XMLHttpRequestObject.responseText;
        setTimeout("getJam('jam.php','divjam')",1000);
      }
    }
  XMLHttpRequestObject.send(null);
  }
}
window.onload=function(){
setTimeout("getJam('jam.php','divjam')",1000);
}

 $(document).ready(function() {
 	 $("#response_0").load("count_0_list.php");
   var refreshId = setInterval(function() {
      $("#response_0").load('count_0_list.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});

 $(document).ready(function() {
 	 $("#response_1").load("count_1_list.php");
   var refreshId = setInterval(function() {
      $("#response_1").load('count_1_list.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});
 $(document).ready(function() {
 	 $("#response_2").load("count_2_list.php");
   var refreshId = setInterval(function() {
      $("#response_2").load('count_2_list.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});

 $(document).ready(function() {
 	 $("#display_count").load("count_disp.php");
   var refreshId = setInterval(function() {
      $("#display_count").load('count_disp.php?randval='+ Math.random());
   }, 1000);
   $.ajaxSetup({ cache: false });
});

   $(document).ready(function ()
   {
	  $("#btnnext").click(function (e)
      {
		$("#output_button").load("proses.php?proses=next");
         e.preventDefault();
      });
   });

   $(document).ready(function ()
   {
	  $("#btnrecall").click(function (e)
      {
		$("#output_button").load("proses.php?proses=recall");
         e.preventDefault();
      });
   });

   $(document).ready(function ()
   {
	  $("#btnskip").click(function (e)
      {
		$("#output_button").load("proses.php?proses=skip");
         e.preventDefault();
      });
   });
   $(document).ready(function ()
   {
	  $("#btnundo").click(function (e)
      {
		$("#output_button").load("proses.php?proses=undo");
         e.preventDefault();
      });
   });
   $(document).ready(function ()
   {
	  $("#btnforward1").click(function (e)
      {
		$("#output").load("proses.php?proses=forward1");
         HideDialog();
         e.preventDefault();
      });
   });

   $(document).ready(function ()
   {
	  $("#btnforward2").click(function (e)
      {
		$("#output").load("proses.php?proses=forward2");
         HideDialog();
         e.preventDefault();
      });
   });
   $(document).ready(function ()
   {
	  $("#btnforward3").click(function (e)
      {
		$("#output").load("proses.php?proses=forward3");
         HideDialog();
         e.preventDefault();
      });
   });
   $(document).ready(function ()
   {
	  $("#btnforward4").click(function (e)
      {
		$("#output").load("proses.php?proses=forward4");
         HideDialog();
         e.preventDefault();
      });
   });
   $(document).ready(function ()
   {
	  $("#btnforward5").click(function (e)
      {
		$("#output").load("proses.php?proses=forward5");
         HideDialog();
         e.preventDefault();
      });
   });
   $(document).ready(function ()
   {
	  $("#btnforward6").click(function (e)
      {
		$("#output").load("proses.php?proses=forward6");
         HideDialog();
         e.preventDefault();
      });
   });
   
   
      $(document).ready(function ()
   {
      $("#btnShowSimple").click(function (e)
      {
         ShowDialog(false);
         e.preventDefault();
      });

      $("#btnShowModal").click(function (e)
      {
         ShowDialog(true);
         e.preventDefault();
      });

      $("#btnClose").click(function (e)
      {
         HideDialog();
         e.preventDefault();
      });


	  $("#btnproses").click(function (e)
      {
		$("#output").load("proses.php");
         HideDialog();
         e.preventDefault();
      });
   });

   function ShowDialog(modal)
   {
      $("#overlay").show();
      $("#dialog").fadeIn(300);

      if (modal)
      {
         $("#overlay").unbind("click");
      }
      else
      {
         $("#overlay").click(function (e)
         {
            HideDialog();
         });
      }
   }

   function HideDialog()
   {
      $("#overlay").hide();
      $("#dialog").fadeOut(300);
   }

</script>
</head>
<body>
<div  id="kiri">
<? include"menu.html"; ?>
</div>
<div  id="header_display_count">
		<div id=header_count_disp >Ticket</div>
		<div id=header_nama_gl_disp ></div>
		<div id=header_loket_disp >Counter</div>
</div>

<div  id="display_count">
</div>
<div  id="response_0">
</div>
<div  id="response_2">
</div>
<div  id="response_1">
</div>

<div  id="res_button">

</div>
<div id=output_button >
</div>

<div id="output"></div>
   
<div id="overlay" class="web_dialog_overlay"></div>
   
<div id="dialog" class="web_dialog">
   <table style="width: 100%; border: 0px;" cellpadding="3" cellspacing="0">
      <tr>
         <td class="web_dialog_title">Forward</td>
         <td class="web_dialog_title align_right">
            <a href="#" id="btnClose">Close</a>
         </td>
      </tr>
      <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
      </tr>
	  <?
	  echo "<table ><tr>
						<td><a href='http:proses.php?proses=forward1' id='btnforward1' class=button2 type='button'> Pendaftaran</a>
						<td><a href='http:proses.php?proses=forward2' id='btnforward2' class=button2 type='button'> Foto WNI</a>
					<tr>
						<td><a href='http:proses.php?proses=forward3' id='btnforward3' class=button2 type='button'> Foto WNA</a>
						<td><a href='http:proses.php?proses=forward4' id='btnforward4' class=button2 type='button'> Wawancara</a>
					<tr>					
						<td><a href='http:proses.php?proses=forward5' id='btnforward5' class=button2 type='button'> Pengambilan WNI</a>
						<td><a href='http:proses.php?proses=forward6' id='btnforward6' class=button2 type='button'> Pengambilan WNA</a>";
	  ?>
		</table>

   </table>
</body>

<?
}
?>