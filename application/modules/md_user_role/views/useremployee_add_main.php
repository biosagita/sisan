<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bro.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div class="easyui-layout" style="width:485px; height:220px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmEmployee" id="frmEmployee" method="post" novalidate>
			<div class="frmTitle">Data Employee</div>
			<div class="frmItem">
				<label>Employee Detail</label>
				<input name="fldDetail" id="fldDetail" data-options="required:true" style="width:250px">
			</div>
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnUserEmployee_Employees" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;"></div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" onclick="fnSave()">Save</a>
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
$('#frmEmployee').form('load','<?php echo base_url()?>index.php/md_user_role/fnEmployeeRow/<?php echo $vUserId; ?>');
url = '<?php echo base_url(); ?>index.php/md_user_role/fnEmployeeSelect/<?php echo $vUserId; ?>';
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';
$.fn.combogrid.defaults.missingMessage = 'Harus diisi.';
$(function() {
	$('#fldDetail').combogrid({
		idField:'f_emp_id',
		textField:'f_emp_name',
		mode:'remote',
		url:'<?php echo base_url(); ?>index.php/md_employee/fnemployeeComboData',
		panelWidth:330,
		panelHeight:125,
		columns:[[
			{field:'f_emp_code',title:'Code',width:50},
			{field:'f_emp_name',title:'Name',width:80},
			{field:'f_emp_email',title:'Email',width:175}
		]]
	});
	$('#fldType').combobox({
		valueField:'f_emp_type_id',
		textField:'f_emp_type_desc',
		panelWidth:250,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_user_role/fnEmployeeTypeData/'
	});
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmEmployee').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#75_dtgUserEmployee').datagrid('reload');
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