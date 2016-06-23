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
<div class="easyui-layout" style="width:450px; height:130px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmImportemployee" id="frmemployee" accept-charset="utf-8" enctype="multipart/form-data" method="post" novalidate>
			 <p>&nbsp;&nbsp;</p>        
			<div class="frmItem">
				<label>File Excel</label>
				<input type='file' name='f_file' id='f_file'  class="easyui-validatebox" size="30" data-options="required:true">
			</div>             				   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnemployee" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
				<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Harus Diisi.
			</div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="fnSave()">Process Import</a>
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
url = '<?php echo base_url(); ?>index.php/md_employee/fnemployeeImportProcess/';

<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';

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