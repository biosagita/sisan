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
<div class="easyui-layout" style="width:495px; height:350px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmUser" id="frmUser" method="post" novalidate>
			<div class="frmTitle">Data User</div>
			<div class="frmItem">
				<label>User Login</label>
				<input name="fldLogin" id="fldLogin" class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			<div class="frmItem">
				<label>Password</label>
				<input name="fldPass" id="fldPass" class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			<div class="frmItem">
				<label>User Name</label>
				<input name="fldName" id="fldName" size="38" type="text">
			</div>
			<div class="frmItem">
				<label>Email Address</label>
				<input name="fldMail" id="fldMail" size="38" type="text">
			</div>
			<div class="frmItem">
				<label>User Description</label>
				<input name="fldDesc" id="fldDesc" size="38" type="text">
			</div>
			<div class="frmItem">
				<label>User Group</label>
				<input name="id_user_group" id="id_user_group" style="width:200px;">
			</div>
			<div class="frmItem">
				<label>Active</label>
				<input name="fldActive" id="fldActive" style="width:100px;">
			</div>
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnUser" align="right" style="padding:5px;">
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
</html>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#75_divWait').hide();
	window.parent.$('#75_fraUserRole').show();
});
<?php if(isset($vUserId)) { ?>
$('#frmUser').form('load','<?php echo base_url()?>index.php/md_user_role/fnUserRow/<?php echo $vUserId; ?>');
url = '<?php echo base_url(); ?>index.php/md_user_role/fnUserUpdate/<?php echo $vUserId; ?>';
<?php } else { ?>
$('#frmUser').form('clear');
url = '<?php echo base_url(); ?>index.php/md_user_role/fnUserCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';
$(function() {
	$('#id_user_group').combobox({
		valueField:'id_user_group',
		textField:'nama_user_group',
		mode:'remote',
		panelWidth:200,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupComboData/'
	});
	$('#fldActive').combobox({
		valueField:'f_active_val',
		textField:'f_active_text',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_user_role/fnUserActiveData/'
	});
	<?php if(isset($vUserId)) { ?>
	$('#fldLogin').attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmUser').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#75_dtgUser').datagrid('reload');
				window.parent.$('#75_dlgUserRole').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#75_dlgUserRole').dialog('close');
}
</script>