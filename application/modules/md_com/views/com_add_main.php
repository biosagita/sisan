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
			<form name="frmcom" id="frmcom" method="post" novalidate>
			<div class="frmTitle">Data Port Modem</div>
			
       
			<div class="frmItem">
				<label>Com</label>
				<input name='f_com' id='f_com' class="easyui-validatebox" size="5" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Baudrate</label>
				<input name='f_baudrate' id='f_baudrate' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Com_Status</label>
				<input name='f_com_status' id='f_com_status' class="easyui-validatebox" size="5" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Remark</label>
				<input name='f_remark' id='f_remark' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btncom" align="right" style="padding:5px;">
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
	window.parent.$('#77_divWait').hide();
	window.parent.$('#77_fracom').show();
});
<?php if(isset($vcomId)) { ?>
$('#frmcom').form('load','<?php echo base_url()?>index.php/md_com/fncomRow/<?php echo $vcomId; ?>');
url = '<?php echo base_url(); ?>index.php/md_com/fncomUpdate/<?php echo $vcomId; ?>';
<?php } else { ?>
$('#frmcom').form('clear');
url = '<?php echo base_url(); ?>index.php/md_com/fncomCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#fldType').combobox({
		valueField:'f_com_type_id',
		textField:'f_com_type_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_com/fncomTypeData/'
	});

	<?php if(isset($vcomId)) { ?>
	$('#fldLogin').attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmcom').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#77_dtgcom').datagrid('reload');
				window.parent.$('#77_dlgcom').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#77_dlgcom').dialog('close');
}
</script>