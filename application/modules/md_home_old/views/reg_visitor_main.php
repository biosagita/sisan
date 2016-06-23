<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/bens.css'>
<link rel="stylesheet" type="text/css" href='<?php echo base_url(); ?>assets/easyui/themes/icon.css'>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.min.js'></script>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js'></script>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:350px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmcounter" id="frmcounter" method="post" novalidate>
			<div class="frmTitle">Reg Visitor</div>
			
         
				<input name='id_transaksi' id='id_transaksi' class="easyui-validatebox" size="5" data-options="required:true">
				

			<div class="frmItem">
				<label>Nama Visitor</label>
				<input name='f_nama_visitor' id='id_f_nama_visitor' class="easyui-validatebox" size="25" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>No KTP</label>
				<input name='f_no_ktp' id='f_no_ktp' class="easyui-validatebox" size="10" data-options="required:true">
			</div>
       			
			<div class="frmItem">
				<label>No Handphone</label>
				<input name='f_no_hp' id='f_no_hp' class="easyui-validatebox" size="10" data-options="required:true">
			</div>
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btncounter" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
				<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Must be filled.
			</div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave()">Save</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
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
url = '<?php echo base_url(); ?>index.php/md_counter/fncounterUpdate/<?php echo $vcounterId; ?>';
<?php } else { ?>
$('#frmcounter').form('clear');
url = '<?php echo base_url(); ?>index.php/md_counter/fncounterCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	//$('#id_transaksi').hide();
	var id = <? echo $Id_Transaksi; ?>;
	$('#id_transaksi').val(id);

});
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