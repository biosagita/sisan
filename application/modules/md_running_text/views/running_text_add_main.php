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
<div class="easyui-layout" style="width:495px; height:400px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmrunning_text" id="frmrunning_text" method="post" novalidate>
			<div class="frmTitle">Data Running Text</div>
			       
			<div class="frmItem">
				<label>Text</label>
				<input name='text' id='text' class="easyui-validatebox" size="40" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Created Date</label>
				<input name='created_date' id='created_date' class="easyui-datebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Modified Date</label>
				<input name='modified_date' id='modified_date' class="easyui-datebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Start_Date</label>
				<input name='start_date' id='start_date' class="easyui-datebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Expired_Date</label>
				<input name='expired_date' id='expired_date' class="easyui-datebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Keterangan</label>
				<input name='keterangan' id='keterangan' class="easyui-validatebox" size="40" data-options="required:true">
			</div>
       			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnrunning_text" align="right" style="padding:5px;">
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
	window.parent.$('#87_divWait').hide();
	window.parent.$('#87_frarunning_text').show();
});
<?php if(isset($vrunning_textId)) { ?>
$('#frmrunning_text').form('load','<?php echo base_url()?>index.php/md_running_text/fnrunning_textRow/<?php echo $vrunning_textId; ?>');
url = '<?php echo base_url(); ?>index.php/md_running_text/fnrunning_textUpdate/<?php echo $vrunning_textId; ?>';
<?php } else { ?>
$('#frmrunning_text').form('clear');
url = '<?php echo base_url(); ?>index.php/md_running_text/fnrunning_textCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must be filled.';
$(function() {

	$('#created_date').datebox({  
    required:true,
   formatter:myformatter
	}); 	

	$('#modified_date').datebox({  
    required:true,
   formatter:myformatter
	}); 	

	$('#start_date').datebox({  
    required:true,
   formatter:myformatter
	}); 	

	$('#expired_date').datebox({  
    required:true,
   formatter:myformatter
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
	$('#frmrunning_text').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#87_dtgrunning_text').datagrid('reload');
				window.parent.$('#87_dlgrunning_text').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#87_dlgrunning_text').dialog('close');
}
</script>