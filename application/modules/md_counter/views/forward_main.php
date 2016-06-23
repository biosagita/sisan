<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/bens.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/icon.css'>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.min.js'></script>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js'></script>
<style type="text/css">
.button2{
   display:block;
   float:none;
   height:20px;
   width: 200px;
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   padding: 5px 10px;
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: #fff;
   font-size: 15px;
   font-family: arial black,Georgia, serif;
   text-decoration: none;
   vertical-align: middle;

   }
.button2:hover {
   border-top-color: #28597a;
   background: #28597a;
   color: #ccc;
   }
.button2:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }

</style>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:200px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmcounter" id="frmcounter" method="post" novalidate>
			<div class="frmTitle">Forward</div>
			

			<div class="frmItem">
		<table ><tr>
						<td><a  href="javascript:void(0)" onclick="fnforward1()" id='btnforward1' class=button2 type='button' style='Color:#fff;font-weight:Bold;'> Pendaftaran</a>
						<td><a  href="javascript:void(0)" onclick="fnforward2()" id='btnforward2' class=button2 type='button' style='Color:#fff;font-weight:Bold;' > Foto WNI</a>
					<tr>
						<td><a  href="javascript:void(0)" onclick="fnforward3()" id='btnforward3' class=button2 type='button' style='Color:#fff;font-weight:Bold;' > Foto WNA</a>
						<td><a  href="javascript:void(0)" onclick="fnforward4()" id='btnforward4' class=button2 type='button' style='Color:#fff;font-weight:Bold;' > Wawancara</a>
					<tr>					
						<td><a  href="javascript:void(0)" onclick="fnforward5()" id='btnforward5' class=button2 type='button' style='Color:#fff;font-weight:Bold;' > Pengambilan WNI</a>
						<td><a  href="javascript:void(0)" onclick="fnforward6()" id='btnforward6' class=button2 type='button' style='Color:#fff;font-weight:Bold;' > Pengambilan WNA</a>

		</table>
			</div>
       			
	   
			</form>
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#84_divWait').hide();
	window.parent.$('#84_fracounter').show();
});
<?php if(isset($vcounterId)) { ?>
$('#frmcounter').form('load','<?php echo base_url()?>index.php/md_counter/fncounterRow/<?php echo $vcounterId; ?>');
url = '<?php echo base_url(); ?>index.php/md_counter/fnforward1/';
<?php } else { ?>
$('#frmcounter').form('clear');
url = '<?php echo base_url(); ?>index.php/md_counter/fnCreateRegVisitor/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';


function fnforward1() {
	$('#frmcounter').form('submit',{
		url : '<?php echo base_url(); ?>index.php/md_counter/fnforward1/'	
	});
		window.parent.$('#84_dlgcounter').dialog('close');	
}

function fnforward2() {
	$('#frmcounter').form('submit',{
		url : '<?php echo base_url(); ?>index.php/md_counter/fnforward2/'	
	});
		window.parent.$('#84_dlgcounter').dialog('close');	
}

function fnforward3() {
	$('#frmcounter').form('submit',{
		url : '<?php echo base_url(); ?>index.php/md_counter/fnforward3/'	
	});
		window.parent.$('#84_dlgcounter').dialog('close');	
}
function fnforward4() {
	$('#frmcounter').form('submit',{
		url : '<?php echo base_url(); ?>index.php/md_counter/fnforward4/'	
	});
		window.parent.$('#84_dlgcounter').dialog('close');	
}
function fnforward5() {
	$('#frmcounter').form('submit',{
		url : '<?php echo base_url(); ?>index.php/md_counter/fnforward5/'	
	});
		window.parent.$('#84_dlgcounter').dialog('close');	
}
function fnforward6() {
	$('#frmcounter').form('submit',{
		url : '<?php echo base_url(); ?>index.php/md_counter/fnforward6/'	
	});
		window.parent.$('#84_dlgcounter').dialog('close');	
}

function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmcounter').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#84_dtgcounter').datagrid('reload');
				window.parent.$('#84_dlgcounter').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#84_dlgcounter').dialog('close');
}
</script>