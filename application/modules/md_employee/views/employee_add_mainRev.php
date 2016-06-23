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
<body onLoad="document.f1.f_emp_id.focus()">
<div class="easyui-layout" style="width:910px; height:480px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmEmployee" id="frmEmployee" method="post" name=f1 onSubmit='return validasi(this)' novalidate>
			<div class="frmTitle">Data Employee</div>
		</div>
	


			<div class="frmItem">
				<label>Id</label>
				<input name='f_emp_id' id='f_emp_id' class="easyui-validatebox" size="20" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>Code</label>
				<input name='f_emp_code' id='f_emp_code' class="easyui-validatebox" size="20" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>Name</label>
				<input name='f_emp_name' id='f_emp_name' class="easyui-validatebox" size="40" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>Gender</label>
				<input name='f_emp_gender' id='f_emp_gender' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
        
			<div class="frmItem">
				<label>Birth Of Place</label>
				<input name='f_emp_birthplace' id='f_emp_birthplace' class="easyui-validatebox" size="25" data-options="required:true">
			</div>
			       
			<div class="frmItem">
				<label>Date Of Birth</label>
				<input name='f_emp_datebirth' id='f_emp_datebirth' class="easyui-validatebox" size="25" data-options="required:true">
			</div>

		       
			<div class="frmItem">
				<label>Religion</label>
				<input name='f_emp_religion' id='f_emp_religion' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			       
			<div class="frmItem">
				<label>Marital</label>
				<input name='f_emp_marital_status' id='f_emp_marital_status' class="easyui-validatebox" size="20" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>Address1</label>
				<input name='f_emp_address1' id='f_emp_address1' class="easyui-validatebox" size="50" data-options="required:true">
			</div>
    
			<div class="frmItem">
				<label>Address2</label>
				<input name='f_emp_address2' id='f_emp_address2' class="easyui-validatebox" size="50" data-options="required:true">
			</div>
			
			       
			<div class="frmItem">
				<label>Address3</label>
				<input name='f_emp_address3' id='f_emp_address3' class="easyui-validatebox" size="50" data-options="required:true">
			</div>
				       
			<div class="frmItem">
				<label>City</label>
				<input name='f_city_id' id='f_city_id' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
			
			       
			<div class="frmItem">
				<label>Post Code</label>
				<input name='f_emp_post_code' id='f_emp_post_code' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
				       
			<div class="frmItem">
				<label>Phone</label>
				<input name='f_emp_ext_phone' id='f_emp_ext_phone' class="easyui-validatebox" size="20" data-options="required:true">
			</div>

			       
			<div class="frmItem">
				<label>Office Phone</label>
				<input name='f_emp_office_phone' id='f_emp_office_phone' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
				       
			<div class="frmItem">
				<label>Home Phone</label>
				<input name='f_emp_home_phone' id='f_emp_home_phone' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			
			       
			<div class="frmItem">
				<label>HandPhone</label>
				<input name='f_emp_mobile_phone' id='f_emp_mobile_phone' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
				       
			<div class="frmItem">
				<label>Pin BB</label>
				<input name='f_emp_pin_bb' id='f_emp_pin_bb' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			
			       
			<div class="frmItem">
				<label>Email</label>
				<input name='f_emp_email' id='f_emp_email' class="easyui-validatebox" size="40" data-options="required:true">
			</div>
				       
			<div class="frmItem">
				<label>Website</label>
				<input name='f_emp_website' id='f_emp_website' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Acc Bank</label>
				<input name='f_emp_acc_bank' id='f_emp_acc_bank' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
    
			<div class="frmItem">
				<label>Acc No</label>
				<input name='f_emp_acc_no' id='f_emp_acc_no' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
			
			              
			<div class="frmItem">
				<label>Acc Name</label>
				<input name='f_emp_acc_name' id='f_emp_acc_name' class="easyui-validatebox" size="40" data-options="required:true">
			</div>
       
			              
			<div class="frmItem">
				<label>Insurance</label>
				<input name='f_emp_insurance' id='f_emp_insurance' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
				                     
			<div class="frmItem">
				<label>Insurance No</label>
				<input name='f_emp_insurance_no' id='f_emp_insurance_no' class="easyui-validatebox" size="20" data-options="required:true">
			</div>

			<div class="frmItem">
				<label>Emp Active</label>
				<input name='f_emp_active' id='f_emp_active' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			         
			<div class="frmItem">
				<label>Company Branch</label>
				<input name='f_comp_branch_id' id='f_comp_branch_id' class="easyui-validatebox" size="40" data-options="required:true">
			</div>
			
		         
			<div class="frmItem">
				<label>Emp Segment</label>
				<input name='f_emp_segment_id' id='f_emp_segment_id' class="easyui-validatebox" size="40" data-options="required:true">
			</div>
			         
			<div class="frmItem">
				<label>Position</label>
				<input name='f_position_id' id='f_position_id' class="easyui-validatebox" size="30" data-options="required:true">
			</div>
			
		         
			<div class="frmItem">
				<label>Class</label>
				<input name='f_class_id' id='f_class_id' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			         
			<div class="frmItem">
				<label>Status</label>
				<input name='f_status_id' id='f_status_id' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
 
		   
			<div class="frmItem">
				<label>Group Attendance</label>
				<input name='f_group_att_id' id='f_group_att_id' class="easyui-validatebox" size="35" data-options="required:true">
			</div>
			         
			<div class="frmItem">
				<label>Date Of Start</label>
				<input name='f_emp_start_date' id='f_emp_start_date' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
			
		         
			<div class="frmItem">
				<label>Date Of Resign</label>
				<input name='f_emp_out_date' id='f_emp_out_date' class="easyui-validatebox" size="20" data-options="required:true">
			</div>

		  			
			<div class="frmItem">
				<label>Reason Out</label>
				<input name='f_emp_reason_out' id='f_emp_reason_out' class="easyui-validatebox" size="50" data-options="required:true">
			</div>

  
	</div>	
</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnEmployee" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
				<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Harus Diisi.
			</div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave()">Save</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
		</div>
	</div>
	</form>


</body>
</html>
<script type="text/javascript">

$(document).ready(function() {
	window.parent.$('#25_divWait').hide();
	window.parent.$('#25_fraEmployee').show();
});
<?php if(isset($vEmployeeId)) { ?>
$('#frmEmployee').form('load','<?php echo base_url()?>index.php/md_Employee/fnEmployeeRow/<?php echo $vEmployeeId; ?>');
url = '<?php echo base_url(); ?>index.php/md_Employee/fnEmployeeUpdate/<?php echo $vEmployeeId; ?>';
<?php } else { ?>
$('#frmEmployee').form('clear');
url = '<?php echo base_url(); ?>index.php/md_Employee/fnEmployeeCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';
$(function() {
	$('#fldType').combobox({
		valueField:'f_Employee_type_id',
		textField:'f_Employee_type_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_Employee/fnEmployeeTypeData/'
	});

	<?php if(isset($vEmployeeId)) { ?>
	$('#fldLogin').attr('disabled','disabled');
	<?php } ?>
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
				window.parent.$('#25_dtgEmployee').datagrid('reload');
				window.parent.$('#25_dlgEmployee').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#25_dlgEmployee').dialog('close');
}

var xmlhttp = createRequestObject();

function validasi(form){
  if (form.f_emp_id.value == ""){
    form.f_emp_id.focus();
    return (false);
  }

}

</script>