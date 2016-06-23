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
<div class="easyui-layout" style="width:800px; height:520px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmemployee" id="frmemployee" method="post" novalidate>
			<div class="frmTitle">Data Karyawan</div>
			
			<div style="width:750px;border:0px dotted #CCCCCC;border-radius:5px;float:left;clear:left;">
								<div class="frmItem">	
									<div class="easyui-tabs" style="width:750px;height:420px">  
											<div title="Personal Data" style="padding:3px">  
												<div style="padding:20px 15px;">
											
													
													<div class="frmItem">
														<label>Nama Karyawan</label>
														<input name='f_emp_name' id='f_emp_name' class="easyui-validatebox" size="40" data-options="required:true">
													</div>

													<div class="frmItem">
														<label>Status</label>
														<input name='f_status_id' id='f_status_id'  size="20" >
													</div>
											   
													<div class="frmItem">
														<label>Jenis Kelamin</label>
														<input name='f_emp_gender' id='f_emp_gender'  size="20" >
													</div>
											   
											
													<div class="frmItem">
														<label>Alamat</label>
														<input name='f_emp_address1' id='f_emp_address1' class="easyui-validatebox" size="50" >
													</div>
											   
											   
												</div>
											</div>  


											
									</div>  								
								</div>
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
url = '<?php echo base_url(); ?>index.php/md_employee/fnemployeeUpdate/<?php echo $vemployeeId; ?>';
<?php } else { ?>
$('#frmemployee').form('clear');
url = '<?php echo base_url(); ?>index.php/md_employee/fnemployeeCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {
	$('#f_emp_gender').combobox({
		valueField:'value',
		textField:'label',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		data: [{
			label: 'Laki-laki',
			value: 'L'
		},{
			label: 'Perempuan',
			value: 'P'
		}]
	});
	$('#f_status_id').combobox({
		valueField:'f_status_id',
		textField:'f_status_name',
		mode:'remote',
		panelWidth:200,
		panelHeight:'auto',		
		url:'<?php echo base_url(); ?>index.php/md_status/fnstatusComboData/'
	});
	
	$('#f_comp_branch_id').combobox({
		valueField:'f_branch_id',
		textField:'f_branch_name',
		mode:'remote',
		panelWidth:250,
		panelHeight:'auto',	
		url:'<?php echo base_url(); ?>index.php/md_comp_branch/fnCompBranchComboData/'
	});

	$('#f_emp_birthdate').datebox({  
    required:true,
   formatter:myformatter
	}); 	
	
	$('#f_city_id').combobox({
		valueField:'f_city_id',
		textField:'f_city_name',
		mode:'remote',
		panelWidth:200,
		onChange: function(){
			var CityId = $('#f_city_id').combobox('getValue');
			$('#f_kec_id').combobox({
				valueField:'f_kec_id',
				textField:'f_kec_name',
				mode:'remote',
				panelWidth:200,
				panelHeight:'auto',
				url:'<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanComboData2/'+CityId
			});

		},		
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_city/fncityComboData/'
	});
			$('#f_kec_id').combobox({
				valueField:'f_kec_id',
				textField:'f_kec_name',
				mode:'remote',
				panelWidth:200,
				panelHeight:'auto',
				url:'<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanComboData/'
			});

	
	
});
function myformatter(date){  
	var y = date.getFullYear();  
	var m = date.getMonth()+1;  
	var d = date.getDate();  
	return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);  
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
				window.parent.$('#25_dtgemployee').datagrid('reload');
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