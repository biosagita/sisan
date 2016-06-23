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
			<div class="frmTitle">Employee Education</div>

			<div class="frmItem">
				<label>Employee Name</label>
				<input name='f_emp_id' id='f_emp_id' >
				
				<input name='f_emp_name' id='f_emp_name' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
			<div class="frmTitle"></div>
			
			<div class="frmItem">
				<label>School / University</label>
				<input name='f_emp_education_name' id='f_emp_education_name' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
			
			<div class="frmItem">
				<label>Majors</label>
				<input name='f_emp_education_segment' id='f_emp_education_segment' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			<div class="frmItem">
				<label>Year</label>
				<input name='f_emp_education_year' id='f_emp_education_year' class="easyui-numberbox" size="5" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Ladder</label>
				<input name='f_emp_education_stage' id='f_emp_education_stage' class="easyui-combobox" size="10" data-options="required:true">
			</div>
						       
			<div class="frmItem">
				<label>City</label>
				<input name='f_emp_education_city' id='f_emp_education_city' class="easyui-validatebox" size="20" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>Remark</label>
				<input name='f_emp_education_remark' id='f_emp_education_remark' class="easyui-validatebox" size="35" data-options="required:true">
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
url = '<?php echo base_url(); ?>index.php/md_employee_educations/fnemployee_educationsCreate/';
<?php } ?>
<?php if(isset($vemployee_educationsId)) { ?>

$('#frmemployee').form('load','<?php echo base_url()?>index.php/md_employee_educations/fnemployee_educationsRow/<?php echo $vemployee_educationsId; ?>');
url = '<?php echo base_url(); ?>index.php/md_employee_educations/fnemployee_educationsUpdate/<?php echo $vemployee_educationsId; ?>';
<?php } else { ?>
$('#frmemployee').form('clear');
url = '<?php echo base_url(); ?>index.php/md_employee_educations/fnemployee_educationsCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#f_emp_id').hide();
	$('#f_emp_education_stage').combobox({
		valueField:'value',
		textField:'label',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		data: [{
			label: 'SD',
			value: 'SD'
		},{
			label: 'SLTP',
			value: 'SLTP'
		},{
			label: 'SLTA',
			value: 'SLTA'
		},{
		},{
			label: 'SMK',
			value: 'SMK'
		},{			
			label: 'MI',
			value: 'MI'
		},{
			label: 'MTS',
			value: 'MTS'
		},{
			label: 'MA',
			value: 'MA'
		},{
			label: 'D1',
			value: 'D1'
		},{
			label: 'D2',
			value: 'D2'
		},{
			label: 'D3',
			value: 'D3'
		},{
			label: 'D4',
			value: 'D4'
		},{
			label: 'S1',
			value: 'S1'
		},{
			label: 'S2',
			value: 'S2'
		},{
			label: 'S3',
			value: 'S3'
		}]
	});	
	$('#f_emp_gender').combobox({
		valueField:'value',
		textField:'label',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		data: [{
			label: 'Male',
			value: 'M'
		},{
			label: 'Female',
			value: 'F'
		}]
	});
	
	$('#f_emp_religion').combobox({
		valueField:'value',
		textField:'label',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		data: [{
			label: 'Islam',
			value: 'Islam'
		},{
			label: 'Kristen',
			value: 'Kristen'
		},{
			label: 'hindu',
			value: 'Hindu'
		},{
			label: 'Budha',
			value: 'Budha'

		},{
			label: 'Khonghucu',
			value: 'Khonghucu'
			
		}]
	});	
	$('#f_comp_branch_id').combobox({
		valueField:'f_branch_id',
		textField:'f_branch_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',	
		url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnCompBranchComboData/'
	});
	$('#f_emp_segment_id').combobox({
		valueField:'f_emp_segment_id',
		textField:'f_emp_segment_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',		
		url:'<?php echo base_url(); ?>index.php/md_employee_segment/fnemployee_segmentComboData/'
	});
	$('#f_position_id').combobox({
		valueField:'f_position_id',
		textField:'f_position_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',			
		url:'<?php echo base_url(); ?>index.php/md_position/fnpositionComboData/'
	});
	$('#f_city_id').combobox({
		valueField:'f_city_id',
		textField:'f_city_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_city/fncityComboData/'
	});
	
	$('#f_group_att_id').combobox({
		valueField:'f_group_att_id',
		textField:'f_group_att_name',
		mode:'remote',
		panelWidth:150,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_group_attendance/fnGroupAttendanceComboData/'
	});	
	$('#f_class_id').combobox({
		valueField:'f_class_id',
		textField:'f_class_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',		
		url:'<?php echo base_url(); ?>index.php/md_class/fnclassComboData/'
	});

	$('#f_status_id').combobox({
		valueField:'f_status_id',
		textField:'f_status_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',		
		url:'<?php echo base_url(); ?>index.php/md_status/fnstatusComboData/'
	});
	$('#f_emp_marital_status').combobox({
		valueField:'f_marital_status_id',
		textField:'f_marital_status_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',		
		url:'<?php echo base_url(); ?>index.php/md_marital_status/fnmaritalstatusComboData/'
	});	
	$('#f_emp_datebirth').datebox({  
		required:true  
	}); 
	$('#f_emp_start_date').datebox({  
		required:true  
	}); 
	
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
				window.parent.$('#25_dtgemployee_educations').datagrid('reload');
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