<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/gray/easyui-modified.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bens.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/easyui/themes/icon.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div class="easyui-layout" style="width:495px; height:250px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<table id="dtgModActAction" class="easyui-datagrid" data-options="title:'Datagrid Action',url:'<?php echo base_url(); ?>index.php/md_app_mod/fnActionDataChoose/<?php echo $vChoosenMod; ?>',border:false,singleSelect:false,fit:true,onLoadSuccess:function(data){ var rows = $(this).datagrid('getRows'); for(i=0;i<rows.length;++i){ if(rows[i]['appModAction_box']==1) $(this).datagrid('checkRow',i); } }">
		<thead>
			<tr>
				<th data-options="field:'appModAction_box',checkbox:true"></th>
				<th data-options="field:'appModAction_id',title:'',halign:'left',width:'18'" align="right"></th>
				<th data-options="field:'appModAction_code',title:'<b>Action Code</b>',width:125"></th>
				<th data-options="field:'appModAction_name',title:'<b>Action Name</b>',width:125"></th>
				<th data-options="field:'appModAction_desc',title:'<b>Description</b>',width:150"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnAppl" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;"></div>
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
	window.parent.$('#1_divWait').hide();
	window.parent.$('#1_fraAppMod').show();
});
function fnSave() {
	var vChoosenRows = $('#1_dtgAppModAct').datagrid('getSelections');
	var vTemp = new Array();
	for(var i=0; i<vChoosenRows.length; i++){
		var vRow = vChoosenRows[i];
		vTemp[i] = vRow.appModAction_id;
	}
	var vActions = vTemp.toString();
	var vData=vActions.replace(/,/g,"_");
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_app_mod/fnSaveModAct/<?php echo $vChoosenMod; ?>/'+vData,
		success: function(){
			window.parent.$('#1_dlgAppMod').dialog('close');
			window.parent.$('#1_dtgAppModAct').datagrid('reload');
		}
	});
}
function fnCancel() {
	window.parent.$('#1_dlgAppMod').dialog('close');
}
</script>