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
<div class="easyui-layout" style="width:495px; height:400px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<div style="padding:0px 15px;">
			<form name="frmCompSeg" id="frmCompSeg" method="post" novalidate>
			<div class="frmTitle">Data Company Segment</div>
			<div class="frmItem">
				<label>#ID</label>
				<input name="fldId" id="fldId" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="3">
			</div>
			<div class="frmItem">
				<label>Company</label>
				<input name="fldCompany" id="fldCompany" data-options="required:true,missingMessage:'Must be filled.'" style="width:172px;">
			</div>
			<div class="frmItem">
				<label>Segment Code</label>
				<input name="fldCode" id="fldCode" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="15">
			</div>
			<div class="frmItem">
				<label>Segment Name</label>
				<input name="fldName" id="fldName" class="easyui-validatebox" data-options="required:true,missingMessage:'Must be filled.'" size="25">
			</div>
			<div class="frmItem">
				<label>Description</label>
				<input name="fldDesc" id="fldDesc" size="38">
			</div>
			<div class="frmItem">
				<label>Parent Segment</label>
				<input name="fldParent" id="fldParent" style="width:172px;">
			</div>
			<div class="frmItem">
				<label>Top Segment</label>
				<input name="fldTop" id="fldTop" style="width:172px;">
			</div>
			<div class="frmItem">
				<label>Production</label>
				<input name="fldProd" id="fldProd" style="width:90px;">
			</div>
			<div class="frmItem">
				<label>Active</label>
				<input name="fldAct" id="fldAct" style="width:90px;">
			</div>
			</form>
		</div>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnGrpMod" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;">
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
</html>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#_78_divWait').hide();
	window.parent.$('#_78_iframe').show();
});
<?php if($vAction=='add') { ?>
$('#frmCompSeg').form('clear');
url = '<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegCreate/';
<?php } else { ?>
$('#frmCompSeg').form('load','<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegRow/<?php echo $vSegmentId; ?>');
url = '<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegUpdate/<?php echo $vSegmentId; ?>';
<?php } ?>
$(function() {
	$('#fldCompany').combobox({
		valueField:'f_comp_id',
		textField:'f_comp_name',
		mode:'remote',
		panelWidth:172,
		panelHeight:125,
		url:'<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegCompany/'
	});
	$('#fldParent').combobox({
		valueField:'f_segment_id',
		textField:'f_segment_name',
		mode:'remote',
		panelWidth:172,
		panelHeight:125,
		url:'<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegParent/'
	});
	$('#fldTop').combobox({
		valueField:'f_segment_id',
		textField:'f_segment_name',
		mode:'remote',
		panelWidth:172,
		panelHeight:125,
		url:'<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegTop/'
	});
	$('#fldProd').combobox({
		valueField:'f_production_val',
		textField:'f_production_text',
		panelWidth:90,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegProduction/'
	});
	$('#fldAct').combobox({
		valueField:'f_active_val',
		textField:'f_active_text',
		panelWidth:90,
		panelHeight:'auto',
		url:'<?php echo base_url(); ?>index.php/md_comp_segment/fnCompSegAction/'
	});
});
function fnSave() {
	fnSaveData();
}
function fnSaveData() {
	$('#frmCompSeg').form('submit',{
		url: url,
		onSubmit: function() {
			return $(this).form('validate');
		},
		success: function(result) {
			var result = eval('('+result+')');
			if (result.success) {
				window.parent.$('#_78_grd1').datagrid('reload');
				window.parent.$('#_78_dlg').dialog('close');
			} else {
				var msg = result.msg;
				alert(msg);
			}
		}
	});
}
function fnCancel() {
	window.parent.$('#_78_dlg').dialog('close');
}
</script>