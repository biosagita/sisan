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
			<form name="frmlayanan" id="frmlayanan" method="post" novalidate>
			<div class="frmTitle">Data layanan</div>
			
         
			<div class="frmItem">
				<label>Id</label>
				<input name='id_layanan' id='id_layanan' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Nama_Layanan</label>
				<input name='nama_layanan' id='nama_layanan' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Group_Layanan</label>
				<input name='id_group_layanan' id='id_group_layanan' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Status</label>
				<input name='layanan_status' id='layanan_status' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Keterangan</label>
				<input name='keterangan' id='keterangan' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Layanan_Barcode</label>
				<input name='id_layanan_forward' id='id_layanan_forward' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Status_Barcode</label>
				<input name='status_barcode' id='status_barcode' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnlayanan" align="right" style="padding:5px;">
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
	window.parent.$('#79_divWait').hide();
	window.parent.$('#79_fralayanan').show();
});
<?php if(isset($vlayananId)) { ?>
$('#frmlayanan').form('load','<?php echo base_url()?>index.php/md_layanan/fnlayananRow/<?php echo $vlayananId; ?>');
url = '<?php echo base_url(); ?>index.php/md_layanan/fnlayananUpdate/<?php echo $vlayananId; ?>';
<?php } else { ?>
$('#frmlayanan').form('clear');
url = '<?php echo base_url(); ?>index.php/md_layanan/fnlayananCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#fldType').combobox({
		valueField:'f_layanan_type_id',
		textField:'f_layanan_type_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_layanan/fnlayananTypeData/'
	});

	<?php if(isset($vlayananId)) { ?>
	$('#fldLogin').attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmlayanan').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#79_dtglayanan').datagrid('reload');
				window.parent.$('#79_dlglayanan').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#79_dlglayanan').dialog('close');
}
</script>