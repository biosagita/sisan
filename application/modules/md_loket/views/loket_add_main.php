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
			<form name="frmloket" id="frmloket" method="post" novalidate>
			<div class="frmTitle">Data Loket</div>
			
         
			<div class="frmItem">
				<label>Nama Loket</label>
				<input name='nama_loket' id='nama_loket' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Group Loket</label>
				<input name='id_group_loket' id='id_group_loket'  size="30" data-options="required:true">
			</div>
       			

			<div class="frmItem">
				<label>No Loket</label>
				<input name='no_loket' id='no_loket'  class="easyui-numberbox"  size="5" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>Status Off</label>
				<input name='status_off' id='status_off'   size="20" data-options="required:true">
			</div>
			
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnloket" align="right" style="padding:5px;">
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
	window.parent.$('#81_divWait').hide();
	window.parent.$('#81_fraloket').show();
});
<?php if(isset($vloketId)) { ?>
$('#frmloket').form('load','<?php echo base_url()?>index.php/md_loket/fnloketRow/<?php echo $vloketId; ?>');
url = '<?php echo base_url(); ?>index.php/md_loket/fnloketUpdate/<?php echo $vloketId; ?>';
<?php } else { ?>
$('#frmloket').form('clear');
url = '<?php echo base_url(); ?>index.php/md_loket/fnloketCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#id_group_loket').combobox({
		valueField:'id_group_loket',
		textField:'nama_group_loket',
		mode:'remote',
		panelWidth:200,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_group_loket/fngroup_loketComboData/'
	});

	$('#status_off').combobox({
		valueField:'value',
		textField:'label',
		mode:'remote',
		panelWidth:200,
		panelHeight:'auto',
		data: [{
								label: 'Aktif',
								value: '1'
							},{
								label: 'Tidak Aktif',
								value: '0'
							}]
	});
	
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmloket').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#81_dtgloket').datagrid('reload');
				window.parent.$('#81_dlgloket').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#81_dlgloket').dialog('close');
}
</script>