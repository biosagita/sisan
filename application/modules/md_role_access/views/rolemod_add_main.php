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
<div class="easyui-layout" style="width:425px; height:400px; background-color:#FFF;">
    <div data-options="region:'center',border:false">
		<table id="trgRoleMod_Modules" class="easyui-treegrid" idField="roleaccess_rolemodule_id" treeField="roleaccess_rolemodule_name" data-options="title:'Treegrid Modules',url:'<?php echo base_url(); ?>index.php/md_role_access/fnRoleModDataChoose/<?php echo $vChoosenRoleApp; ?>/<?php echo $vChoosenRoleId; ?>',border:false,singleSelect:false,width:425,height:336,onLoadSuccess:function(row,data){ fnLoadSuccess(); },onClickRow:function(row){ fnClickRow(row);}">
		<thead>
			<tr>
				<th data-options="field:'roleaccess_rolemodule_box',checkbox:true"></th>
				<th data-options="field:'roleaccess_rolemodule_name',title:'<b>Module Name</b>',width:350"></th>
			</tr>
		</thead>
		</table>
	</div>
	<div data-options="region:'south',border:false" style="height:35px; background-color:#F8F8F8;">
		<div id="btnRoleMod_Modules" align="right" style="padding:5px;">
			<div id="footBarLeft" style="float:left; width:auto; margin:5px 0px 0px 5px;"></div>
			<div id="footBarRight" style="float:right; width:auto; clear:right;">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-save" onclick="fnSave()">Save</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="fnCancel()">Cancel</a>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
	window.parent.$('#74_divWait').hide();
	window.parent.$('#74_fraRoleAccess').show();
});
function fnLoadSuccess() {
	var vGetData = $('#trgRoleMod_Modules').treegrid('getData');
	var vLength1 = vGetData.length;
	for(var i=0; i<vLength1; i++) {
		var vId1 = vGetData[i].roleaccess_rolemodule_id;
		var vIsParent = vGetData[i].roleaccess_rolemodule_isparent;
		if(vIsParent) {
			var vChildren = $('#trgRoleMod_Modules').treegrid('getChildren',vId1);
			var vLength2 = vChildren.length;
			var vTotalChild = vLength2;
			var vTotalSelectedChild = 0;
			for(var j=0; j<vLength2; j++) {
				var vId2 = vChildren[j].roleaccess_rolemodule_id;
				var vIsSelected = vChildren[j].roleaccess_rolemodule_box;
				if(vIsSelected) {
					vTotalSelectedChild++;
					$('#trgRoleMod_Modules').treegrid('checkRow',vId2);
				}
			}
			if(vTotalChild==vTotalSelectedChild) {
				$('#trgRoleMod_Modules').treegrid('checkRow',vId1);
			}
		}
	}
}
function fnClickRow(pRow) {
	var vIsParent1 = pRow.roleaccess_rolemodule_isparent;
	var vId1 = pRow.roleaccess_rolemodule_id;
	if(vIsParent1=='1') {
		var vGetChecked = $('#trgRoleMod_Modules').treegrid('getChecked');
		var vLength1 = vGetChecked.length;
		var vSame = 0;
		for(var i=0;i<vLength1;i++) {
			var vIsParent2 = vGetChecked[i].roleaccess_rolemodule_isparent;
			var vId2 = vGetChecked[i].roleaccess_rolemodule_id;
			if(vIsParent2=='1') {
				if(vId1==vId2) {
					vSame++;
				}
			}
		}
		if(vSame>0) {
			var vChildren = $('#trgRoleMod_Modules').treegrid('getChildren',vId1);
			var vLength2 = vChildren.length;
			for(var j=0;j<vLength2;j++) {
				var vId3 = vChildren[j].roleaccess_rolemodule_id;
				$('#trgRoleMod_Modules').treegrid('checkRow',vId3);
			}
		} else {
			var vChildren = $('#trgRoleMod_Modules').treegrid('getChildren',vId1);
			var vLength2 = vChildren.length;
			for(var j=0;j<vLength2;j++) {
				var vId3 = vChildren[j].roleaccess_rolemodule_id;
				$('#trgRoleMod_Modules').treegrid('uncheckRow',vId3);
			}
		}
	} else if(vIsParent1=='0') {
		var vParent = $('#trgRoleMod_Modules').treegrid('getParent',vId1);
		var vId2 = vParent.roleaccess_rolemodule_id;
		var vChildren = $('#trgRoleMod_Modules').treegrid('getChildren',vId2);
		var vLength1 = vChildren.length;
		var vTotalSibling = vLength1;
		var vTotalCheckedSibling = 0;
		for(var i=0;i<vLength1;i++) {
			var vId3 = vChildren[i].roleaccess_rolemodule_id;
			var vGetChecked = $('#trgRoleMod_Modules').treegrid('getChecked');
			var vLength2 = vGetChecked.length;
			for(var j=0;j<vLength2;j++) {
				var vId4 = vGetChecked[j].roleaccess_rolemodule_id;
				if(vId3==vId4) {
					vTotalCheckedSibling++;
				}
			}
		}
		if(vTotalSibling==vTotalCheckedSibling) {
			$('#trgRoleMod_Modules').treegrid('checkRow',vId2);
		} else {
			$('#trgRoleMod_Modules').treegrid('uncheckRow',vId2);
		}
	}	
}
function fnSave() {
	var vChoosenRows = $('#trgRoleMod_Modules').treegrid('getSelections');
	var vLength = vChoosenRows.length;
	var vTemp = new Array();
	var j=0;
	for(var i=0; i<vLength; i++){
		var vRow = vChoosenRows[i];
		vIsParent = vRow.roleaccess_rolemodule_isparent;
		if(vIsParent==0) {
			vId = vRow.roleaccess_rolemodule_id;
			vTemp[j] = vId;
			j++;
		}
	}
	var vModules = vTemp.toString();
	var vData=vModules.replace(/,/g,"_");
	$.ajax({
		type: "POST",
		url: '<?php echo base_url()?>index.php/md_role_access/fnSaveRoleMod/<?php echo $vChoosenRoleId; ?>/'+vData,
		success: function(){
			window.parent.$('#74_dlgRoleAccess').dialog('close');
			window.parent.$('#74_trgRoleModule').treegrid('reload');
		}
	});
}
function fnCancel() {
	window.parent.$('#74_dlgRoleAccess').dialog('close');
}
</script>