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
<div class="easyui-layout" style="width:495px; height:200px; background-color:#FFF;">
	<div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmkecamatan" id="frmkecamatan" method="post" novalidate>
			<div class="frmTitle">Data kecamatan</div>
			
       
			<div class="frmItem">
				<label>Name</label>
				<input name='f_kec_name' id='f_kec_name' class="easyui-validatebox" size="20" data-options="required:true">
			</div>
       
			<div class="frmItem">
				<label>Kota / Kabupaten</label>
				<input name='f_city_id' id='f_city_id'  size="20" data-options="required:true">
			</div>
       			
	   
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnkecamatan" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
				<span style="background-color:#FF9; border:1px solid #666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Must Be Filled.
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
	window.parent.$('#73_divWait').hide();
	window.parent.$('#73_frakecamatan').show();
});
<?php if(isset($vkecamatanId)) { ?>
$('#frmkecamatan').form('load','<?php echo base_url()?>index.php/md_kecamatan/fnkecamatanRow/<?php echo $vkecamatanId; ?>');
url = '<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanUpdate/<?php echo $vkecamatanId; ?>';

<?php } else { ?>
$('#frmkecamatan').form('clear');
url = '<?php echo base_url(); ?>index.php/md_kecamatan/fnkecamatanCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Must Be Filled.';
$(function() {
	$('#f_city_id').combobox({
		valueField:'f_city_id',
		textField:'f_city_name',
		mode:'remote',
		panelWidth:100,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_city/fncityComboData/'
	});

	<?php if(isset($vkecamatanId)) { ?>
	$('#f_kecamatan_id').attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmkecamatan').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#73_dtgkecamatan').datagrid('reload');
				window.parent.$('#73_dlgkecamatan').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#73_dlgkecamatan').dialog('close');
}
</script>