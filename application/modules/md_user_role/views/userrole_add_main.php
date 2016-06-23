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
<div class="easyui-layout" style="width:350px; height:250px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<table id="dtgUserRole_Roles" class="easyui-datagrid" data-options="title:'Datagrid Roles',url:'<?php echo base_url(); ?>index.php/md_user_role/fnUserRoleDataChoose/<?php echo $vUserId; ?>',border:false,singleSelect:false,width:350,height:186,onLoadSuccess:function(data){ var rows = $(this).datagrid('getRows'); for(i=0;i<rows.length;++i){ if(rows[i]['userrole_userrole_box']==1) $(this).datagrid('checkRow',i); } }">
		<thead>
			<tr>
				<th data-options="field:'userrole_userrole_box',checkbox:true"></th>
				<th data-options="field:'userrole_userrole_name',title:'<b>Role Name</b>',width:275"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnUserRole_Roles" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;"></div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" onclick="fnSave()">Save</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#75_divWait').hide();
	window.parent.$('#75_fraUserRole').show();
});
function fnSave() {
	var vChoosenRows = $('#dtgUserRole_Roles').datagrid('getSelections');
	var vTemp = new Array();
	for(var i=0; i<vChoosenRows.length; i++){
		var vRow = vChoosenRows[i];
		vTemp[i] = vRow.userrole_userrole_id;
	}
	var vRoles = vTemp.toString();
	var vData=vRoles.replace(/,/g,"_");
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_user_role/fnSaveUserRole/<?php echo $vUserId; ?>/'+vData,
		success: function(){
			window.parent.$('#75_dlgUserRole').dialog('close');
			window.parent.$('#75_dtgUserRole').datagrid('reload');
		}
	});
}
function fnCancel() {
	window.parent.$('#75_dlgUserRole').dialog('close');
}
</script>