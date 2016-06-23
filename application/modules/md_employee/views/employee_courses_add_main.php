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
<div class="easyui-layout" style="width:530px; height:330px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmemployee" id="frmemployee" method="post" novalidate>
			<div class="frmTitle">Employee Courses</div>

			<div class="frmItem">
				<label>Employee Name</label>
				<input name='f_emp_id' id='f_emp_id' >
				
				<input name='f_emp_name' id='f_emp_name' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
			<div class="frmTitle"></div>
			
			<div class="frmItem">
				<label>Courses Name</label>
				<input name='f_emp_courses_name' id='f_emp_courses_name' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
			
			<div class="frmItem">
				<label>Institution</label>
				<input name='f_emp_courses_institution' id='f_emp_courses_institution' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			<div class="frmItem">
				<label>Year</label>
				<input name='f_emp_courses_year' id='f_emp_courses_year' class="easyui-validatebox" size="5" data-options="required:true">
			</div>
       

			<div class="frmItem">
				<label>Remark</label>
				<input name='f_emp_courses_remark' id='f_emp_courses_remark' class="easyui-validatebox" size="35" data-options="required:true">
			</div>

   

			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnemployee" align="right" style="padding:5px;">
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
	window.parent.$('#25_divWait').hide();
	window.parent.$('#25_fraemployee').show();
});
<?php if(isset($vemployeeId)) { ?>

$('#frmemployee').form('load','<?php echo base_url()?>index.php/md_employee/fnemployeeRow/<?php echo $vemployeeId; ?>');
url = '<?php echo base_url(); ?>index.php/md_employee_educations/fnemployee_coursesCreate/';
<?php } ?>
<?php if(isset($vemployee_coursesId)) { ?>
$('#frmemployee').form('load','<?php echo base_url()?>index.php/md_employee_courses/fnemployee_coursesRow/<?php echo $vemployee_coursesId; ?>');
url = '<?php echo base_url(); ?>index.php/md_employee_courses/fnemployee_coursesUpdate/<?php echo $vemployee_coursesId; ?>';
<?php } else { ?>
$('#frmemployee').form('clear');
url = '<?php echo base_url(); ?>index.php/md_employee_courses/fnemployee_coursesCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#f_emp_id').hide();
	
});
function myformatter(date){  
	var y = date.getFullYear();  
	var m = date.getMonth()+1;  
	var d = date.getDate();  
	return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;  
}  
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmemployee').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#25_dtgemployee_courses').datagrid('reload');
				window.parent.$('#25_dlgemployee').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#25_dlgemployee').dialog('close');
}
</script>