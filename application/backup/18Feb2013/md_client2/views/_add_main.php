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
#frmClient {
	margin:0;
	padding:10px 10px;
	font-size:14px;
}
.frmClientTitle {
	font-size:14px;
	font-weight:bold;
	color:#666;
	padding:5px 0;
	margin-bottom:20px;
	border-bottom:1px solid #ccc;
}
.frmClientItem {
	margin-bottom:10px;
}
.frmClientItem label {
	display:inline-block;
	text-align:left;
	width:100px;
}
.frmClientItem quote {
	display:inline-block;
	text-align:left;
	width:5px;
}
</style>
</head>
<body>
<div class="easyui-layout" style="width:495px;height:500px; background-color:#FFF;">
    <div data-options="region:'center',border:false" style="height:315px;">
	<div style="padding:0px 15px;">
	<form name="frmClient" id="frmClient" method="post" novalidate>
	<div class="frmClientTitle">Data Client</div>
	<div class="frmClientItem">
		<label>Code&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldCode" id="fldCode" class="easyui-validatebox" required="true" size="15" style="text-transform: uppercase">
	</div>
	<div class="frmClientItem">
		<label>Name&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldName" id="fldName" class="easyui-validatebox" required="true" size="45">
	</div>
	<div class="frmClientItem">
		<label style="vertical-align:middle">Client Group&nbsp;&nbsp;<input type="checkbox" name="fldState" id="fldState" onclick="fnChgState()"></label>
        <quote>:</quote>
		<input name="fldGroup" id="fldGroup" style="width:250px"></input>
		<input type="hidden" name="fldHiddenGroup" id="fldHiddenGroup">		
		<input type="hidden" name="fldHiddenState" id="fldHiddenState" value="">
	</div>
	<div class="frmClientItem">
		<label>Address&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldAddress1" id="fldAddress1" class="easyui-validatebox" required="true" size="45">
	</div>
	<div class="frmClientItem">
		<label>&nbsp;&nbsp;</label>
        <quote>&nbsp;</quote>
		<input name="fldAddress2" id="fldAddress2" size="45">
	</div>
	<div class="frmClientItem">
		<label>&nbsp;&nbsp;</label>
        <quote>&nbsp;</quote>
		<input name="fldAddress3" id="fldAddress3" size="45">
	</div>
	<div class="frmClientItem">
		<label>City&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldCity" id="fldCity" size="45">
	</div>
	<div class="frmClientItem">
		<label>Post Code&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldPostCode" id="fldPostCode" size="8">
	</div>
	<div class="frmClientItem">
		<label>Phone&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldPhone" id="fldPhone" size="30">
	</div>
	<div class="frmClientItem">
		<label>Fax&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldFax" id="fldFax" size="30">
	</div>
	<div class="frmClientItem">
		<label>Home&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldHome" id="fldHome" size="30">
	</div>
	<div class="frmClientItem">
		<label>Industry&nbsp;&nbsp;</label>
        <quote>:</quote>
		<input name="fldIndustry" id="fldIndustry" style="width:250px"></input>
		<input type="hidden" name="fldHiddenIndustry" id="fldHiddenIndustry">
	</div>
	</form>
    </div>
    </div>
    <div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnClient" align="right" style="padding:5px;">
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
	window.parent.$('#divClientWait').hide();
	window.parent.$('#fraClient').show();
});
function fnChgState() {
	var test = $('#fldState').is(':checked'); // document.getElementById('Client_GroupClient3').checked;
	if(test==true) {
		$("#fldState").attr('checked','checked');
		$("#fldHiddenState").attr('value','groupON'); // document.getElementById('Client_GroupClient3').value = "groupON";
		$('#fldGroup').combogrid('enable'); // $('#client_groupclient_id').combogrid('enable');
	} else {
		$("#fldState").removeAttr('checked');
		$("#fldHiddenState").attr('value','groupOFF'); // document.getElementById('Client_GroupClient3').value = "groupOFF";
		$('#fldGroup').combogrid('disable'); // $('#client_groupclient_id').combogrid('disable');
	}
}
<?php if(isset($vClient)) {	?>
$('#frmClient').form('load','<?php echo base_url(); ?>index.php/md_client/fnClientRow/<?php echo $vClient; ?>');
url = '<?php echo base_url(); ?>index.php/md_client/fnClientUpdate/<?php echo $vClient ?>';
<?php } else { ?>
$('#frmClient').form('clear');
url = '<?php echo base_url(); ?>index.php/md_client/fnClientCreate/';
<?php } ?>
$.fn.validatebox.defaults.missingMessage = 'Harus diisi.';
$.fn.combogrid.defaults.missingMessage = 'Harus diisi.';
$(function() {
	$('#fldGroup').combogrid({
		idField:'f_group_client_id',
		textField:'f_group_client_name',
		mode:'remote',
		url:'<?php echo base_url(); ?>index.php/md_client/fnGroupData/',
		panelWidth:250,
		panelHeight:120,
		striped:true,
		columns:[[
			{field:'f_group_client_code',title:'<strong>Code</strong>',width:80,halign:'center'},
			{field:'f_group_client_name',title:'<strong>Group Name</strong>',width:175,halign:'center'}
		]],
		fitColumns:true
	});
	$('#fldIndustry').combogrid({
		idField:'Id',
		textField:'desc1',
		mode:'remote',
		striped:true,
		url:'<?php echo base_url(); ?>index.php/md_client/fnIndustryData/',
		panelWidth:250,
		panelHeight:120,
		columns:[[
			{field:'Id',title:'<strong>ID</strong>',width:50,halign:'center'},
			{field:'desc1',title:'<strong>Industry Name</strong>',width:180,halign:'center'}
		]],
		fitColumns:true
	});
	<?php if(isset($vClient)) { ?>
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_client/fnCekGroupExist/<?php echo $vClient; ?>',
		dataType:"json",
		groupdata: {},
		success: function(groupdata){
			if(groupdata.group==0) {
				document.getElementById('fldState').checked = false;
				$('#fldState').removeAttr('checked');
				$("#fldHiddenState").attr('value','groupOFF');
				$('#fldGroup').combogrid('disable');
				return false;
			} else {
				document.getElementById('fldState').checked = true;
				$('#fldState').attr('checked','checked');
				$("#fldHiddenState").attr('value','groupON');
				$('#fldGroup').combogrid('enable');
			}
		}
	});
	$("#fldCode").attr('disabled','disabled');
	<?php } else { ?>
	document.getElementById('fldState').checked = false;
	$('#fldState').removeAttr('checked');
	$("#fldHiddenState").attr('value','groupOFF');
	$('#fldGroup').combogrid('disable');
	<?php } ?>
});
function fnSave() {
	var vGroupGrid = $('#fldGroup').combogrid('grid');
	var vGroupField = vGroupGrid.datagrid('getSelected');
	var groupText = vGroupField.f_group_client_code;
	if(!groupText) {
		groupText = 'empty_param';
	}
	var industryText = $('#fldIndustry').combogrid('getText');
	if(!industryText) {
		industryText = 'empty_param';
	}
	$('#fldHiddenGroup').attr('value',groupText); // fldHiddenGroup
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_client/fnCekGroupIndustry/'+groupText+'/'+industryText,
		dataType:"json",
		data: {},
		success: function(data){
			var state = $('#fldHiddenState').val();
			var groupdata = data.group;
			var industrydata = data.idst;
			if((state=='groupON' && groupdata=='') && ($('#fldIndustry').combogrid('getText')!='' && data.idst=='')) {
				alert('Group tidak dapat ditemukan.\n\nIndustry tidak dapat ditemukan.');
				return false;
			} else if(state=='groupON' && groupdata=='') {
				alert('Group tidak dapat ditemukan.');
				return false;
			} else if($('#fldIndustry').combogrid('getText')!='' && industrydata=='') {
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
	$('#frmClient').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#dtgClient').datagrid('reload');
				window.parent.$('#dlgClient').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#dlgClient').dialog('close');
}
</script>
</html>