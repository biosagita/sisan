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
			<form name="frmuser_group" id="frmuser_group" method="post" novalidate>
			<div class="frmTitle">Data user_group</div>
			
			<div class="frmItem">
				<label>Id User Group</label>
				<input name='id_user_group' id='id_user_group' class="easyui-numberbox" size="5" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>User_Group</label>
				<input name='nama_user_group' id='nama_user_group' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Group Layanan</label>
				<input name='id_group_layanan' id='id_group_layanan'  size="20" data-options="required:true">
			</div>
       			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnuser_group" align="right" style="padding:5px;">
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
	window.parent.$('#82_divWait').hide();
	window.parent.$('#82_frauser_group').show();
});
<?php if(isset($vuser_groupId)) { ?>
$('#frmuser_group').form('load','<?php echo base_url()?>index.php/md_user_group/fnuser_groupRow/<?php echo $vuser_groupId; ?>');
url = '<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupUpdate/<?php echo $vuser_groupId; ?>';
<?php } else { ?>
$('#frmuser_group').form('clear');
url = '<?php echo base_url(); ?>index.php/md_user_group/fnuser_groupCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#id_group_layanan').combobox({
		valueField:'id_group_layanan',
		textField:'nama_group_layanan',
		mode:'remote',
		panelWidth:200,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_group_layanan/fngroup_layananComboData/'
	});

});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmuser_group').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#82_dtguser_group').datagrid('reload');
				window.parent.$('#82_dlguser_group').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#82_dlguser_group').dialog('close');
}
</script>