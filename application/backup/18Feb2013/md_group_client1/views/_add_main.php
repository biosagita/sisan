<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bro.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
<style type="text/css">
body {
	font-size:14px;
	background:#F3F3F3;
}
#frmGroupClient {
	margin:0;
	padding:10px 10px;
	font-size:14px;
}
.frmGroupClientTitle {
	font-size:14px;
	font-weight:bold;
	color:#666;
	padding:5px 0;
	margin-bottom:20px;
	border-bottom:1px solid #ccc;
}
.frmGroupClientItem {
	margin-bottom:10px;
}
.frmGroupClientItem label {
	display:inline-block;
	text-align:left;
	width:100px;
}
.frmGroupClientItem quote {
	display:inline-block;
	text-align:left;
	width:5px;
}
</style>
</head>
<body>
<div class="easyui-layout" style="width:466px;height:425px; background-color:#FFF;">
    <div data-options="region:'center',border:false" style="height:315px;">
	<div style="padding:0px 15px;">
	<form name="frmGroupClient" id="frmGroupClient" method="post" novalidate>
	<div class="frmGroupClientTitle">Data Group Client</div>
	<div class="frmGroupClientItem">
		<label>Code&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldCode" id="fldCode" class="easyui-validatebox" required="true" size="15" style="text-transform: uppercase">
	</div>
	<div class="frmGroupClientItem">
		<label>Name&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldName" id="fldName" class="easyui-validatebox" required="true" size="40">
	</div>
	<div class="frmGroupClientItem">
		<label>Address&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldAddress1" id="fldAddress1" class="easyui-validatebox" required="true" size="40">
	</div>
	<div class="frmGroupClientItem">
		<label>&nbsp;&nbsp;</label>
        <quote>&nbsp;</quote>
		<input name="fldAddress2" id="fldAddress2" size="40">
	</div>
	<div class="frmGroupClientItem">
		<label>&nbsp;&nbsp;</label>
        <quote>&nbsp;</quote>
		<input name="fldAddress3" id="fldAddress3" size="40">
	</div>
	<div class="frmGroupClientItem">
		<label>City&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldCity" id="fldCity" size="40">
	</div>
	<div class="frmGroupClientItem">
		<label>Post Code&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldPostCode" id="fldPostCode" size="8">
	</div>
	<div class="frmGroupClientItem">
		<label>Phone&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldPhone" id="fldPhone" size="25">
	</div>
	<div class="frmGroupClientItem">
		<label>Fax&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldFax" id="fldFax" size="25">
	</div>
	<div class="frmGroupClientItem">
		<label>Industry&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldIndustry" id="fldIndustry" style="width:225px"></input>
		<input type="hidden" name="fldHiddenIndustry" id="fldHiddenIndustry">
	</div>
	</form>
    </div>
    </div>
    <div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnGroupClient" align="right" style="padding:5px;">
			<div style="float:left; width:auto; margin:5px 0px 0px 5px;">
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
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#divGroupClientWait').hide();
	window.parent.$('#fraGroupClient').show();
});
<?php if(isset($vGroupClient)) { ?>
$('#frmGroupClient').form('load','<?php echo base_url(); ?>index.php/md_group_client/fnGroupClientRow/<?php echo $vGroupClient; ?>');
url = '<?php echo base_url(); ?>index.php/md_group_client/fnGroupClientUpdate/<?php echo $vGroupClient ?>';
<?php } else { ?>
$('#frmGroupClient').form('clear');
url = '<?php echo base_url(); ?>index.php/md_group_client/fnGroupClientCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';
$.fn.combogrid.defaults.missingMessage = 'Harus diisi.';
$(function() {
	$('#fldIndustry').combogrid({
		idField:'Id',
		textField:'desc1',
		mode:'remote',
		striped:true,
		url:'<?php echo base_url(); ?>index.php/md_group_client/fnIndustryData/',
		panelWidth:260,
		panelHeight:120,		
		columns:[[
			{field:'Id',title:'<strong>ID</strong>',halign:'center',width:50},
			{field:'desc1',title:'<strong>Industry Name</strong>',halign:'center',width:180}
		]]
	});
	<?php if(isset($vGroupClient)) { ?>
	$("#fldCode").attr('disabled','disabled');
	<?php } ?>
});
function fnSave() {
	var industryText = $('#fldIndustry').combogrid('getText');
	if(!industryText) {
		industryText = 'empty_param';
	}
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_group_client/fnCekIndustry/'+industryText,
		dataType:"json",
		data: {},
		success: function(data){
			var industrydata = data.idst;
			if($('#fldIndustry').combogrid('getText')!='' && industrydata=='') {
				alert('Industry tidak dapat ditemukan.');
				return false;
			} else {
				fnSaveData();
			}
		},
		error: function(){
			alert('Group tidak dapat diakses.');
		}
	});
}
function fnSaveData() {
	$('#frmGroupClient').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#dtgGroupClient').datagrid('reload');
				window.parent.$('#dlgGroupClient').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#dlgGroupClient').dialog('close');
}
</script>
</html>