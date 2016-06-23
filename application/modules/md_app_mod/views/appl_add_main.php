<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bens.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:300px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmAppl" id="frmAppl" method="post" novalidate>
			<div class="frmTitle">Data Application</div>
			<div class="frmItem">
				<label>ID#</label>
				<input name="fldId" id="fldId" class="easyui-validatebox" required="true" size="5" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>Code</label>
				<input name="fldCode" id="fldCode" class="easyui-validatebox" required="true" size="15" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>Name</label>
				<input name="fldName" id="fldName" class="easyui-validatebox" required="true" size="38" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>Description</label>
				<input name="fldDesc" id="fldDesc" size="38" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>URL</label>
				<input name="fldUrl" id="fldUrl" size="38" missingMessage="Harus Diisi.">
			</div>
			<div class="frmItem">
				<label>Path</label>
				<input name="fldPath" id="fldPath" size="38" missingMessage="Harus Diisi.">
			</div>
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnAppl" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
				<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Harus Diisi.
			</div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave()">Save</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#1_divWait').hide();
	window.parent.$('#1_fraAppMod').show();
});
<?php if(isset($vAppl)) { ?>
$('#frmAppl').form('load','<?php echo base_url(); ?>index.php/md_app_mod/fnApplRow/<?php echo $vAppl; ?>');
url = '<?php echo base_url(); ?>index.php/md_app_mod/fnApplUpdate/<?php echo $vAppl; ?>';
<?php } else { ?>
$('#frmAppl').form('clear');
url = '<?php echo base_url(); ?>index.php/md_app_mod/fnApplCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';
$.fn.combogrid.defaults.missingMessage = 'Harus diisi.';
$(function() {
	<?php if(isset($vAppl)) { ?>
	$("#fldCode").attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmAppl').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#1_dtgApp').datagrid('reload');
				window.parent.$('#1_dlgAppMod').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#1_dlgAppMod').dialog('close');
}
</script>